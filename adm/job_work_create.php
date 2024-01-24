<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;

// Assuming you have $b_id defined somewhere in your code.
$b_id = 1;

$jw_name = $data['jw_name'];
$jw_title = $data['jw_title'];
$jw_date = $data['jw_date'];
$jw_pdf = 'noimg.png'; // default value
$output_dir = '../job_work_pdf'; // folder

$output_dir = '../job_work_pdf'; // folder
if (!is_array($_FILES["jw_pdf"]["name"])) {
    $exts = explode('.', $_FILES["jw_pdf"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    if (file_exists($output_dir . $fileName)) {
        $fileName = $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    }
    $jw_pdf = $fileName; // set image value
    @move_uploaded_file($_FILES["jw_pdf"]["tmp_name"], $output_dir . '/' . $fileName);
}

// Insert job data into the job table
$insertJobSQL = "INSERT INTO job_work (`jw_name`, `jw_title`, `jw_date`, `jw_pdf`) 
                VALUES ('$jw_name', '$jw_title', '$jw_date', '$jw_pdf')";

// Update job_date in the index_pag table for a specific b_id
$updateIndexPagSQL = "UPDATE index_pag SET b_time = '$jw_date' WHERE b_id = $b_id";

// Perform the insertion and update
$objQueryInsert = mysqli_query($objCon, $insertJobSQL);
$objQueryUpdate = mysqli_query($objCon, $updateIndexPagSQL);

if ($objQueryInsert && $objQueryUpdate) {
    echo '<script>window.location="job.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="job_work_add.php";</script>';
}
?>
