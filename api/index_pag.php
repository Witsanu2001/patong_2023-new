
<?php
require('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // สร้าง SQL query เพื่อดึงข้อมูลจากตาราง service
    $sql = "SELECT * FROM index_pag";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = array();
        while ($row = $result->fetch_assoc()) {
            $response[] = $row; // เก็บข้อมูลที่ดึงมาในรูปแบบของ associative array
        }

        // ส่งข้อมูลกลับเป็น JSON
        header('Content-Type: application/json');
        echo json_encode(array('RespCode' => 200, 'data' => $response));
    } else {
        echo json_encode(array('RespCode' => 404, 'message' => 'ไม่พบข้อมูล'));
    }

    $conn->close();
} else {
    // หากไม่ใช่การเรียกด้วยเมธอด GET
    echo json_encode(array('RespCode' => 405, 'message' => 'Method Not Allowed'));
}
?>
