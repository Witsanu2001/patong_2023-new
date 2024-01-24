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
$strSQL = " SELECT * FROM ita WHERE ita_id = $id";
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
            <form action="ita_moit_add_create.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="ita_id" value="<?php echo $objResult['ita_id']; ?>">   
                <div class="row">
                    <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <br>
                        <br>
                        <h3>ปี <?php echo $objResult['year']?></h3>

                        <?php for ($i = 1; $i <= 22; $i++) { ?>
                            <div class="row mt-6">
                            <div class="col-md-6 mt-3">
                                <label for="moit_name" class="form-label">MOIT</label>
                                <input type="text" id="moit_name" name="moit_name[]" value="MOIT <?php echo $i ?>" class="form-control" required style="width: 200px;">
                            </div>
                            </div>
                            <div class="row mt-6">
                                <div class="col-md-6 mt-3">
                                    <label for="moit_title" class="form-label">หัวข้อ MOIT <?php echo $i ?><span class="text-danger">*</span></label>
                                    <input type="text" id="moit_title" name="moit_title[]" class="form-control" required style="width: 1250px;">
                                </div>
                            </div>
                            <br>
                            <hr style="width:1280px">
                        <?php } ?>
                        <br>
                            <!-- ปุ่มบันทึก -->
                            <div class="col-md-12 mt-3">
                            <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                            <a href="index-page.php" class="btn btn-warning btn-lg">ยกเลิก</a>
                            <button type="reset" class="btn btn-danger btn-lg">ล้างค่า</button>
                           
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
                                            document.getElementById('form_create').submit();
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

      <footer class="blog-footer footer" data-aos="fade-up">
        <?php include "footer.php" ?>
      </footer>

    </main>
</body>
</html>

<script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/script.js"></script>
    