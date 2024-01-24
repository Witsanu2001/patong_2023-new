<?php
session_start();

if(!isset($_SESSION['user'])) {
  echo '<script>alert("กรุณาเข้าสู่ระบบก่อน!!!");window.location="login.php";</script>';
  die();
}


// ตรวจสอบว่าเป็นผู้ใช้ทั่วไปหรือไม่
if ($_SESSION['user'] !== 'user02' && $_SESSION['user'] !== 'admin') {
    $_SESSION['error'] = 'ไม่สามารถเข้าถึงได้';
    echo '<script>alert("ไม่สามารถเข้าถึงได้");window.location="index-page.php";</script>';
    die();
}
?>


<?php
require('./api/connect.php');

$objCon = connectDB();
$id = $_GET['id'];
$strSQL = "SELECT * FROM moit WHERE ita_id = $id";
$objQuery = mysqli_query($objCon, $strSQL);
$objQuery_s = mysqli_query($objCon, $strSQL);
$objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">

    <title>โรงพยาบาลป่าตอง : Patong hospital</title>
    <link rel="icon" href="../images/logo.png">
    <?php include "header-link.php"; ?>
    <link rel="stylesheet" href="index2.css">

    
  </head>


 
  <body>

    
    <div class="container">
        <?php include "header.php"; ?>  
    </div>

<main class="curtain-container container">
    

    <nav class="nav link d-flex flex-wrap justify-content-between">
        <?php include "nav-link.php"; ?>
    </nav>
</div>
</div>


    
    
    <?php include "link-boot.php"; ?>
    <center>
      <section id="departments" class="departments">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
              <img src="../images/logo.png" alt="">
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
                
              <h3>ITA <strong><?php echo $result['year']; ?></strong> 

              <!-- <a href="ita_edit.php?id=<?php echo $result['ita_id']; ?>">
                <button class="btn btn-warning">แก้ไข</button>
              </a> -->

              <a href="ita_moit_add_new.php?id=<?php echo $result['ita_id']; ?>" class="btn btn-success">
                เพิ่ม MOIT
              </a>

              <a href="#" class="btn btn-danger" onclick="deleteItem(<?php echo $result['ita_id']; ?>);">ลบ</a>
                        

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            function deleteItem(indexId) {
                                Swal.fire({
                                    title: 'คุณแน่ใจหรือไม่?',
                                    text: "คุณต้องการลบรายการนี้ใช่หรือไม่?",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'ใช่, ลบ!',
                                    cancelButtonText: 'ยกเลิก'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // ถ้าผู้ใช้คลิก "ใช่"
                                        window.location.href = 'ita_delete.php?id=' + indexId;
                                    }
                                });
                            }
                        </script>
                
            </h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
            </div>

            <div class="accordion accordion-flush px-xl-5" id="faqlist" style="width: 1270px;">
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
                  <b><?php echo $objResult['moit_name'].' '.$objResult['moit_title']; ?>
                  <a href="ita_moit_edit.php?id=<?php echo $objResult['moit_id']; ?>"><i class="bi bi-pencil-square"></i></a></b>
                  <br>
                  <br>
                  <?php
                     $strSQL_head = "SELECT head.head_id, head.head_name, head.head_pdf FROM head WHERE head.moit_id = {$objResult['moit_id']}";
                     $objQuery_head = mysqli_query($objCon, $strSQL_head);

                     if ($objQuery_head) {
                         while ($objResult_head = mysqli_fetch_array($objQuery_head, MYSQLI_ASSOC)) {
                             ?>
                             <p  id="head-<?php echo $objResult['moit_id']; ?>-<?php echo $objResult_head['head_name']; ?>">
                              - <?php echo $objResult_head['head_name']; ?>
                              <a href="ita_head_edit.php?id=<?php echo $objResult_head['head_id']; ?>"><i class="bi bi-pencil-square"></i>
                              <a href="ita_head_edit.php?id=<?php echo $objResult_s['ita_id']; ?>"></a>
                              </a>
                             </p>
                             <?php
                             $pdfFileName = $objResult_head['head_pdf'];
                             if (!empty($pdfFileName)) {
                                 ?>
                                 <a class="nav-link" href="../pdf_ita/<?php echo $pdfFileName; ?>" target="_blank" style="color: blue;margin-top: -10px;">คลิกดูรายละเอียดเพิ่มเติม</a><br>
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
                    <a href="ita_head_add.php?id=<?php echo $objResult['moit_id'];?>" class="btn btn-outline-primary">เพิ่มหัวข้อ</a>
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




