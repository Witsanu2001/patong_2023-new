<?php
session_start();

if(!isset($_SESSION['user'])) {
    echo '<script>alert("กรุณาเข้าสู่ระบบก่อน!!!");window.location="login.php";</script>';
    die();
  }
?>

<?php
require('./api/connect.php');
$id = $_GET['id'];
$objCon = connectDB();
$strSQL = "SELECT * FROM contact WHERE ct_id = $id";
$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)
  
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
            <form action="contact_update.php" id="form_update" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="ct_id" value="<?php echo $objResult['ct_id']; ?>">   
                <div class="row">
                    <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <div class="row mt-6">
                            <!-- แถวที่ 1 -->
                            
                            <div class="col-md-6 mt-3" style="width: 800px;" >
                                <label for="ct_name" class="form-label">การติดต่อโรงพยาบาล <span class="text-danger">*</span></label>
                                <input type="text" id="ct_name" name="ct_name" value="<?php echo $objResult['ct_name']; ?>" class="form-control" required style="width: 1260px; height: 59px;">
                            </div>
                            <!-- ปุ่มบันทึก -->
                            <div class="col-md-12 mt-3">
                                <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                                <a href="index-page.php" class="btn btn-warning btn-lg">ยกเลิก</a>
                                
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                <script>
                                
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
                                                    document.getElementById('form_update').submit();
                                                }
                                            });
                                        }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
      <br>
      <br>
      <br>
      <br>
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

