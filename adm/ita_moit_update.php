<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$moit_title = $data['moit_title'];
$moit_id = $data['moit_id'];
$ita_id = $data['ita_id'];

// มีการอัปโหลดรูปภาพใหม่
$strSQL = "UPDATE moit SET 
    moit_title = '$moit_title'
WHERE moit_id = $moit_id";

$objQuery = mysqli_query($objCon, $strSQL);
if ($objQuery) {
    echo '<script>window.location="ita.php?id=' . $ita_id . '";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="moit_update.php?id=' . $moit_id . '";</script>';
}
?>
