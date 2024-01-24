<?php
require('./api/connect.php');

$objCon = connectDB();
$strSQL = "SELECT * FROM activity";
$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC) 
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
      <main  class="container">
          <div class="slide-container">
            
            <?php include "slide-page.php"; ?>
            
          </div>
          <link rel="stylesheet" href="index2.css">
            <nav class="nav link d-flex flex-wrap justify-content-between">
              <?php include "nav-link.php"; ?>
            </nav>
          <script src="person.js"></script>
          <br>
          <div class="row g-5">
              <div class="col-md-8">        
   
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
                  <button type="button" class="btn btn-outline-primary" >ดูเพิ่มติม</button></a>
              </div>
              <br>
              <div id="notification" data-aos="fade-up">
              <i id="refreshButton" class="fas fa-sync-alt"></i>
              <a href="activity.php?id=<?php echo $objResult['atv_id']?>">               
                  <img id="notificationImg" src="" alt="Notification Image">
                  <br>
                  <center><p id="notificationText"></p> </center>
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
              <img src="./images/ceo/<?php echo $row["co_img"]; ?>" style="width: 360px; height: 400px; margin-left: -15px; border-radius: 10px" alt="">
            </div>
            <div class="member-info" style="margin-right: 15px; margin-left: 15px;">
              <h5><?php echo $row["co_name"]; ?></h5>
              <span>ผู้อำนวยการโรงพยาบาลป่าตอง</span>
            </div>
          </div>
        </div><!-- End Team Member -->

        <style>
          @media (max-width: 768px){
            .time{
              margin-top: -25px;
            }
          }
        </style>

              <!-- ปฏิทิน -->
              <h4>ปฎิทิน</h4>
                <div class="row-calendar " style="margin-top: -5px;">
                  <div class="col-md-12 calendar time">
                  <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTz=0&amp;height=260&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=web.patonghospital%40gmail.com&amp;color=%23528800&amp;src=th.th%23holiday%40group.v.calendar.google.com&amp;color=%232952A3&amp;ctz=Asia%2FBangkok" 
                  style=" border-width:0 " width="105%" height="400" frameborder="0" scrolling="no"></iframe>
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
            <div class="swiper-slide"><a href="http://www.pkto.moph.go.th/" target="_blank"><img src="./images/link01.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="https://www.vachiraphuket.go.th/" target="_blank"><img src="./images/link02.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="https://www.thalanghospital.go.th/" target="_blank"><img src="./images/link03.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="http://www.patonghospital.com/roomsys/" target="_blank"><img src="./images/link04.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="http://www.patonghospital.com/ya/ya4.php" target="_blank"><img src="./images/link05.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="http://www.pkto.moph.go.th/kpi/index.php" target="_blank"><img src="./images/link06.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="http://pdc.pkto.moph.go.th/pdc/" target="_blank"><img src="./images/link07.jpg" class="img-fluid-d" alt=""></a></div>
            <div class="swiper-slide"><a href="https://pkt.hdc.moph.go.th/hdc/main/index.php" target="_blank"><img src="./images/link08.png" class="img-fluid-d" alt=""></a></div>
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