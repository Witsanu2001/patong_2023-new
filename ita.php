<?php
require('./api/connect.php');

$objCon = connectDB();
$id = $_GET['id'];
$strSQL = "SELECT * FROM moit WHERE ita_id = $id";
$objQuery = mysqli_query($objCon, $strSQL);

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

    <style>
      .yaw{
        width: 1270px;
      }
      @media (max-width: 768px) {
      .yaw {
        width: 350px;
      }
    }
    </style>

  </head>
<body>
  <div class="container">
    <?php include "header.php"; ?>  
  </div>
  
  <main class="curtain-container container">
    <nav class="nav link d-flex flex-wrap justify-content-between">
        <?php include "nav-link.php"; ?>
    </nav>
    <?php include "link-boot.php"; ?>
    <center>
      <section id="departments" class="departments">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
              <img src="./images/logo.png" alt="">
            </div>
        </div>
      </section>
    </center>

        <?php
        $sql = "SELECT * FROM ita WHERE ita_id = $id";
        $query = mysqli_query($objCon, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC)
        ?>
     <!-- ======= F.A.Q Section ======= -->
     <section id="faq" class="faq">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content px-xl-5">
                
              <h3>ITA <strong><?php echo $result['year']; ?></strong></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>
           
            <div class="accordion accordion-flush px-xl-5 yaw" id="faqlist">
       
            <?php
            $counter = 1; // เริ่มต้นตัวแปรนับค่า
            while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
            ?>
             <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
            <h3 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $counter; ?>">
                    <i class="bi bi-bookmark-star question-icon"></i>
                    <?php echo $objResult['moit_name']; ?>
                  </button>
                </h3>
                <div id="faq-content-<?php echo $counter; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
            <div class="accordion-body">
                  <b><?php echo $objResult['moit_name'].' '.$objResult['moit_title']; ?></b>
                  <br><br>
                  <?php
                     $strSQL_head = "SELECT head.head_name, head.head_pdf FROM head WHERE head.moit_id = {$objResult['moit_id']}";
                     $objQuery_head = mysqli_query($objCon, $strSQL_head);

                     if ($objQuery_head) {
                         while ($objResult_head = mysqli_fetch_array($objQuery_head, MYSQLI_ASSOC)) {
                             ?>
                             <p  id="head-<?php echo $objResult['moit_id']; ?>-<?php echo $objResult_head['head_name']; ?>">
                              - <?php echo $objResult_head['head_name']; ?>
                             </p>
                             <?php
                             $pdfFileName = $objResult_head['head_pdf'];
                             if (!empty($pdfFileName)) {
                                 ?>
                                 <a class="nav-link" href="./pdf_ita/<?php echo $pdfFileName; ?>" target="_blank" style="color: blue;margin-top: -10px;">คลิกดูรายละเอียดเพิ่มเติม</a><br>
                                 <?php
                             } else {
                                 ?>
                                 <p class="nav-link">ไม่มีไฟล์ PDF</p>
                                 <?php
                             }
                         }
                     } else {
                         echo "Error: " . mysqli_error($objCon);
                     }
                    ?>
                  </div>
                </div>
              </div><!-- # Faq item-->
              <?php
              $counter++; // เพิ่มค่าตัวแปรนับค่าเมื่อจบลูป
                }
                ?>
              
            </div>

          </div>

          <!-- <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("./images/logo.jpg");'>&nbsp;</div> -->
        </div>

      </div>
    </section><!-- End F.A.Q Section -->
    

        <br>
        <br>
        <br>
        <br>
<footer class="blog-footer footer">
  <?php include "footer.php"; ?>
</footer>
</main>
  </body>
</html>




