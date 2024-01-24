<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$h_name = mysqli_real_escape_string($objCon, $data['h_name']);
$h_title = mysqli_real_escape_string($objCon, $data['h_title']);
$h_date = mysqli_real_escape_string($objCon, $data['h_date']);
$h_id = $data['h_id'];
$output_dir = '../h_pdf'; // folder
$h_pdf = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ
$b_id = 2;

if (!empty($_FILES["h_pdf"]["name"])) {
    $exts = explode('.', $_FILES["h_pdf"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["h_pdf"]["tmp_name"], $output_dir . '/' . $fileName);
    $h_pdf = $fileName; // set image value
}

if (!empty($h_pdf)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE hire SET 
        h_name = '$h_name',
        h_title = '$h_title',
        h_date = '$h_date',
        h_pdf = '$h_pdf'
    WHERE h_id = $h_id";


        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$h_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);

} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE hire SET 
        h_name = '$h_name',
        h_title = '$h_title',
        h_date = '$h_date'
    WHERE h_id = $h_id";

        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$h_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);
    }


$objQuery = mysqli_query($objCon, $strSQL);

if ($objQuery) {
    echo '<script>window.location="buy.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="h_update.php?id=' . $h_id . '";</script>';
}
?>
