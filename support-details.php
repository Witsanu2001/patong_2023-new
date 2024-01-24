<?php
require('./api/connect.php');

$objCon = connectDB();
$id = $_GET['id'];
$strSQL = "SELECT * FROM support WHERE sp_id = $id";
$objQuery = mysqli_query($objCon, $strSQL);
$objQuery_s = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="stylesheet" href="index2.css">

    <title>โรงพยาบาลป่าตอง : Patong hospital</title>
    <link rel="icon" href="./images/logo.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
    <link rel="stylesheet" href="./calendar-01/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index2.css">
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">   
  </head>
  <body>
  <div class="scroll-to-top">
    <i class="fa-solid fa-angles-up" style="color: #ffffff;"></i>
  </div>  
  <div class="container">
    <?php include "header.php"; ?>
  </div>

<main class="curtain-container container">

    <nav class="nav link d-flex flex-wrap justify-content-between">
        <?php include "nav-link.php"; ?>
    </nav>

    <?php include "link-boot.php"; ?> 
    <!-- ======= Team Section ======= -->
    <section id="portfolio" class="portfolio" data-aos="fade-up">
        <div class="container">
          <div class="section-header">
            <h2><?php echo $objResult ['sp_name']?></h2>
            <p><?php echo $objResult ['sp_title']?></p>
          </div>
          <br>
          <div class="row"  data-aos="fade-up">
            <center><img src="./images/support/<?php echo $objResult ['sp_img']?>" alt=""class="img-fluid"></center>
          </div>
        </div>
        <br>
        <?php
        while ($objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) :
        ?>
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
                <div class="row g-0 portfolio-container">
                    <?php for ($i = 1; $i <= 3; $i++) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item" style="width: 423px;">
                            <img src="./images/support/<?php echo $objResult_s['img_' . $i] ?>" alt="" class="img-fluid">
                            <div class="portfolio-info">
                                <a href="./images/support/<?php echo $objResult_s['img_' . $i] ?>" class="glightbox details-link"><i class="bi bi-zoom-in"></i></a>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        </div>
      </section>
      
      <?php include "index11.php"; ?>

      <?php 
      $strSQL = "SELECT * FROM support";
      $objQuery_ss = mysqli_query($objCon, $strSQL);
      ?>
      <!-- ======= Gallery Section ======= -->
      <section id="gallery" class="gallery">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>กิจกรรมอื่นๆ</h2>
            </div>
            <style>
                .image-container {
                    position: relative;
                }

                .image-container img {
                    width: 100%;
                    height: auto;
                }

                .truncate-overlay {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    margin: 0;
                    padding: 10px; /* ปรับขนาดของพื้นที่ทับให้พอดีกับข้อความ */
                    background: linear-gradient(rgba(255, 255, 255, 0), white); /* ทำพื้นหลังให้กระจายไปทางด้านล่าง */
                }

                .truncate-text {
                    white-space: nowrap;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    color: black;
                }
            </style>

            <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
            <?php while ($objResult_ss = mysqli_fetch_array($objQuery_ss, MYSQLI_ASSOC)) { ?>
                <div class="swiper-slide">
                    <div class="image-container">
                        <img src="./images/support/<?php echo $objResult_ss["sp_img"];?>" class="img-fluid" alt="">
                        <div class="truncate-overlay">
                            <center><p class="truncate-text"><?php echo $objResult_ss["sp_name"]; ?></p></center>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
            </div>

            

        </div>
        </section><!-- End Gallery Section -->
    
        
        <br>
        <br>
        <br>
        <br>

        <footer class="blog-footer footer"  data-aos="fade-up">
          <?php include "footer.php"; ?>
        </footer>
    </main>
  </body>
</html>
<script src="person.js"></script>

<!-- Vendor JS Files -->
<script src="assets_s/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets_s/vendor/aos/aos.js"></script>
  <script src="assets_s/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_s/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_s/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets_s/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_s/js/main.js"></script>

