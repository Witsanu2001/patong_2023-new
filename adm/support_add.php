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
            <form action="support_create.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="row">
                    <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <div class="row mt-6">
                            <!-- แถวที่ 1 -->
                            
                            <div class="col-md-6 mt-3">
                                <label for="sp_name" class="form-label">ชื่อ <span class="text-danger">*</span></label>
                                <input type="text" id="sp_name" name="sp_name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="sp_date" class="form-label">วันที่ <span class="text-danger">*</span></label>
                                <input type="date" id="sp_date" name="sp_date" class="form-control" required>
                            </div>
                            
                            <!-- แถวที่ 2 -->
                            <div class="col-md-7 mt-2"  style="width: 800px;" >
                                <label for="sp_title" class="form-label">รายละเอียด <span class="text-danger">*</span></label>
                                <textarea name="sp_title" id="sp_title" class="form-control" rows="4" required></textarea>
                            </div>
                            <!-- ปุ่มบันทึก -->
                            <div class="col-md-12 mt-3">
                            <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                            <a href="support.php" class="btn btn-warning btn-lg">ยกเลิก</a>
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
                                <label for="sp_img" class="form-label">รูปภาพ</label>
                                <input class="form-control" id="sp_img" name="sp_img" type="file" onchange="loadFile(event)" style="width: 500px;">
                            </div>
                            <div class="col-md-11 mt-3">
                                <img src="../images/noimg.png" class="img-thumbnail" id="img_preview" style="width: 500px;"/>
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
    </script>
