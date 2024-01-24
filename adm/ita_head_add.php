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
$strSQL = " SELECT moit.*,ita.ita_id FROM moit 
            LEFT JOIN ita on moit.ita_id = ita.ita_id 
            WHERE moit_id = $id";
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

<main class="container">
    <nav class="nav link d-flex flex-wrap justify-content-between">
        <?php include "nav-link.php"; ?>
    </nav>
    <?php include "link-boot.php"; ?>
    <form action="ita_head_add_create.php" id="form_create" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
        <input type="hidden" name="moit_id" value="<?php echo $objResult['moit_id']; ?>">
        <input type="hidden" name="ita_id" value="<?php echo $objResult['ita_id']; ?>">

        <div class="row">
            <div class="col-md-7">
                <!-- ข้อมูลเนื้อหา -->
                <div class="row-container">
                    <!-- ปุ่มเพิ่ม -->
                    <div class="row mt-3">
                        <div class="col-md-6">
                        <h2>
                            <?php echo $objResult['moit_name']; ?>
                             <button type="button" class="btn btn-primary addRow">เพิ่มรายการ</button>
                        </h2>
                        </div>
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
                        
                    </div>
                    <div class="row-item">
                        <div class="col-md-6 mt-3">
                            <label for="head_name" class="form-label">รายละเอียด<span class="text-danger">*</span></label>
                            <input type="text" name="head_name[]" class="form-control" required style="width: 700px;">
                        </div>
                        <!-- ข้อมูลPDF -->
                        <div class="row mt-6" style="width: 800px;">
                            <div class="col-md-11 mt-3">
                                <label for="head_pdf" class="form-label">PDF</label>
                                <input type="file" name="head_pdf[]" class="form-control" style="width: 500px;">
                            </div>
                        </div>

                        <!-- ปุ่มลบ -->
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger removeRow">ลบรายการ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ปุ่มบันทึก -->
            <div class="col-md-12 mt-3">
            <button type="button" id="saveButton" class="btn btn-primary btn-lg" onclick="saveItem()">บันทึก</button>
                <a href="./ita_moit.php?id=<?php echo $objResult['ita_id']; ?>"><button class="btn btn-danger btn-lg">กลับ</button></a>
                           
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        var rowCounter = 1;

        // เมื่อคลิกที่ปุ่ม "เพิ่มรายการ"
        $(".addRow").click(function () {
            var newRow = $(".row-item").first().clone();
            newRow.find('input').val('');
            newRow.find('input[name="head_name[]"]').attr('name', 'head_name[' + rowCounter + ']');
            newRow.find('input[name="head_pdf[]"]').attr('name', 'head_pdf[' + rowCounter + ']');
            $(".row-container").append(newRow);
            rowCounter++;
        });

        // เมื่อคลิกที่ปุ่ม "ลบรายการ"
        $(document).on('click', '.removeRow', function () {
            $(this).closest('.row-item').remove();
        });
    });
</script>
