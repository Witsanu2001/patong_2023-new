<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$dental_name = $data['dental_name'];
$dental_id = $data['dental_id'];
$output_dir = '../images/table_doctordental'; // folder
$dental_img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["dental_img"]["name"])) {
    $exts = explode('.', $_FILES["dental_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["dental_img"]["tmp_name"], $output_dir . '/' . $fileName);
    $dental_img = $fileName; // set image value
}

if (!empty($dental_img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE table_doctordental SET 
        dental_name = '$dental_name',
        dental_img = '$dental_img'
    WHERE dental_id = $dental_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE table_doctordental SET 
        dental_name = '$dental_name',
    WHERE dental_id = $dental_id";
}

$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="table_doctordental.php?id=' . $dental_id . '";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="table_doctordental_update.php?id=' . $dental_id . '";</script>';
}
?>
