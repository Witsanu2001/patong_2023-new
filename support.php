<?php
require('./api/connect.php');

$objCon = connectDB();
// $id = $_GET['id'];
$strSQL = "SELECT * FROM job ";
$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <?php include "header-link.php"; ?>
    <script src="index.js"></script>

  </head>
  <body>
    <div class="container">
        <?php include "header.php"; ?>
    </div>
    <main class="container">
        <div class="slide-container">
            <?php include "slide-page.php"; ?>
        </div>
        <link rel="stylesheet" href="index2.css">
            <nav class="nav link d-flex flex-wrap justify-content-between">
              <?php include "nav-link.php"; ?>
            </nav>
        <script src="person.js"></script>
        <?php include "link-boot.php"; ?>

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">

        <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>บริจาค</h2>
            <p>Recent posts form our Blog</p>
        </div>

        <div id="support"></div>

        </div>
        </section><!-- End Recent Blog Posts Section -->
        <br>

        <footer class="blog-footer footer" data-aos="fade-up">
            <?php include "footer.php" ?>
        </footer>
    </main>
    
  </body>
  </html>

  <script>
    $.ajax({
          method: 'GET',
          url: './api/support.php',
          dataType: 'json',
          success: function(response) {
              console.log(response);
              
              if (response.RespCode === 200) {
                  var supportData = response.data;
                  
                  var html = '<div class="row">';
                  for (var i = 0; i < supportData.length; i++) {
                      html += '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="200" style="margin-top: 30px;">';
                      html += '<div class="post-box">';
                      html += '<div class="post-img"><img src="./images/support/' + supportData[i].sp_img + '" class="img-fluid" alt=""></div>';
                      html += '<div class="meta">';
                      html += '<span class="post-date">' + supportData[i].sp_date + '</span>';
                      html += '<span class="post-author"> / Mario Douglas</span>';
                      html += '</div>';
                      html += '<h3 class="post-title">' + supportData[i].sp_name + '</h3>';
                      html += '<p>' + supportData[i].sp_title + '</p>';
                      html += '<a href="support-details.php?id=' + supportData[i].sp_id + '" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>';
                      html += '</div>';
                      html += '</div>';
                  }
                  html += '</div>'; // ปิด row
      
                  $("#support").html(html);
              } else {
                  console.log("มีข้อผิดพลาดในการรับข้อมูล");
              }
          },
          error: function(xhr, status, error) {
              console.log("เกิดข้อผิดพลาดในการเรียก API: ", error);
          }
      });
  </script>