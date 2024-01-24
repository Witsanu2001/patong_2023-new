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
// $id = $_GET['id'];
$strSQL = "SELECT * FROM job WHERE b_id = 1";
$objQuery = mysqli_query($objCon, $strSQL);
?>

<?php

$strSQL = "SELECT * FROM job_work ";
$objQuery_s = mysqli_query($objCon, $strSQL);

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

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            

            <?php 
            $strSQL = "SELECT * FROM index_pag WHERE b_id = 1";
            $objQuery_j = mysqli_query($objCon, $strSQL);
            $objResult_j = mysqli_fetch_array($objQuery_j, MYSQLI_ASSOC);
            ?>
            <div class="section-header">
            <h2><?php echo $objResult_j['b_name'];?>&nbsp;<a href="home_pag_edit.php?id=<?php echo $objResult_j['b_id'];?>"><i class="bi bi-pencil-square"></i></a></h2>
            <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
            </div>

            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-5">
                <div class="about-img">
                <img src="../images/logo-page/<?php echo $objResult_j['b_logo'];?>" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-7">
                

                <!-- Tabs -->
                <ul class="nav nav-pills mb-3">
                <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">รับสมัครงาน</a></li>
                <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">ประกาศรับสมัครงาน</a></li>
                </ul><!-- End Tabs -->

                <!-- Tab Content -->
                <div class="tab-content">

                <div class="tab-pane fade show active" id="tab1">

                <?php while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) { ?>
                    <h4><?php echo $objResult['job_name'];?><a href="job_edit.php?id=<?php echo $objResult['job_id'];?>">&nbsp;<i class="bi bi-pencil-square"></i></a></h4>
                    <div class="d-flex align-items-center mt-4">
                    
                    <p><strong><?php echo $objResult['job_title'];?></strong></p>
                    <p>ประกาศเมื่อวันที่ <?php echo $objResult['job_date'];?></p>
                    </div>
                    <p>คลิกดูรายละเอียดเพิ่มเติม >>> <?php
                             $pdfFileName =$objResult['job_pdf'];
                             if (!empty($pdfFileName)) {
                                 ?>
                                 <a href="../job_pdf/<?php echo $pdfFileName; ?>" target="_blank" style="color: blue;margin-top: -10px;">คลิกดูรายละเอียดเพิ่มเติม</a><br>
                                 <?php
                             } else {
                                 ?>
                                 <p>ไม่มีไฟล์ PDF</p>
                                 <?php
                             }?></p>
                             <hr>                
                <?php } ?>
                <button type="button" class="btn btn-outline-primary"><a href="job_add.php">เพิ่ม</a></button>
                </div><!-- End Tab 1 Content -->

                <div class="tab-pane fade show" id="tab2">
                <?php while ($objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) { ?>
                    <h4><?php echo $objResult_s['jw_name'];?><a href="job_work_edit.php?id=<?php echo $objResult_s['jw_id'];?>">&nbsp;<i class="bi bi-pencil-square"></i></a></h4>
                        <div class="d-flex align-items-center mt-4">
                        
                        <p><strong><?php echo $objResult_s['jw_title'];?></strong></p>
                        <p>ประกาศเมื่อวันที่ <?php echo $objResult_s['jw_date'];?></p>
                        </div>
                        <p>คลิกดูรายละเอียดเพิ่มเติม >>> <?php
                                $pdfFileName =$objResult_s['jw_pdf'];
                                if (!empty($pdfFileName)) {
                                    ?>
                                    <a href="../job_work_pdf/<?php echo $pdfFileName; ?>" target="_blank" style="color: blue;margin-top: -10px;">คลิกดูรายละเอียดเพิ่มเติม</a><br>
                                    <?php
                                } else {
                                    ?>
                                    <p>ไม่มีไฟล์ PDF</p>
                                    <?php
                                }?></p>
                                <hr>
                    <?php } ?>
                    <button type="button" class="btn btn-outline-primary"><a href="job_work_add.php">เพิ่ม</a></button>
                </div><!-- End Tab 2 Content -->
                </div>
            </div>
            </div>
        </div>
        </section><!-- End About Section -->
        <footer class="blog-footer footer" data-aos="fade-up">
            <?php include "footer.php" ?>
        </footer>
    </main>
    
  </body>
  </html>