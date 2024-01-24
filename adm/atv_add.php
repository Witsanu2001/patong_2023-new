<?php
session_start();

if(!isset($_SESSION['user'])) {
  echo '<script>alert("กรุณาเข้าสู่ระบบก่อน!!!");window.location="login.php";</script>';
  die();
}

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
            <form action="atv_create.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="row" style="width: 1270px;">
                    <div class="col-md-10">
                        <!-- ข้อมูลเนื้อหา -->
                        <div class="row mt-6" style="width: 1270px;">
                            <!-- แถวที่ 1 -->
                            
                            <div class="col-md-6 mt-3" style="width: 1250px;">
                                <label for="atv_name" class="form-label">ชื่อกิจกรรม <span class="text-danger">*</span></label>
                                <input type="text" id="atv_name" name="atv_name" class="form-control" required>
                            </div>
                            
                            <!-- แถวที่ 2 -->
                            <div class="col-md-7 mt-2"  style="width: 1250px;" >
                                <label for="atv_title" class="form-label">รายละเอียด <span class="text-danger">*</span></label>
                                <textarea name="atv_title" id="atv_title" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="col-md-6 mt-3" style="width: 250px;">
                                <label for="atv_date" class="form-label">วันที่ทำกิจกรรม <span class="text-danger">*</span></label>
                                <input type="date" id="atv_date" name="atv_date" class="form-control" required style="width: 200px;">
                            </div>
                            
                            <div class="col-md-6 mt-3">
                                <label for="atv_location" class="form-label">สถานที่ทำกิจกรรม <span class="text-danger">*</span></label>
                                <input type="text" id="atv_location" name="atv_location" class="form-control" required style="width: 970px;">
                            </div>
                           
                        </div>
                    </div>
                

                   
                    <!-- ข้อมูลรูปภาพ 1 -->
                
                            
                            <?php for ($i = 1; $i <= 8; $i++) { ?>
                                <!-- ข้อมูลรูปภาพ <?php echo $i; ?> -->
                                <div class="row mt-8" style="width: 600px;">
                                    <div class="col-md-11 mt-3">
                                        <label for="atv_img<?php echo $i; ?>" class="form-label">รูปภาพ <?php echo $i; ?></label>
                                        <input class="form-control" id="atv_img<?php echo $i; ?>" name="atv_img<?php echo $i; ?>" type="file" onchange="loadFile<?php echo $i; ?>(event)" style="width: 500px;">
                                    </div>
                                    <div class="col-md-11 mt-3">     
                                        <center><img src="../images/noimg.png" class="img-thumbnail" id="img_preview<?php echo $i; ?>" /></center>
                                    </div>
                                </div>
                            <?php } ?>
                        <br>
                        <br>
                        <br>
                    <!-- ปุ่มบันทึก -->
                    <center>
                    <div class="col-md-12 mt-3">
                        <br>
                    <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                    <a href="act.php" class="btn btn-warning btn-lg">ยกเลิก</a>
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
                    </center>
                </div>
            </form>
    </main>
    <br>
      <br>
      <br>
      <br>
           
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
