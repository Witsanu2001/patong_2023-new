<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$buy_name = mysqli_real_escape_string($objCon, $data['buy_name']);
$buy_title = mysqli_real_escape_string($objCon, $data['buy_title']);
$buy_date = mysqli_real_escape_string($objCon, $data['buy_date']);
$buy_id = $data['buy_id'];
$output_dir = '../buy_pdf'; // folder
$buy_pdf = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ
$b_id = 2;

if (!empty($_FILES["buy_pdf"]["name"])) {
    $exts = explode('.', $_FILES["buy_pdf"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["buy_pdf"]["tmp_name"], $output_dir . '/' . $fileName);
    $buy_pdf = $fileName; // set image value
}

if (!empty($buy_pdf)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE buy SET 
        buy_name = '$buy_name',
        buy_title = '$buy_title',
        buy_date = '$buy_date',
        buy_pdf = '$buy_pdf'
    WHERE buy_id = $buy_id";


        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$buy_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);

} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE buy SET 
        buy_name = '$buy_name',
        buy_title = '$buy_title',
        buy_date = '$buy_date'
    WHERE buy_id = $buy_id";

        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$buy_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);
    }


$objQuery = mysqli_query($objCon, $strSQL);

if ($objQuery) {
    echo '<script>window.location="buy.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="buy_update.php?id=' . $buy_id . '";</script>';
}
?>