<?php
session_start();

if(!isset($_SESSION['user'])) {
  echo '<script>alert("กรุณาเข้าสู่ระบบก่อน!!!");window.location="login.php";</script>';
  die();
}

?>


<?php
require('./api/connect.php');

$objCon = connectDB();
$strSQL_s = "SELECT np_img, np_id, np_name FROM news_pag ORDER BY np_id DESC";
$objQuery_s = mysqli_query($objCon, $strSQL_s);
  
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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      .nav {
      position: sticky;
      top: 0;
      z-index: 9999;
      transition: top 0.3s ease-in-out;
      background-color: #fff
    }
    </style>
  </head>
  <body>
  <div class="container">
    <?php include "header.php"; ?>
  </div>
  
      <main  class="container">
            <nav class="nav link d-flex flex-wrap justify-content-between">
              <?php include "nav-link.php"; ?>
            </nav> 
            
            <section id="portfolio" class="portfolio" data-aos="fade-up">
              <div class="container">
                <div class="section-header">
                  <h2>ข่าวอื่นๆ</h2>
                  <p>**ขนาดภาพ 500 * 310 px**</p>
                  <button type="button" class="btn btn-outline-primary"><a href="index-pag_add.php">เพิ่ม</a></button>
                </div>
              </div>

              <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
                  <div class="row g-0 portfolio-container">
                    <?php while ($objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) : ?>
                      <div class="col-12 col-sm-6 col-md-4 col-lg-3 portfolio-item">
                        <a href="">
                        <img src="../images/news/<?php echo $objResult_s['np_img'] ?>" class="img-fluid" alt="">
                        </a>
                        <div class="portfolio-info">
                          <h4><?php echo $objResult_s['np_name']; ?></h4>
                          <a href="news-pag.php?id=<?php echo $objResult_s['np_id'] ?>" class="details-link"><i class="bi bi-zoom-in"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                          <a href="index-pag_edit.php?id=<?php echo $objResult_s['np_id'];?>" title="More Details" class="details-link"><i class="bi bi-pencil-square"></i></a>
                        </div>
                      </div>
                    <?php endwhile; ?>
                  </div>
                </div>
              </div>
            </section>


                    


          <link rel="stylesheet" href="index2.css">
            
          <script src="person.js"></script>
          <br>
          <div class="row g-5">
              <div class="col-md-8">        
                     
                
                      <?php include "button-menu.php"; ?>
                
              <h3 class="pb-4 mb-4 border-bottom d-flex" data-aos="fade-up">  
                <div class="welcome-text text-center">ยินดีต้อนรับสู่โรงพยาบาลป่าตอง</div>
              </h3>             
              <!-- HTML ของการ์ด -->
              <?php include "link-boot.php"; ?>

              <div class="row" style="cursor: pointer;">
                <center>
                  <div id="newsContainer" class="row" data-aos="fade-up"></div>
                </center>
              </div>
          
              <div class="d-flex justify-content-between" data-aos="fade-up">
                  <h3 class="atv">กิจกรรมในโรงพยาบาล</h3>
                    <a href="act.php">
                  <button type="button" class="btn btn-outline-primary">ดูเพิ่มติม</button></a>
              </div>
              <br>
              <?php

              $strSQL_s = "SELECT * FROM activity";
              $objQuery_s = mysqli_query($objCon, $strSQL_s);
              $objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC);
              ?>

              <div id="notification" data-aos="fade-up">
              <i id="refreshButton" class="fas fa-sync-alt"></i>
              <a href="activity.php?id=<?php echo $objResult_s['atv_id']?>">               
                  <img id="notificationImg" src="" alt="Notification Image">
                  <br>
                  <p id="notificationText"></p>
              </a>    
              </div>
          </div>
          
          <div class="col-md-4" data-aos="fade-up">
            <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up"  style="margin-left: -10px;">

      <?php
      $sql = "SELECT * FROM ceo";
      $result = mysqli_query($objCon, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>

      <div class="row gy-5">
        <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
          <div class="team-member">
            <div class="member-img">
              <img src="../images/ceo/<?php echo $row["co_img"]; ?>" style="width: 360px; height: 400px;" alt="">
            </div>
            <div class="member-info" style="margin-right: 30px; margin-left: 30px;">
              <div class="social">
                <a href="ceo_edit.php?id=<?php echo $row["co_id"]; ?>"><i class="bi bi-pencil-square"></i></a>
              </div>
              <h5><?php echo $row["co_name"]; ?></h5>
              <span>ผู้อำนวยการโรงพยาบาลป่าตอง</span>
            </div>
          </div>
        </div><!-- End Team Member -->



              <!-- ปฏิทิน -->
              <h4 data-aos="fade-up">ปฎิทิน</h4>
                <div class="row-calendar" data-aos="fade-up">
                  <div class="col-md-12 calendar">
                  <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTz=0&amp;height=260&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=web.patonghospital%40gmail.com&amp;color=%23528800&amp;src=th.th%23holiday%40group.v.calendar.google.com&amp;color=%232952A3&amp;ctz=Asia%2FBangkok" 
                  style=" border-width:0 " width="110%" height="400" frameborder="0" scrolling="no"></iframe>
                  </div>
                </div>

</div>
</section><!-- End Team Section -->
</div>
      <br>
      <!-- ======= Clients Section ======= -->
      <h4 class="pb-4 mb-4 border-bottom " data-aos="fade-up">  
                <div class="welcome-text text-center">หน่วยงานที่เกี่ยวข้อง</div>
              </h4> 
    <section id="clients" style="
    margin-top: -60px;">
      <div class="container" data-aos="zoom-out">
        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a href="https://pkto.moph.go.th/" target="_blank"><img src="../images/link01.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="https://www.vachiraphuket.go.th/" target="_blank"><img src="../images/link02.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="https://www.vachiraphuket.go.th/" target="_blank"><img src="../images/link03.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="" target="_blank"><img src="../images/link04.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="http://www.patonghospital.com/roomsys/" target="_blank"><img src="../images/link05.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="http://www.patonghospital.com/roomsys/" target="_blank"><img src="../images/link06.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="http://www.patonghospital.com/roomsys/" target="_blank"><img src="../images/link07.jpg" class="img-fluid-d" alt=""></a></div>
          </div>
        </div>
        </section>
      </div>

      <br>
      <br>
      <footer class="blog-footer footer" data-aos="fade-up">
        <?php include "footer.php" ?>
      </footer>
    </main>
</body>
</html>

<script src="index.js"></script>
<script>
    $(document).ready(function() {
      $('.slide-container').addClass('show');
    });
  </script>


