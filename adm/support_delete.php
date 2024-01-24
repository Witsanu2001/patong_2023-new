<?php
require('./api/dbconnect.php');

$id = $_GET["id"];

// 1. ลบข้อมูลจากตาราง support
$sql_delete = "DELETE FROM support WHERE sp_id=$id";
$result_delete = mysqli_query($conn, $sql_delete);

// 2. หาค่า sp_date ล่าสุดจากตาราง support
$sql_max_date = "SELECT MAX(sp_date) AS max_date FROM support";
$result_max_date = mysqli_query($conn, $sql_max_date);
$row_max_date = mysqli_fetch_assoc($result_max_date);
$max_date = $row_max_date['max_date'];

// 3. อัปเดตค่า sp_date ล่าสุดในตาราง index_page สำหรับแถวที่ b_id เท่ากับ 3
$sql_update_index_page = "UPDATE index_pag SET b_time='$max_date' WHERE b_id=3";
$result_update_index_page = mysqli_query($conn, $sql_update_index_page);

if ($result_delete && $result_max_date && $result_update_index_page) {
  header("location: support.php");
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}
?>
