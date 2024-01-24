<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
// print_r($data);
$ceo_name = $data['ceo_name'];
$ceo_position = $data['ceo_position'];
$ceo_img = 'noimg.png'; // default value
$output_dir = '../images/ceo'; // folder

if (!is_array($_FILES["ceo_img"]["name"])) {
    $exts = explode('.', $_FILES["ceo_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    if (file_exists($output_dir . $fileName)) {
        $fileName = $fileName = randomString() . "." . $ext;
    }
    $ceo_img = $fileName; // set image value
    @move_uploaded_file($_FILES["ceo_img"]["tmp_name"], $output_dir . '/' . $fileName);
}

$strSQL = "INSERT INTO 
ceo_manage(   
    `ceo_name`,
    `ceo_position`, 
    `ceo_img`
) VALUES (   
    '$ceo_name', 
    '$ceo_position', 
    '$ceo_img'
)";

$objQuery = mysqli_query($objCon, $strSQL) or die(mysqli_error($objCon));
if ($objQuery) {
    echo '<script>window.location="person.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="person_add.php";</script>';
}
