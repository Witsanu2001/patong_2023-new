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
$strSQL = "SELECT * FROM table_doctordental";
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

    <br>
        <div class="row g-5" data-aos="fade-up">
          <div class="section-header">
            <h2><?php echo $objResult['dental_name']?>&nbsp;<a href="table_doctordental_edit.php?id=<?php echo $objResult ['dental_id']?>"><i class="bi bi-pencil-square"></i></a></h2>
          </div>
          
          <center>
            <div class="row">
              <img src="../images/table_doctordental/<?php echo $objResult['dental_img']?>" alt="">
            </div>               
          </center>
        </div>
        <br>
        <br>
        <footer class="blog-footer footer" data-aos="fade-up">
          <?php include "footer.php"; ?>
        </footer>
    </main>
  </body>
</html>
<script src="person.js"></script>
