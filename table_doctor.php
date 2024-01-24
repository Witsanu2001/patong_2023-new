<?php
require('./api/connect.php');

$objCon = connectDB();
$strSQL = "SELECT * FROM table_doctor";
$objQuery = mysqli_query($objCon, $strSQL);
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
    <?php include "header-link.php"; ?> 
  </head>
  <body>
  <div class="scroll-to-top">
    <i class="fa-solid fa-angles-up" style="color: #ffffff;"></i>
  </div>  
  <div class="container">
    <?php include "header.php"; ?>
  </div>

<main class="curtain-container container">
    <!-- <div id="curtain" class="curtain">
    <?php include "slide-page.php"; ?>
    </div> -->
    <?php include "link-boot.php"; ?>


    <nav class="nav link d-flex flex-wrap justify-content-between">
        <?php include "nav-link.php"; ?>
    </nav>
</div>
    <br>
    <div class="row g-5" data-aos="fade-up">
        <div>
        <br>
        <div class="section-header">
          <h2><?php echo $objResult['doctor_name']?></h2>
        </div>
      
        <center>
        <div class="row">
        <img src="./images/table_doctor/<?php echo $objResult['doctor_img']?>" alt="">
        </div>
        </center>
        <br>
        <br>
        <br>
        <br>

        <footer class="blog-footer footer" data-aos="fade-up">
          <?php include "footer.php"; ?>
        </footer>
    </main>
  </body>
</html>
<script src="person.js"></script>
