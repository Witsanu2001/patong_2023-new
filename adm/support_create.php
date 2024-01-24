<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;

// Assuming you have $b_id defined somewhere in your code.
$b_id = 3;

$sp_name = $data['sp_name'];
$sp_title = $data['sp_title'];
$sp_date = $data['sp_date'];
$sp_img = 'noimg.png'; // default value

$output_dir = '../images/support'; // folder
if (!is_array($_FILES["sp_img"]["name"])) {
    $exts = explode('.', $_FILES["sp_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $originalFileName = $_FILES["sp_img"]["name"];
    $fileName = pathinfo($originalFileName, PATHINFO_FILENAME) . "_" . randomString() . "." . $ext;
    if (file_exists($output_dir . $fileName)) {
        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME) . "_" . randomString() . "." . $ext;
    }
    $sp_img = $fileName; // set image value
    @move_uploaded_file($_FILES["sp_img"]["tmp_name"], $output_dir . '/' . $fileName);
}



// Insert job data into the job table
$insertJobSQL = "INSERT INTO support (`sp_name`, `sp_title`, `sp_date`, `sp_img`) 
                VALUES ('$sp_name', '$sp_title', '$sp_date', '$sp_img')";

// Update sp_date in the index_pag table for a specific b_id
$updateIndexPagSQL = "UPDATE index_pag SET b_time = '$sp_date' WHERE b_id = $b_id";

// Perform the insertion and update
$objQueryInsert = mysqli_query($objCon, $insertJobSQL);
$objQueryUpdate = mysqli_query($objCon, $updateIndexPagSQL);

if ($objQueryInsert && $objQueryUpdate) {
    echo '<script>window.location="support.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="sp_add.php";</script>';
}
?>
