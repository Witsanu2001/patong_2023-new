<?php
include_once('./api/connect.php');
$objCon = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ข้อมูลจากฟอร์ม
    $ita_id = $_POST['ita_id'];
    $moit_id = $_POST['moit_id'];
    $head_names = $_POST['head_name'];
    $head_pdfs = $_FILES['head_pdf'];

    // วนลูปบันทึกข้อมูลที่ได้รับจากแบบฟอร์ม
    for ($i = 0; $i < count($head_names); $i++) {
        $head_name = $head_names[$i];
        $head_pdf = $_FILES["head_pdf"]["tmp_name"][$i]; // ใช้ $_FILES["head_pdf"]["tmp_name"][$i] แทน $head_pdfs['tmp_name'][$i]
    
        $output_dir = '../pdf_ita'; // folder
    
        // ตรวจสอบว่าไฟล์ถูกอัปโหลดหรือไม่
        if (is_uploaded_file($head_pdf)) {
            $exts = explode('.', $_FILES["head_pdf"]["name"][$i]);
            $ext = $exts[count($exts) - 1];
            $fileName = $head_name . "." . $ext; // ใช้ $head_name เป็นชื่อไฟล์
    
            // บันทึกไฟล์ PDF ลงในโฟลเดอร์
            $pdfDestination = $output_dir . '/' . $fileName;
            move_uploaded_file($head_pdf, $pdfDestination);
    
            // บันทึกข้อมูลลงในฐานข้อมูล (เฉพาะชื่อไฟล์)
            $strSQL = "INSERT INTO head (moit_id, head_name, head_pdf) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($objCon, $strSQL);
            mysqli_stmt_bind_param($stmt, 'sss', $moit_id, $head_name, $fileName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            // อัปเดต head_id ในตาราง moit
            $headIdSQL = "UPDATE moit SET head_id = LAST_INSERT_ID() WHERE moit_id = ?";
            $stmt = mysqli_prepare($objCon, $headIdSQL);
            mysqli_stmt_bind_param($stmt, 'i', $moit_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }

    header("Location: ita_moit.php?id=$ita_id");
    exit;
}
?>
