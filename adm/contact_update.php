<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$ct_id = $data['ct_id'];  // เพิ่มบรรทัดนี้เพื่อกำหนดค่า $ct_id
$ct_name = $data['ct_name'];

$strSQL = "UPDATE contact SET 
    ct_name = '$ct_name'
WHERE ct_id = $ct_id";

$objQuery = mysqli_query($objCon, $strSQL);

if ($objQuery) {
    echo '<script>window.location="index-page.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="contact_update.php?id=' . $ct_id . '";</script>';
}
?>
