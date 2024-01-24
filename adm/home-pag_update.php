<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$b_name = $data['b_name'];
$b_id = $data['b_id'];
$output_dir = '../images/logo-page'; // folder
$b_logo = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["b_logo"]["name"])) {
    $exts = explode('.', $_FILES["b_logo"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["b_logo"]["tmp_name"], $output_dir . '/' . $fileName);
    $b_logo = $fileName; // set image value
}


if (!empty($b_logo)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE index_pag SET 
        b_name = '$b_name',
        b_logo = '$b_logo'
    WHERE b_id = $b_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE index_pag SET 
        b_name = '$b_name'
    WHERE b_id = $b_id";
}

$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="index-page.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="service_update.php?id=' . $b_id . '";</script>';
}
?>
