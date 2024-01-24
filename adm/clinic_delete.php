<?php
require('./api/dbconnect.php');

$id = $_GET["id"];

$sql = "DELETE FROM clinic WHERE cn_id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("location:clinic.php");
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}

