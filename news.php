<?php
require('./api/connect.php');

$objCon = connectDB();
$strSQL = "SELECT np_img, np_id, np_name, np_title FROM news_pag ORDER BY np_id DESC";
$objQuery = mysqli_query($objCon, $strSQL);
$objQuery_s = mysqli_query($objCon, $strSQL);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <?php include "header-link.php"; ?> 
    
  </head>

  <body>
    
    <div class="container">
        <?php include "header.php"; ?>  
    </div>

<main class="curtain-container container">
    <nav class="nav d-flex flex-wrap justify-content-between">
        <?php include "nav-link.php"; ?>
    </nav>
    <br>
    <?php include "link-boot.php"; ?>
    <?php include "index11.php"; ?>

    <style>
        .scrollable-nav {
            max-height: 600px; /* ความสูงสูงสุดของรายการที่แสดง */
            overflow-y: auto; /* เปิดใช้งานการเลื่อนแนวตั้ง */
        }
    </style>

      <!-- ======= Departments Section ======= -->
        <section id="departments" class="departments">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>ข่าวประชาสัมพัธ์</h2>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <ul class="nav nav-tabs flex-column">
                        <?php
                        $counter = 1;
                        $activeShowClass = 'active show'; // กำหนดตัวแปรสำหรับ class เริ่มต้นเป็น 'active show'
                        while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo $activeShowClass; ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo $counter; ?>">
                                    <h4><?php echo $objResult['np_name']; ?></h4>
                                </a>
                            </li>
                        <?php
                            $counter++;
                            $activeShowClass = ''; // ตั้งค่าตัวแปร class เป็นค่าว่างหลังจากแท็บแรก
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <?php
                        $counter = 1;
                        while ($objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) {
                            $activeShowClass = ($counter === 1) ? 'active show' : '';
                        ?>
                            <div class="tab-pane <?php echo $activeShowClass; ?>" id="tab-<?php echo $counter; ?>">
                                <h3><?php echo $objResult_s['np_name']; ?></h3>
                                <p><?php echo $objResult_s['np_title']; ?></p>
                                <a href="news-pag.php?id=<?php echo $objResult_s['np_id']; ?>">
                                    <img src="./images/news/<?php echo $objResult_s['np_img']; ?>" alt="" style="width: 800px;">
                                </a>
                            </div>
                        <?php
                            $counter++;
                        }
                        ?>
                    </div>
                </div>
            </div>


        </div>
        </section><!-- End Departments Section -->


    
        

  <!-- Vendor JS Files -->
  <script src="assets_s/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets_s/vendor/aos/aos.js"></script>
  <script src="assets_s/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_s/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_s/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets_s/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_s/js/main.js"></script>


        <br>
        <br>
        <br>
<footer class="blog-footer footer">
  <?php include "footer.php"; ?>
</footer>
</main>

  </body>
</html>

<script src="index.js"></script>


