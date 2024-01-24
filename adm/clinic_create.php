<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
// print_r($data);
$cn_name = $data['cn_name'];
$cn_title = $data['cn_title'];
$cn_img = 'noimg.png'; // default value
$output_dir = '../images/clinic'; // folder

if (!is_array($_FILES["cn_img"]["name"])) {
    $exts = explode('.', $_FILES["cn_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    if (file_exists($output_dir . $fileName)) {
        $fileName = $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
    }
    $cn_img = $fileName; // set image value
    @move_uploaded_file($_FILES["cn_img"]["tmp_name"], $output_dir . '/' . $fileName);
}

$strSQL = "INSERT INTO 
clinic(   
    `cn_name`,
    `cn_title`, 
    `cn_img`
) VALUES (   
    '$cn_name', 
    '$cn_title', 
    '$cn_img'
)";

$objQuery = mysqli_query($objCon, $strSQL) or die(mysqli_error($objCon));
if ($objQuery) {
    echo '<script>window.location="clinic.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="clinic_add.php";</script>';
}
