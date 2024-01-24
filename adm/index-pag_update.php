<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$np_name = $data['np_name'];
$np_title = $data['np_title'];
$np_details = $data['np_details'];
$np_date = $data['np_date'];
$np_id = $data['np_id'];
$output_dir = '../images/news'; // folder
$np_img = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["np_img"]["name"])) {
    $exts = explode('.', $_FILES["np_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["np_img"]["tmp_name"], $output_dir . '/' . $fileName);
    $np_img = $fileName; // set image value
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
        $updateImageSQL = "UPDATE news_pag SET img_{$i} = '$fileName' WHERE np_id = $np_id";
        mysqli_query($objCon, $updateImageSQL);
    }
}

if (!empty($np_img)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE news_pag SET 
        np_name = '$np_name',
        np_title = '$np_title',
        np_details = '$np_details',
        np_date = '$np_date',
        np_img = '$np_img'
    WHERE np_id = $np_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE news_pag SET 
        np_name = '$np_name',
        np_title = '$np_title',
        np_details = '$np_details',
        np_date = '$np_date'
    WHERE np_id = $np_id";
}

$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="index-page.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="service_update.php?id=' . $np_id . '";</script>';
}
?>
