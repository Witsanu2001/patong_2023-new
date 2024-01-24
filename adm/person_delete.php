<?php
require('./api/dbconnect.php');

$id = $_GET["id"];

$sql = "DELETE FROM ceo_manage WHERE ceo_id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("location:person.php");
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}

