<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patong_2019";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตัวอย่างการกรองข้อมูล
foreach ($_GET as $key => $value) {
    $_GET[$key] = $conn->real_escape_string($value);
}

foreach ($_POST as $key => $value) {
    $_POST[$key] = $conn->real_escape_string($value);
}
?>
