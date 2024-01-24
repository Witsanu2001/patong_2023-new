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
            <form action="index-pag_create.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <div class="row mt-6">
                            <!-- แถวที่ 1 -->
                            
                            <div class="col-md-6 mt-3">
                                <label for="np_name" class="form-label">ชื่อข่าวประชาสัมพันธ์ <span class="text-danger">*</span></label>
                                <input type="text" id="np_name" name="np_name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="np_date" class="form-label">วันที่ลงประชาสัมพันธ์ <span class="text-danger">*</span></label>
                                <input type="date" id="np_date" name="np_date" class="form-control" required>
                            </div>
                            
                            <!-- แถวที่ 2 -->
                            <div class="col-md-7 mt-2"  style="width: 800px;" >
                                <label for="np_title" class="form-label">รายละเอียดข่าวประชาสัมพันธ์  <span class="text-danger">*</span></label>
                                <textarea name="np_title" id="np_title" class="form-control" rows="4" required></textarea>
                            </div>

                            <div class="col-md-7 mt-2"  style="width: 800px;" >
                                <label for="np_details" class="form-label">รายละเอียดข่าวประชาสัมพันธ์เพิ่มเติม <span class="text-danger">*</span></label>
                                <textarea name="np_details" id="np_details" class="form-control" rows="4" required></textarea>
                            </div>
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
                    <duv class="col-md-3">
                        <!-- ข้อมูลรูปภาพ -->
                        <div class="row mt-6" style="width: 800px;">
                            <div class="col-md-11 mt-3">
                                <label for="np_img" class="form-label">รูปภาพข่าวประชาสัมพันธ์</label>
                                <input class="form-control" id="np_img" name="np_img" type="file" onchange="loadFile(event)" style="width: 500px;">
                            </div>
                            <div class="col-md-11 mt-3">
                                <img src="../images/noimg.png" class="img-thumbnail" id="img_preview" style="width: 500px;"/>
                            </div>
                        </div>
                        <div class="row mt-6" style="width: 800px;">
                            <div class="col-md-11 mt-3">
                                <label for="img_1" class="form-label">รูปภาพข่าวประชาสัมพันธ์ 1</label>
                                <input class="form-control" id="img_1" name="img_1" type="file" onchange="loadFile_img1(event)" style="width: 500px;">
                            </div>
                            <div class="col-md-11 mt-3">
                                <img src="../images/noimg.png" class="img-thumbnail" id="img_preview_img1" style="width: 500px;"/>
                            </div>
                        </div>
                        <div class="row mt-6" style="width: 800px;">
                            <div class="col-md-11 mt-3">
                                <label for="img_2" class="form-label">รูปภาพข่าวประชาสัมพันธ์ 2</label>
                                <input class="form-control" id="img_2" name="img_2" type="file" onchange="loadFile_img2(event)" style="width: 500px;">
                            </div>
                            <div class="col-md-11 mt-3">
                                <img src="../images/noimg.png" class="img-thumbnail" id="img_preview_img2" style="width: 500px;"/>
                            </div>
                        </div>
                        <div class="row mt-6" style="width: 800px;">
                            <div class="col-md-11 mt-3">
                                <label for="img_3" class="form-label">รูปภาพข่าวประชาสัมพันธ์ 3</label>
                                <input class="form-control" id="img_3" name="img_3" type="file" onchange="loadFile_img3(event)" style="width: 500px;">
                            </div>
                            <div class="col-md-11 mt-3">
                                <img src="../images/noimg.png" class="img-thumbnail" id="img_preview_img3" style="width: 500px;"/>
                            </div>
                        </div>
                    </duv>
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
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile_img1 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview_img1');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile_img2 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview_img2');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        var loadFile_img3 = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('img_preview_img3');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
