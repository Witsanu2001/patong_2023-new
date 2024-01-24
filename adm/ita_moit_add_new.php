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
$strSQL = "SELECT * FROM ita
INNER JOIN moit ON ita.ita_id = moit.ita_id
WHERE ita.ita_id = $id";

$objQuery = mysqli_query($objCon, $strSQL);
$objQuery_s = mysqli_query($objCon, $strSQL);
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
             
                <div class="row">
                    <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <br>
                        <br>
                        <h3>ปี <?php echo $objResult['year']?></h3>
                        <?php while($objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) { ?>     
                            <h4><?php echo $objResult_s['moit_name']?></h4>
                            <br>
                            <h5><?php echo $objResult_s['moit_title']?></label></h5>
                            <hr style="width:1280px">
                            <?php } ?>

                            <form action="ita_moit_add_create.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <input type="hidden" name="ita_id" value="<?php echo $objResult['ita_id']; ?>"> 
                            <div id="dynamicFields"></div>
                            <br>
                            <button type="button" class="btn btn-primary btn-lg" onclick="addFields()">เพิ่ม</button> 
                            <button type="button"  class="btn btn-danger btn-lg"onclick="removeFields()">ลบ</button>
                            <br>
                            <hr style="width:1280px">
                            <br>
                            <!-- ปุ่มบันทึก -->
                            <div class="col-md-12 mt-3">
                            <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                            <a href="ita.php?id=<?php echo $objResult['ita_id']; ?>" class="btn btn-warning btn-lg">ยกเลิก</a>
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
    

    <script>
    function addFields() {
        var newFields = 
            '<div class="row mt-6">' +
            '<div class="col-md-6 mt-3">' +
            '<label for="moit_name" class="form-label">MOIT Name</label>' +
            '<input type="text" id="moit_name" name="moit_name[]" class="form-control" required style="width: 200px;">' +
            '</div>' +
            '</div>' +
            '<div class="row mt-6">' +
            '<div class="col-md-6 mt-3">' +
            '<label for="moit_title" class="form-label">หัวข้อ MOIT</label>' +
            '<input type="text" id="moit_title" name="moit_title[]" class="form-control" required style="width: 1250px;">' +
            '</div>' +
            '</div>' 
            '<hr style="width:1280px">';

        $('#dynamicFields').append(newFields);
    }

    function removeFields() {
        $('#dynamicFields .row:last').remove();
    }
</script>