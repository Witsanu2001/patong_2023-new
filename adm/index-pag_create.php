<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
// print_r($data);
$np_name = $data['np_name'];
$np_title = $data['np_title'];
$np_details = $data['np_details'];
$np_date = $data['np_date'];
$np_img = 'noimg.png'; // default value
$output_dir = '../images/news'; // folder

if (!is_array($_FILES["np_img"]["name"])) {
    $exts = explode('.', $_FILES["np_img"]["name"]);
    $ext = $exts[count($exts) - 1]; // get ext image ex. jpeg, jpg, png
    $fileName = randomString() . "." . $ext;
    if (file_exists($output_dir . $fileName)) {
        $fileName = $fileName = randomString() . "." . $ext;
    }
    $np_img = $fileName; // set image value
    @move_uploaded_file($_FILES["np_img"]["tmp_name"], $output_dir . '/' . $fileName);
}

// เตรียมตัวแปรสำหรับเก็บชื่อไฟล์รูปภาพ
$img_1 = '';
$img_2 = '';
$img_3 = '';

// วนลูปเพื่อดำเนินการกับทุกไฟล์ที่อัปโหลด
for ($i = 1; $i <= 3; $i++) {
    $inputName = "img_{$i}";

    // ตรวจสอบว่ามีการอัปโหลดไฟล์นี้หรือไม่
    if (!empty($_FILES[$inputName]["name"])) {
        $exts = explode('.', $_FILES[$inputName]["name"]);
        $ext = $exts[count($exts) - 1];
        $fileName = randomString() . "." . $ext;

        // ตรวจสอบว่าไฟล์ที่มีชื่อเดียวกันมีอยู่แล้วหรือไม่
        while (file_exists($output_dir . '/' . $fileName)) {
            $fileName = randomString() . "." . $ext;
        }

        // ย้ายไฟล์ไปยังโฟลเดอร์ปลายทาง
        move_uploaded_file($_FILES[$inputName]["tmp_name"], $output_dir . '/' . $fileName);

        // กำหนดค่าให้กับตัวแปรที่เก็บชื่อไฟล์รูปภาพตามลำดับ
        ${"img_{$i}"} = $fileName;
    }
}

$strSQL = "INSERT INTO 
news_pag (   
    `np_name`,
    `np_title`, 
    `np_details`, 
    `np_date`, 
    `np_img`,
    `img_1`,
    `img_2`,
    `img_3`
) VALUES (   
    '$np_name', 
    '$np_title', 
    '$np_details', 
    '$np_date', 
    '$np_img',
    '$img_1',
    '$img_2',
    '$img_3'
)";

$objQuery = mysqli_query($objCon, $strSQL) or die(mysqli_error($objCon));
if ($objQuery) {
    echo '<script>window.location="index-page.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="index-pag_add.php";</script>';
}
