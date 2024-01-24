<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$ceo_name = $data['ceo_name'];
$ceo_position = $data['ceo_position'];
$ceo_id = $data['ceo_id'];
$output_dir = '../images/ceo'; // folder
$ceo_img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["ceo_img"]["name"])) {
    $exts = explode('.', $_FILES["ceo_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["ceo_img"]["tmp_name"], $output_dir . '/' . $fileName);
    $ceo_img = $fileName; // set image value
}

if (!empty($ceo_img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE ceo_manage SET 
        ceo_name = '$ceo_name',
        ceo_position = '$ceo_position',
        ceo_img = '$ceo_img'
    WHERE ceo_id = $ceo_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE ceo_manage SET 
        ceo_name = '$ceo_name',
        ceo_position = '$ceo_position'
    WHERE ceo_id = $ceo_id";
}


$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="person.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="person_update.php?id=' . $ceo_id . '";</script>';
}
?>
