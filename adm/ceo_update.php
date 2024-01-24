<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$co_name = $data['co_name'];
$co_position = $data['co_position'];
$co_id = $data['co_id'];
$output_dir = '../images/ceo'; // folder
$co_img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["co_img"]["name"])) {
    $exts = explode('.', $_FILES["co_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    move_uploaded_file($_FILES["co_img"]["tmp_name"], $output_dir . '/' . $fileName);
    $co_img = $fileName; // set image value
}

if (!empty($co_img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE ceo SET 
        co_name = '$co_name',
        co_position = '$co_position',
        co_img = '$co_img'
    WHERE co_id = $co_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE ceo SET 
        co_name = '$co_name',
        co_position = '$co_position'
    WHERE co_id = $co_id";
}


$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="person.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="ceo_update.php?id=' . $co_id . '";</script>';
}
?>
