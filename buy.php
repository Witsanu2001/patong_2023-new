<?php
require('./api/connect.php');

$objCon = connectDB();
// $id = $_GET['id'];
$strSQL = "SELECT * FROM buy ";
$objQuery = mysqli_query($objCon, $strSQL);
?>

<?php 

$strSQL = "SELECT * FROM hire ";
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
            $strSQL = "SELECT * FROM index_pag WHERE b_id = 2";
            $objQuery_j = mysqli_query($objCon, $strSQL);
            $objResult_j = mysqli_fetch_array($objQuery_j, MYSQLI_ASSOC);
            ?>
            <div class="section-header">
            <h2><?php echo $objResult_j['b_name'];?></h2>
            <!-- <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p> -->
            </div>

            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-5">
                <div class="about-img">
                <img src="./images/logo-page/<?php echo $objResult_j['b_logo'];?>" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-7">
                

                <!-- Tabs -->
                <ul class="nav nav-pills mb-3">
                <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">ประกาศจัดซื้อ</a></li>
                <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">จัดจ้าง</a></li>
                </ul><!-- End Tabs -->

                <!-- Tab Content -->
                <div class="tab-content">

                <div class="tab-pane fade show active" id="tab1">

                <?php while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) { ?>
                    <p><strong><?php echo $objResult['buy_name'];?></strong></p>
                    <p>ประกาศเมื่อวันที่ <?php echo $objResult['buy_date'];?></p>
                    <p>คลิกดูรายละเอียดเพิ่มเติม >>> <?php
                             $pdfFileName =$objResult['buy_pdf'];
                             if (!empty($pdfFileName)) {
                                 ?>
                                 <a href="./buy_pdf/<?php echo $pdfFileName; ?>" target="_blank" style="color: blue;margin-top: -10px;">คลิกดูรายละเอียดเพิ่มเติม</a><br>
                                 <?php
                             } else {
                                 ?>
                                 <p>ไม่มีไฟล์ PDF</p>
                                 <?php
                             }?></p>
                <hr>    
                <?php } ?>
                </div><!-- End Tab 1 Content -->

                <div class="tab-pane fade show" id="tab2">
                <?php while ($objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) { ?>
                    <p><strong><?php echo $objResult_s['h_name'];?></strong></p>
                    <p>ประกาศเมื่อวันที่ <?php echo $objResult_s['h_date'];?></p>
                    <p>คลิกดูรายละเอียดเพิ่มเติม >>> <?php
                                $pdfFileName =$objResult_s['h_pdf'];
                                if (!empty($pdfFileName)) {
                                    ?>
                                    <a href="./h_pdf/<?php echo $pdfFileName; ?>" target="_blank" style="color: blue;margin-top: -10px;">คลิกดูรายละเอียดเพิ่มเติม</a><br>
                                    <?php
                                } else {
                                    ?>
                                    <p>ไม่มีไฟล์ PDF</p>
                                    <?php
                                }?></p>
                        <hr>
                    <?php } ?>
                </div><!-- End Tab 2 Content -->
                </div>
            </div>
            </div>
        </div>
        </section><!-- End About Section -->
        <br>
        <br>
        <br>
        <footer class="blog-footer footer" data-aos="fade-up">
            <?php include "footer.php" ?>
        </footer>
    </main>
    
  </body>
  </html>