<?php
session_start();

if(!isset($_SESSION['user'])) {
    echo '<script>alert("กรุณาเข้าสู่ระบบก่อน!!!");window.location="login.php";</script>';
    die();
  }

// ตรวจสอบว่าเป็นผู้ใช้ทั่วไปหรือไม่
if ($_SESSION['user'] !== 'user02' && $_SESSION['user'] !== 'admin') {
    $_SESSION['error'] = 'ไม่สามารถเข้าถึงได้';
    header("Location: index-page.php");
    exit();
}

?>

<?php
require('./api/connect.php');
$id = $_GET['id'];
$objCon = connectDB();
$strSQL = "SELECT * FROM head WHERE head_id = $id";
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
    <?php include "header-link.php"; ?>

  </head>
  <body>

  <div class="container">
    <?php include "header.php"; ?>
  </div>
  
      <main  class="container">
        <nav class="nav link d-flex flex-wrap justify-content-between">
            <?php include "nav-link.php"; ?>
        </nav>
        <?php include "link-boot.php"; ?>


        <form action="ita_head_update.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="head_id" value="<?php echo $objResult['head_id']; ?>"> 
                <div class="row">
                    <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <br>
                        <br>
                    
                            <div class="col-md-6 mt-3" style="width: 800px;">
                                <label for="head_name" class="form-label">ชื่อหัวข้อ MOIT<span class="text-danger">*</span></label>
                                <input type="text" id="head_name" name="head_name" value="<?php echo $objResult['head_name']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mt-6" style="width: 800px;">
                            <div class="col-md-11 mt-3">
                                <label for="head_pdf" class="form-label">เปลี่ยนไฟล์ PDF</label>
                                <input class="form-control" id="head_pdf" name="head_pdf" type="file" onchange="loadFile(event)" style="width: 500px;">
                                <br>
                            </div>
                            <?php
                             $pdfFileName =$objResult['head_pdf'];
                             if (!empty($pdfFileName)) {
                                 ?>
                                 <a href="../pdf_ita/<?php echo $pdfFileName; ?>" target="_blank" style="color: blue;margin-top: -10px;">คลิกดูpdf</a><br>
                                 <?php
                             } else {
                                 ?>
                                 <p>ไม่มีไฟล์ PDF</p>
                                 <?php
                             }?>
                        </div>
                     
                        </div>
                        <div class="col-md-12 mt-3">

                                <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                                <!-- <a href="ita.php?id=<?php echo $objResult['ita_id']; ?>" class="btn btn-warning btn-lg">ยกเลิก</a> -->
                                <a href="#" class="btn btn-danger btn-lg" onclick="deleteItem(<?php echo $objResult['head_id']; ?>);">ลบ</a>
                                

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
                                                window.location.href = 'ita_head_delete.php?id=' + indexId;
                                            }
                                        });
                                    }

                                    function saveItem() {
                                            Swal.fire({
                                                title: 'คุณต้องการที่จะบันทึกหรือไม่?',
                                                icon: 'question',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'บันทึก'
                                            }).then((result) => {
                                                // ถ้าผู้ใช้กดปุ่ม "บันทึก"
                                                if (result.isConfirmed) {
                                                    // ดำเนินการ submit ฟอร์ม
                                                    document.getElementById('form_create').submit();
                                                }
                                            });
                                        }
                                </script>
                                
                            </div>
                    </div>
                    
                </div>
            </form>
      <br>
      <br>
      <br>
      <br>

      <footer class="blog-footer footer" data-aos="fade-up">
        <?php include "footer.php" ?>
      </footer>

    </main>
</body>
</html>

<script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/script.js"></script>
    