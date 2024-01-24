<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$sv_name = $data['sv_name'];
$sv_title = $data['sv_title'];
$sv_details = $data['sv_details'];
$sv_id = $data['sv_id'];
$output_dir = '../images/service'; // folder
$sv_img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["sv_img"]["name"])) {
    $exts = explode('.', $_FILES["sv_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["sv_img"]["tmp_name"], $output_dir . '/' . $fileName);
    $sv_img = $fileName; // set image value
}

// ทำการ update รูปภาพ
for ($i = 1; $i <= 3; $i++) {
    $inputName = "img_{$i}";

    // ตรวจสอบว่ามีการอัปโหลดรูปภาพนี้หรือไม่
    if (!empty($_FILES[$inputName]["name"])) {
        $exts = explode('.', $_FILES[$inputName]["name"]);
        $ext = $exts[count($exts) - 1];
        $fileName = randomString() . "." . $ext;

        // ย้ายไฟล์ไปยังโฟลเดอร์ปลายทาง
        move_uploaded_file($_FILES[$inputName]["tmp_name"], $output_dir . '/' . $fileName);

        // ทำการ update ชื่อไฟล์รูปภาพในฐานข้อมูล
        $updateImageSQL = "UPDATE service SET img_{$i} = '$fileName' WHERE sv_id = $sv_id";
        mysqli_query($objCon, $updateImageSQL);
    }
}

if (!empty($sv_img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE service SET 
        sv_name = '$sv_name',
        sv_title = '$sv_title',
        sv_details = '$sv_details',
        sv_img = '$sv_img'
    WHERE sv_id = $sv_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE service SET 
        sv_name = '$sv_name',
        sv_title = '$sv_title',
        sv_details = '$sv_details'
    WHERE sv_id = $sv_id";
}

$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="serviceitem.php?id=' . $sv_id . '";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="service_update.php?id=' . $sv_id . '";</script>';
}
?>
