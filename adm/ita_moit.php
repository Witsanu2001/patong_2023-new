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
            <input type="hidden" name="ita_id" value="<?php echo $objResult['ita_id']; ?>"> 
                <div class="row">
                    <div class="col-md-7">
                        <!-- ข้อมูลเนื้อหา -->
                        <br>
                        <br>
                        <h3>ปี <?php echo $objResult['year']?>&nbsp;&nbsp;<a href="ita_moit_add_new.php?id=<?php echo $objResult['ita_id']; ?>"  class="btn btn-warning">เพิ่ม MOIT</a>
                        <a href="ita.php?id=<?php echo $objResult['ita_id']; ?>"  class="btn btn-outline-success">กลับสู่หน้า ITA</a></h3>
                        </div>
                        </div>
                        <?php while($objResult = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) { ?>
                            <div class="row mt-6" style="width:1000px">                            
                                <div class="col-md-6 mt-3">
                                    <p><?php echo $objResult['moit_name'].' '. $objResult['moit_title']; ?><span class="text-danger">*</span></p>
                                    <?php
                                      $strSQL_head = "SELECT head.head_id, head.head_name, head.head_pdf FROM head WHERE head.moit_id = {$objResult['moit_id']}";
                                      $objQuery_head = mysqli_query($objCon, $strSQL_head);

                                      if ($objQuery_head) {
                                          while ($objResult_head = mysqli_fetch_array($objQuery_head, MYSQLI_ASSOC)) {
                                              ?>
                                              <p  id="head-<?php echo $objResult['moit_id']; ?>-<?php echo $objResult_head['head_name']; ?>">
                                                - <?php echo $objResult_head['head_name']; ?>
                                                </a>
                                              </p>
                                              <?php
                                              $pdfFileName = $objResult_head['head_pdf'];
                                              if (!empty($pdfFileName)) {
                                                  ?>
                                                  <a class="nav-link" href="../pdf_ita/<?php echo $pdfFileName; ?>" target="_blank" style="color: blue;margin-top: -10px;">คลิกดูรายละเอียดเพิ่มเติม</a><br>
                                                  <?php
                                              } else {
                                                  ?>
                                                  <p class="nav-link">ไม่มีไฟล์ PDF</p>
                                                  <?php
                                              }
                                          }
                                      } else {
                                          echo "Error: " . mysqli_error($objCon);
                                      }
                                      ?>
                                    <a href="ita_head_add.php?id=<?php echo $objResult['moit_id']; ?>" ><button  class="btn btn-primary">เพิ่ม</button></a>              
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
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

<script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/script.js"></script>
    