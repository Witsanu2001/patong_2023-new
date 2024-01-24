<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$doctor_name = $data['doctor_name'];
$doctor_id = $data['doctor_id'];
$output_dir = '../images/table_doctor'; // folder
$doctor_img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["doctor_img"]["name"])) {
    $exts = explode('.', $_FILES["doctor_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["doctor_img"]["tmp_name"], $output_dir . '/' . $fileName);
    $doctor_img = $fileName; // set image value
}

if (!empty($doctor_img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE table_doctor SET 
        doctor_name = '$doctor_name',
        doctor_img = '$doctor_img'
    WHERE doctor_id = $doctor_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE table_doctor SET 
        doctor_name = '$doctor_name',
    WHERE doctor_id = $doctor_id";
}

$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="table_doctor.php?id=' . $doctor_id . '";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="table_doctor_update.php?id=' . $doctor_id . '";</script>';
}
?>
