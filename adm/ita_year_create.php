<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
// print_r($data);
$year = $data['year'];

$strSQL = "INSERT INTO ita (`year`) VALUES (?)";

// ใช้ mysqli_prepare เพื่อเตรียมคำสั่ง SQL
$stmt = mysqli_prepare($objCon, $strSQL);

// กำหนดค่า parameter และประเภทของข้อมูล
mysqli_stmt_bind_param($stmt, 's', $year);

// ทำการ execute query
$result = mysqli_stmt_execute($stmt);

// ดึง ita_id ที่เพิ่งถูกเพิ่มลงในฐานข้อมูล
$ita_id = mysqli_insert_id($objCon);

// ปิด statement
mysqli_stmt_close($stmt);

if ($result) {
    // ใช้ header() แทนการใส่ script ใน echo
    header("Location: ita_moit_add.php?id=$ita_id");
    exit;
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="ita_year.php";</script>';
}

// ปิดการเชื่อมต่อ
mysqli_close($objCon);
?>
