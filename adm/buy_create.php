<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;

// Assuming you have $b_id defined somewhere in your code.
$b_id = 2;

$buy_name = $data['buy_name'];
$buy_title = $data['buy_title'];
$buy_date = $data['buy_date'];
$buy_pdf = 'noimg.png'; // default value
$output_dir = '../buy_pdf'; // folder

$output_dir = '../buy_pdf'; // folder
if (!is_array($_FILES["buy_pdf"]["name"])) {
    $exts = explode('.', $_FILES["buy_pdf"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    if (file_exists($output_dir . $fileName)) {
        $fileName = $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    }
    $buy_pdf = $fileName; // set image value
    @move_uploaded_file($_FILES["buy_pdf"]["tmp_name"], $output_dir . '/' . $fileName);
}

// Insert job data into the job table
$insertJobSQL = "INSERT INTO buy (`buy_name`, `buy_title`, `buy_date`, `buy_pdf`) 
                VALUES ('$buy_name', '$buy_title', '$buy_date', '$buy_pdf')";

// Update buy_date in the index_pag table for a specific b_id
$updateIndexPagSQL = "UPDATE index_pag SET b_time = '$buy_date' WHERE b_id = $b_id";

// Perform the insertion and update
$objQueryInsert = mysqli_query($objCon, $insertJobSQL);
$objQueryUpdate = mysqli_query($objCon, $updateIndexPagSQL);

if ($objQueryInsert && $objQueryUpdate) {
    echo '<script>window.location="buy.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="buy_add.php";</script>';
}
?>
