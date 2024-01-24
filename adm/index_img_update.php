<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$index_name = $data['index_name'];
$index_id = $data['index_id'];
$output_dir = '../images/index_img'; // folder
$img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["img"]["name"])) {
    $exts = explode('.', $_FILES["img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    move_uploaded_file($_FILES["img"]["tmp_name"], $output_dir . '/' . $fileName);
    $img = $fileName; // set image value
}

if (!empty($img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE index_img SET 
        index_name = '$index_name',
        img = '$img'
    WHERE index_id = $index_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE index_img SET 
        index_name = '$index_name'
    WHERE index_id = $index_id";
}



$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>alert("บันทึกการแก้ไขแล้ว");window.location="index.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="update.php?id=' . $index_id . '";</script>';
}
?>
