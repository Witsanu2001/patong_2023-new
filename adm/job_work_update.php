<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$jw_name = mysqli_real_escape_string($objCon, $data['jw_name']);
$jw_title = mysqli_real_escape_string($objCon, $data['jw_title']);
$jw_date = mysqli_real_escape_string($objCon, $data['jw_date']);
$jw_id = $data['jw_id'];
$output_dir = '../job_work_pdf'; // folder
$jw_pdf = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ
$b_id = 1;

if (!empty($_FILES["jw_pdf"]["name"])) {
    $exts = explode('.', $_FILES["jw_pdf"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["jw_pdf"]["tmp_name"], $output_dir . '/' . $fileName);
    $jw_pdf = $fileName; // set image value
}

if (!empty($jw_pdf)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE job_work SET 
        jw_name = '$jw_name',
        jw_title = '$jw_title',
        jw_date = '$jw_date',
        jw_pdf = '$jw_pdf'
    WHERE jw_id = $jw_id";


        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$jw_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);

} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE job_work SET 
        jw_name = '$jw_name',
        jw_title = '$jw_title',
        jw_date = '$jw_date'
    WHERE jw_id = $jw_id";

        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$jw_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);
    }


$objQuery = mysqli_query($objCon, $strSQL);

if ($objQuery) {
    echo '<script>window.location="job.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="job_work_update.php?id=' . $jw_id . '";</script>';
}
?>
