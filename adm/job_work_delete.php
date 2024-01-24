<?php
require('./api/dbconnect.php');

$id = $_GET["id"];

$sql = "DELETE FROM job_work WHERE jw_id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("location:job.php");
  exit(0);
} else {
  echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
}
