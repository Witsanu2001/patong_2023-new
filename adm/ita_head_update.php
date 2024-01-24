<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$head_name = $data['head_name'];
$head_id = $data['head_id'];
$output_dir = '../pdf_ita'; // folder
$head_pdf = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ

if (!empty($_FILES["head_pdf"]["name"])) {
    $output_dir = '../pdf_ita'; // folder

    // ตรวจสอบว่าไฟล์ถูกอัปโหลดหรือไม่
    if (is_uploaded_file($_FILES["head_pdf"]["tmp_name"])) {
        $exts = explode('.', $_FILES["head_pdf"]["name"]);
        $ext = end($exts);
        $fileName = $head_name . "." . $ext; // ใช้ $head_name เป็นชื่อไฟล์

        // บันทึกไฟล์ PDF ลงในโฟลเดอร์
        move_uploaded_file($_FILES["head_pdf"]["tmp_name"], $output_dir . '/' . $fileName);
        $head_pdf = $fileName; // set document value
    }
}



if (!empty($head_pdf)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE head SET 
        head_name = '$head_name',
        head_pdf = '$head_pdf'
    WHERE head_id = $head_id";
} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE head SET 
        head_name = '$head_name',
    WHERE head_id = $head_id";
}


$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="index-page.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="head_update.php?id=' . $head_id . '";</script>';
}
?>
