<?php

if (isset($_POST['search'])) {
    require('./api/dbconnect.php');

    // รับค่าค้นหาจากหน้า HTML
    $searchText = $_POST['search'];

    // ตัวแปรเก็บข้อมูล
    $clinicData = array();
    $serviceData = array();
    $activityData = array();
    $supportData = array();
    $newsData = array();

    // ดึงข้อมูลจากตาราง clinic ที่ตรงกับคำค้นหา
    $sql = "SELECT cn_id, cn_name FROM clinic WHERE cn_id LIKE '%$searchText%' OR cn_name LIKE '%$searchText%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $clinicData[] = $row['cn_name'];
        }
    }

    // ดึงข้อมูลจากตาราง service ที่ตรงกับคำค้นหา
    $sql = "SELECT sv_id, sv_name FROM service WHERE sv_id LIKE '%$searchText%' OR sv_name LIKE '%$searchText%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $serviceData[] = $row['sv_name'];
        }
    }

    // ดึงข้อมูลจากตาราง activity ที่ตรงกับคำค้นหา
    $sql = "SELECT atv_id, atv_name FROM activity WHERE atv_id LIKE '%$searchText%' OR atv_name LIKE '%$searchText%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $activityData[] = $row['atv_name'];
        }
    }

    // ดึงข้อมูลจากตาราง support ที่ตรงกับคำค้นหา
    $sql = "SELECT sp_id, sp_name FROM support WHERE sp_id LIKE '%$searchText%' OR sp_name LIKE '%$searchText%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $supportData[] = $row['sp_name'];
        }
    }

    // ดึงข้อมูลจากตาราง news_pag ที่ตรงกับคำค้นหา
    $sql = "SELECT np_id, np_name FROM news_pag WHERE np_id LIKE '%$searchText%' OR np_name LIKE '%$searchText%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $supportData[] = $row['np_name'];
        }
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();

    // ตรวจสอบว่าไม่พบข้อมูลจากทุกตาราง
    if (empty($clinicData) && empty($serviceData) && empty($activityData) && empty($supportData) && empty($newsData)) {
        echo "ไม่พบข้อมูลที่ท่านค้นหา";
    } else {
        // แสดงผลลัพธ์ในรูปแบบของ HTML
        foreach ($clinicData as $result) {
            echo '<li>' . $result . '</li>';
        }

        foreach ($serviceData as $result) {
            echo '<li>' . $result . '</li>';
        }

        foreach ($activityData as $result) {
            echo '<li>' . $result . '</li>';
        }

        foreach ($supportData as $result) {
            echo '<li>' . $result . '</li>';
        }

        foreach ($newsData as $result) {
            echo '<li>' . $result . '</li>';
        }
    }
}
?>
