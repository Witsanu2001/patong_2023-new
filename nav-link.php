<?php
require('./api/dbconnect.php');

// $id = $_GET["id"];

$sql = "SELECT * FROM ita";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!-- เพิ่ม Bootstrap CSS และ JavaScript library -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<div class="dropdown p-2 link-secondary">
        <a class="p-2 link-secondary" href="index-page.php">หน้าหลัก</a>
    </div>
    <div class="dropdown p-2 link-secondary">
        <a class="p-2 link-secondary">เกี่ยวกับโรงพยาบาล</a>
        <div class="dropdown-content">
            <a href="person.php">รู้จักกับโรงพยาบาล</a>
        </div>
    </div>
    <div class="dropdown p-2 link-secondary">
        <a class="p-2 link-secondary">ตารางออกตรวจแพทย์</a>
        <div class="dropdown-content">
            <a href="table_doctor.php">ตารางแพทย์</a>
            <a href="table_doctordental.php">ตารางตรวจทันตแพทย์</a>
            <a href="service.php">งานบริการ</a>
            <a href="clinic.php">คลินิก</a>
        </div>
    </div>
    <div class="dropdown p-2 link-secondary">
        <a class="p-2 link-secondary"><i class="fa-solid fa-gear" style="color: #1f71ff;"></i> &nbsp;ITA</a>
        <div class="dropdown-content">
        <?php
        // ตรวจสอบว่ามีข้อมูลในตัวแปร $result หรือไม่ก่อนใช้งาน
        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                // แสดงลิงก์สำหรับ ita_id ที่อยู่ใน $row
                echo '<a href="ita.php?id=' . $row["ita_id"] . '">' . $row["year"] . '</a>';
            }
        } else {
            echo "ไม่พบข้อมูล";
        }
        ?>

        </div>
    </div>

    <div class="dropdown p-2 link-secondary">
        <a class="p-2 link-secondary" id="hospital-link">ติดต่อโรงพยาบาล</a>
        <div class="dropdown-content location">
            <a href="#" data-toggle="modal" data-target="#exampleModalCenter" ><i class="fa-solid fa-house" style="color: #005eff;">&nbsp;&nbsp;</i>ที่อยู่ :  57 ถ.ไสน้ำเย็น ต.ป่าตอง อ.กะทู้ จ.ภูเก็ต 83150 <br>
            Patong Hospital : 57 sainamyen Rd., Patong, Kathu, Phuket 83150 Thailand</a>
            <a href="#" data-toggle="modal" data-target="#exampleModalCall" ><i class="fa-solid fa-phone" style="color: #005eff;"></i>&nbsp;&nbsp;เบอร์โทร : 076-342 633-4</a>
            <a href="#" data-toggle="modal" data-target="#exampleModalfax"><i class="fa-solid fa-tty" style="color: #005eff;"></i>&nbsp;&nbsp;Fax : 076-340 617</a>
            <a href="https://www.facebook.com/patonghospital" target="_blank"><i class="fa-brands fa-facebook" style="color: #005eff;"></i>&nbsp;&nbsp;Facebook : โรงพยาบาลป่าตอง จังหวัดภูเก็ต</a>
            <a href="https://maps.app.goo.gl/zzYDHV9iujppfzZe7" target="_blank"><i class="fa-solid fa-map-location-dot" style="color: #005eff;"></i>&nbsp;&nbsp;Map</a>
        </div>
    </div>

