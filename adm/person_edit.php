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
$strSQL = "SELECT * FROM ceo_manage WHERE ceo_id = $id";
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
        <br><br>
        <div class="section-header">
          <h4>แก้ไขรายชื่อผู้บริหารโรงพยาบาลป่าตอง</h4>
        </div>
            <form action="person_update.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="ceo_id" value="<?php echo $objResult['ceo_id']; ?>">
                <div class="row">
                    <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <div class="row mt-6">
                            <!-- แถวที่ 1 -->
                            
                            <div class="col-md-6 mt-3">
                                <label for="ceo_name" class="form-label">ชื่อกิจกรรม <span class="text-danger">*</span></label>
                                <input type="text" id="ceo_name" name="ceo_name" value="<?php echo $objResult['ceo_name']; ?>" class="form-control" required>
                            </div>

                            <div class="col-md-6 mt-3">
                                <label for="ceo_position" class="form-label">ตำแหน่ง <span class="text-danger">*</span></label>
                                <input type="text" id="ceo_position" name="ceo_position" value="<?php echo $objResult['ceo_position']; ?>" class="form-control" required>
                            </div>
                            
                        
                            <!-- ปุ่มบันทึก -->
                            <div class="col-md-12 mt-3">
                                

                                
                                <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                                <a href="person.php" class="btn btn-warning btn-lg">ยกเลิก</a>
                                <a href="#" class="btn btn-danger btn-lg" onclick="deleteItem(<?php echo $objResult['ceo_id']; ?>);">ลบ</a>
                            
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
                                                window.location.href = 'person_delete.php?id=' + indexId;
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
                    <duv class="col-md-3">
                        <!-- ข้อมูลรูปภาพ -->
                        <div class="row mt-6">
                            <div class="col-md-11 mt-3">
                                <label for="ceo_img" class="form-label">รูปภาพ <span class="text-danger">ขนาดรูปภาพ 600*600</span></label>
                                <input class="form-control" id="ceo_img" name="ceo_img" type="file" onchange="loadFile(event)">
                            </div>
                            <div class="col-md-11 mt-3">
                            <?php if ($objResult['ceo_img'] != '') { ?>
                                <img src="../images/ceo/<?php echo $objResult['ceo_img']; ?>" class="img-thumbnail" id="img_preview" />
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