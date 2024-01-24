<?php
require('./api/connect.php');
$objCon = connectDB();
$strSQL = "SELECT * FROM index_img ";
$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

// Get user's IP address
$userIP = $_SERVER['REMOTE_ADDR'];

// Insert the user's IP into the ip_user table
$insertSQL = "INSERT INTO ip_user (ip_address) VALUES ('$userIP')";
mysqli_query($objCon, $insertSQL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <?php include "header-link.php"; ?>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

</head>
<style>
    .hero-animated {
    width: 100%;
    min-height: 100vh;
    background: url("./images/index_img/<?php echo $objResult['img']?>");
    background-size: 100% 100%;
    position: relative;
    padding: 100px 0 60px;
    }

    .hero-animated h2,
    .hero-animated p,
    .hero-animated h2 span {
        color: white;
    }
    .hero-animated h2 span {
        color: #00fdff;
    }

</style>
<body>



<section class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out"
      style="margin-top: 490px;">
      <div class="d-flex">
        <a href="index-page.php" class="btn-get-started scrollto animated" style="width: 224px; margin-left: 100px;">เข้าสู่เว็บไซต์</a>
      </div>
    </div>
  </section>

  <div id="preloader"></div>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>