<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$sp_name = mysqli_real_escape_string($objCon, $data['sp_name']);
$sp_title = mysqli_real_escape_string($objCon, $data['sp_title']);
$sp_date = mysqli_real_escape_string($objCon, $data['sp_date']);
$sp_id = $data['sp_id'];
$sp_img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ
$b_id = 3;

$output_dir = '../images/support'; // folder
if (!empty($_FILES["sp_img"]["name"])) {
    $exts = explode('.', $_FILES["sp_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["sp_img"]["tmp_name"], $output_dir . '/' . $fileName);
    $sp_img = $fileName; // set image value
}

if (!empty($sp_img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE support SET 
        sp_name = '$sp_name',
        sp_title = '$sp_title',
        sp_date = '$sp_date',
        sp_img = '$sp_img'
    WHERE sp_id = $sp_id";


        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$sp_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);

} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE support SET 
        sp_name = '$sp_name',
        sp_title = '$sp_title',
        sp_date = '$sp_date'
    WHERE sp_id = $sp_id";

        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$sp_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);
    }


$objQuery = mysqli_query($objCon, $strSQL);

if ($objQuery) {
    echo '<script>window.location="support.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="sp_update.php?id=' . $sp_id . '";</script>';
}
?>
