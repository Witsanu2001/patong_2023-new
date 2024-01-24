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
$strSQL = "SELECT * FROM index_img WHERE index_id = $id";
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
            <form action="index_img_update.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="index_id" value="<?php echo $objResult['index_id']; ?>">
            <input type="hidden" name="index_name" value="img">
                <div class="row">
                <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <div class="row mt-6">
                            <!-- แถวที่ 1 -->
                            
                            
                            <!-- ปุ่มบันทึก -->
                        <br>
                        <div class="col-md-12 mt-3" style="margin-left: 90px;">
                        <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                        <a href="index.php" class="btn btn-warning btn-lg">ยกเลิก</a>
                        <a href="#" class="btn btn-danger btn-lg" onclick="deleteItem(<?php echo $objResult['index_id']; ?>);">Delete</a>
                        </div>

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
                                        window.location.href = 'index-pag_delete.php?id=' + indexId;
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
                        </div>
                    </div>
                    <duv class="col-md-3">
                        <!-- ข้อมูลรูปภาพ -->
                        <div class="row mt-6" style="width: 500px; margin-left: -160px; ">
                            <div class="col-md-11 mt-3" style="margin-left: 170px;">
                                <label for="img" class="form-label">รูปภาพ</label>
                                <input class="form-control" id="img" name="img" type="file" onchange="loadFile(event)" style="width: 375px;">
                            </div>
                            <div class="col-md-11 mt-3" style="margin-left: 170px;">
                            <?php if ($objResult['img'] != '') { ?>
                                <img src="../images/index_img/<?php echo $objResult['img']; ?>" class="img-thumbnail" id="img_preview" style="width: 380px;"/>
                            <?php } else { ?>
                                <img src="../imgs/noimg.png" class="img-thumbnail" id="img_preview" />
                            <?php } ?>
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
