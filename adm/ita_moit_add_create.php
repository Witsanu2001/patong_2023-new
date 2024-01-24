<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$ita_id = $data['ita_id'];

// ตรวจสอบว่ามีข้อมูลที่ต้องการบันทึกหรือไม่
if (!empty($data['moit_name']) && !empty($data['moit_title'])) {
    // เลือก index แรกของ $data['moit_name'] และ $data['moit_title'] 
    $moit_name = mysqli_real_escape_string($objCon, $data['moit_name'][0]);
    $moit_title = mysqli_real_escape_string($objCon, $data['moit_title'][0]);

    // สร้าง SQL Query
    $strSQL = "INSERT INTO moit (`ita_id`, `moit_name`, `moit_title`) VALUES ('$ita_id', '$moit_name', '$moit_title')";

    $objQuery = mysqli_query($objCon, $strSQL) or die(mysqli_error($objCon));

    if ($objQuery) {
        echo '<script>window.location="ita_moit.php?id=' . $ita_id . '";</script>';
    } else {
        echo '<script>alert("พบข้อผิดพลาด");window.location="ita_moit_add.php";</script>';
    }
} else {
    // กรณีไม่มีข้อมูลที่ต้องการบันทึก
    echo '<script>alert("ไม่มีข้อมูลที่ต้องการบันทึก");window.location="moit_add.php";</script>';
}
?>
