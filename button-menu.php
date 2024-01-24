<?php
require('./api/dbconnect.php');

// $id = $_GET["id"];

$sql = "SELECT * FROM ita";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <div class="dropdown d-lg-none" style=" margin-left: -5px;">
  <div class="dropdown" >
    <button class="btn btn-primary " type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-bars"></i>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" onclick="event.stopPropagation()">
      <li>
        <button class="dropdown-item" href="index.php" type="button" onclick="toggleSubMenu(event)"><a href="index-page.php">หน้าหลัก</a></button>
       
      </li>
      <li>
        <button class="dropdown-item" type="button" onclick="toggleSubMenu(event)">เกี่ยวกับโรงพยาบาล</button>
        <ul class="submenu" style="display: none;">
          <li><button class="dropdown-item" type="button"><a href="person.php">รู้จักกับโรงพยาบาล</a></button></li>
        </ul>
      </li>
      <li>
        <button class="dropdown-item" type="button" onclick="toggleSubMenu(event)">ตารางออกตรวจแพทย์</button>
        <ul class="submenu" style="display: none;">
          <li><button class="dropdown-item" type="button"><a href="table_doctor.php">ตารางแพทย์</a></button></li>
          <li><button class="dropdown-item" type="button"><a href="table_doctordental.php">ตารางตรวจทันตแพทย์</a></button></li>
          <li><button class="dropdown-item" type="button"><a href="service.php">งานบริการ</a></button></li>
          <li><button class="dropdown-item" type="button"><a href="clinic.php">คลินิก</a></button></li>
        </ul>
      </li>
      <li>
        <button class="dropdown-item" type="button" onclick="toggleSubMenu(event)">ITA</button>
        <ul class="submenu" style="display: none;">
        <?php
          // ตรวจสอบว่ามีข้อมูลในตัวแปร $result หรือไม่ก่อนใช้งาน
          if ($result->num_rows > 0) {
              foreach ($result as $row) {
                  // แสดงลิงก์สำหรับ ita_id ที่อยู่ใน $row
                  echo '<li><a href="ita.php?id=' . $row["ita_id"] . '">' . $row["year"] . '</a></li>';
              }
          } else {
              echo "<li>ไม่พบข้อมูล</li>";
          }
          ?>
          </ul>

      </li>

      </li>
      <li>
        <button class="dropdown-item" type="button" onclick="toggleSubMenu(event)">ติดต่อโรงพยาบาล</button>
        <ul class="submenu" style="display: none;">
          <li><button class="dropdown-item" type="button">
            <a href="#" id="address-link">
                ที่อยู่ :  57 ถ.ไสน้ำเย็น ต.ป่าตอง อ.กะทู้ จ.ภูเก็ต 83150 <br>
                Patong Hospital : 57 sainamyen Rd., Patong,<br> 
                Kathu, Phuket 83150 Thailand
            </a></button></li>
          <li><button class="dropdown-item" type="button"><a href="#">เบอร์โทร : 076-342 633-4</a></button></li>
          <li><button class="dropdown-item" type="button"><a href="#">Fax : 076-340 617</a></button></li>
          <li><button class="dropdown-item" type="button"><a href="https://www.facebook.com/patonghospital" target="_blank">Facebook : โรงพยาบาลป่าตอง จังหวัดภูเก็ต</a></button></li>
          <li><button class="dropdown-item" type="button"><a href="https://maps.app.goo.gl/zzYDHV9iujppfzZe7" target="_blank">Map</a></button></li>
        </ul>
      </li>
    </ul>
  </div>
  </div>

  <script>
    function toggleSubMenu(event) {
      const submenu = event.target.nextElementSibling;
      if (submenu) {
        submenu.style.display = submenu.style.display === 'none' ? 'block' : 'none';
      }
    }
  </script>
