<?php
require('./api/dbconnect.php');

$id = $_GET["id"];

$sqlHead = "DELETE FROM head WHERE moit_id IN (SELECT moit_id FROM moit WHERE ita_id = $id)";
$resultHead = mysqli_query($conn, $sqlHead);

if (!$resultHead) {
  echo "เกิดข้อผิดพลาดในการลบข้อมูลในตาราง head: " . mysqli_error($conn);
  exit;
}

$sqlMoit = "DELETE FROM moit WHERE ita_id = $id";
$resultMoit = mysqli_query($conn, $sqlMoit);

if (!$resultMoit) {
  echo "เกิดข้อผิดพลาดในการลบข้อมูลในตาราง moit: " . mysqli_error($conn);
  exit;
}

$sqlIta = "DELETE FROM ita WHERE ita_id = $id";
$resultIta = mysqli_query($conn, $sqlIta);

if (!$resultIta) {
  echo "เกิดข้อผิดพลาดในการลบข้อมูลในตาราง ita: " . mysqli_error($conn);
  exit;
}

header("location:index-page.php");
exit(0);
?>
