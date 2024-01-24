<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;

// Assuming you have $b_id defined somewhere in your code.
$b_id = 2;

$h_name = $data['h_name'];
$h_title = $data['h_title'];
$h_date = $data['h_date'];
$h_pdf = 'noimg.png'; // default value
$output_dir = '../h_pdf'; // folder

$output_dir = '../h_pdf'; // folder
if (!is_array($_FILES["h_pdf"]["name"])) {
    $exts = explode('.', $_FILES["h_pdf"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    if (file_exists($output_dir . $fileName)) {
        $fileName = $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    }
    $h_pdf = $fileName; // set image value
    @move_uploaded_file($_FILES["h_pdf"]["tmp_name"], $output_dir . '/' . $fileName);
}

// Insert job data into the job table
$insertJobSQL = "INSERT INTO hire (`h_name`, `h_title`, `h_date`, `h_pdf`) 
                VALUES ('$h_name', '$h_title', '$h_date', '$h_pdf')";

// Update h_date in the index_pag table for a specific b_id
$updateIndexPagSQL = "UPDATE index_pag SET b_time = '$h_date' WHERE b_id = $b_id";

// Perform the insertion and update
$objQueryInsert = mysqli_query($objCon, $insertJobSQL);
$objQueryUpdate = mysqli_query($objCon, $updateIndexPagSQL);

if ($objQueryInsert && $objQueryUpdate) {
    echo '<script>window.location="buy.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="h_add.php";</script>';
}
?>
