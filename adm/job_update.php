<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$job_name = mysqli_real_escape_string($objCon, $data['job_name']);
$job_title = mysqli_real_escape_string($objCon, $data['job_title']);
$job_date = mysqli_real_escape_string($objCon, $data['job_date']);
$job_id = $data['job_id'];
$output_dir = '../job_pdf'; // folder
$job_pdf = ''; // เตรียมตัวแปรเพื่อเก็บชื่อไฟล์รูปภาพ
$b_id = 1;

if (!empty($_FILES["job_pdf"]["name"])) {
    $exts = explode('.', $_FILES["job_pdf"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    move_uploaded_file($_FILES["job_pdf"]["tmp_name"], $output_dir . '/' . $fileName);
    $job_pdf = $fileName; // set image value
}

if (!empty($job_pdf)) {
    // มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE job SET 
        job_name = '$job_name',
        job_title = '$job_title',
        job_date = '$job_date',
        job_pdf = '$job_pdf'
    WHERE job_id = $job_id";


        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$job_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);

} else {
    // ไม่มีการอัปโหลดรูปภาพใหม่
    $strSQL = "UPDATE job SET 
        job_name = '$job_name',
        job_title = '$job_title',
        job_date = '$job_date'
    WHERE job_id = $job_id";

        $updateIndexPagSQL = "UPDATE index_pag SET b_time = '$job_date' WHERE b_id = $b_id";
        mysqli_query($objCon, $updateIndexPagSQL);
    }


$objQuery = mysqli_query($objCon, $strSQL);

if ($objQuery) {
    echo '<script>window.location="job.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด!!");window.location="job_update.php?id=' . $job_id . '";</script>';
}
?>
