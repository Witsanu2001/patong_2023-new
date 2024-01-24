<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$cn_name = $data['cn_name'];
$cn_title = $data['cn_title'];
$cn_id = $data['cn_id'];
$output_dir = '../images/clinic'; // folder
$cn_img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["cn_img"]["name"])) {
    $exts = explode('.', $_FILES["cn_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    move_uploaded_file($_FILES["cn_img"]["tmp_name"], $output_dir . '/' . $fileName);
    $cn_img = $fileName; // set image value
}

if (!empty($cn_img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE clinic SET 
        cn_name = '$cn_name',
        cn_title = '$cn_title',
        cn_img = '$cn_img'
    WHERE cn_id = $cn_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE clinic SET 
        cn_name = '$cn_name',
        cn_title = '$cn_title'
    WHERE cn_id = $cn_id";
}


$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>alert("บันทึกการแก้ไขแล้ว");window.location="clinic.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="clinic_update.php?id=' . $cn_id . '";</script>';
}
?>
