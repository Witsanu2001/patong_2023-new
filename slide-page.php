
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
    <?php
    require_once './api/dbconnect.php'; // เชื่อมต่อกับฐานข้อมูล
    $sql = "SELECT np_img, np_id FROM news_pag ORDER BY np_id DESC";
    $result = mysqli_query($conn, $sql);
    $num_of_items = mysqli_num_rows($result); // หาจำนวน np_id ทั้งหมด

    // สร้าง indicators ตามจำนวน np_id
    for ($i = 0; $i < $num_of_items; $i++) {
        $active = ($i === 0) ? 'active' : ''; // กำหนดให้ indicator แรกเป็น active
        echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $i . '" class="' . $active . '" aria-label="Slide ' . ($i + 1) . '"></button>';
    }

    // เพิ่มปุ่มถ้าเป็นภาพสุดท้าย
    if ($num_of_items > 0) {
        echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . ($num_of_items) . '" aria-label="Slide ' . ($num_of_items + 1) . '"></button>';
    }
    ?>
</div>

<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/img-page.jpg" class="d-block w-100" alt="...">
    </div>
    <?php
    require_once './api/dbconnect.php'; // เชื่อมต่อกับฐานข้อมูล
    $sql = "SELECT np_img, np_id FROM news_pag ORDER BY np_id DESC"; // คำสั่ง SQL สำหรับดึงรูปภาพจากฐานข้อมูล
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<a href="news-pag.php?id='. $row["np_id"] . '">
                <div class="carousel-item">
                    <img src="./images/news/' . $row['np_img'] . '" class="d-block w-100" alt="...">
                </div></a>';
    }
    
    ?>    
</div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>