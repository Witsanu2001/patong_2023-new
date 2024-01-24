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
$strSQL = "SELECT * FROM activity WHERE atv_id = $id";
$objQuery = mysqli_query($objCon, $strSQL);
$objQuery_s = mysqli_query($objCon, $strSQL);
$objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC);

  
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
            <form action="atv_update.php" id="form_update" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="atv_id" value="<?php echo $objResult_s['atv_id']; ?>">
                <div class="row" style="width: 1270px;">
                    <div class="col-md-10">
                        <!-- ข้อมูลเนื้อหา -->
                        <div class="row mt-6" style="width: 1270px;">
                            <!-- แถวที่ 1 -->
                            
                            <div class="col-md-6 mt-3" style="width: 1250px;">
                                <label for="atv_name" class="form-label">ชื่อกิจกรรม <span class="text-danger">*</span></label>
                                <input type="text" id="atv_name" name="atv_name" value="<?php echo $objResult_s['atv_name']; ?>" class="form-control" required>
                            </div>
                            
                            <!-- แถวที่ 2 -->
                            <div class="col-md-7 mt-2"  style="width: 1250px;" >
                                <label for="atv_title" class="form-label">รายละเอียด <span class="text-danger">*</span></label>
                                <textarea name="atv_title" id="atv_title" class="form-control" rows="4" required><?php echo $objResult_s['atv_title']; ?></textarea>
                            </div>
                            
                            <div class="col-md-6 mt-3" style="width: 250px;">
                                <label for="atv_date" class="form-label">วันที่ทำกิจกรรม <span class="text-danger">*</span></label>
                                <input type="date" id="atv_date" name="atv_date" value="<?php echo isset($_POST['atv_date']) ? $_POST['atv_date'] : $objResult_s['atv_date']; ?>" class="form-control" required style="width: 200px;">
                            </div>


                            <div class="col-md-6 mt-3">
                                <label for="atv_location" class="form-label">สถานที่ทำกิจกรรม <span class="text-danger">*</span></label>
                                <input type="text" id="atv_location" name="atv_location" value="<?php echo $objResult_s['atv_location'];?>" class="form-control" required style="width: 970px;">
                            </div>

                        </div>
                

    
                    <!-- ข้อมูลรูปภาพ 1 -->
                    <?php while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) { ?>
                        <?php for ($i = 1; $i <= 8; $i++) { ?>
                            <!-- ข้อมูลรูปภาพ <?php echo $i; ?> -->
                            <div class="row mt-8" style="width: 600px;">
                                <div class="col-md-11 mt-3">
                                    <label for="atv_img<?php echo $i; ?>" class="form-label">รูปภาพ <?php echo $i; ?></label>
                                    <input class="form-control" id="atv_img<?php echo $i; ?>" name="atv_img<?php echo $i; ?>" type="file" onchange="loadFile<?php echo $i; ?>(event)" style="width: 500px;">
                                </div>
                                <div class="col-md-11 mt-3">
                                    <?php if ($objResult['atv_img' . $i] != '') { ?>
                                        <img src="../images/activity/<?php echo $objResult['atv_img' . $i]; ?>" class="img-thumbnail" id="img_preview<?php echo $i; ?>" />
                                    <?php } else { ?>
                                        <img src="../images/noimg.png" class="img-thumbnail" id="img_preview<?php echo $i; ?>" />
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <!-- ปุ่มบันทึก -->
                    <div class="col-md-12 mt-3">
                        <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                        <a href="act.php" class="btn btn-warning btn-lg">ยกเลิก</a>
                        <a href="#" class="btn btn-danger btn-lg" onclick="deleteItem(<?php echo $objResult_s['atv_id']; ?>);">ลบ</a>
                        
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
                                        window.location.href = 'atv_delete.php?id=' + indexId;
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
                                            document.getElementById('form_update').submit();
                                        }
                                    });
                                }
                        </script>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </form>
     

      <footer class="blog-footer footer" data-aos="fade-up">
        <?php include "footer.php" ?>
      </footer>

    </main>
</body>
</html>

<script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/script.js"></script>
    <script>
        var loadFile1 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview1');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile2 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview2');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile3 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview3');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile4 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview4');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile5 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview5');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile6 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview6');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile7 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview7');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile8 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview8');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
