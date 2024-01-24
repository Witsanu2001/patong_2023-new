<?php
include_once('./api/connect.php');
$objCon = connectDB();

$data = $_POST;
$atv_name = $data['atv_name'];
$atv_title = $data['atv_title'];
$atv_date = $data['atv_date'];
$atv_location = $data['atv_location'];
$output_dir = '../images/activity'; // folder

// เตรียมตัวแปรสำหรับเก็บชื่อไฟล์รูปภาพ
$atv_img1 = '';
$atv_img2 = '';
$atv_img3 = '';
$atv_img4 = '';
$atv_img5 = '';
$atv_img6 = '';
$atv_img7 = '';
$atv_img8 = '';

// วนลูปเพื่อดำเนินการกับทุกไฟล์ที่อัปโหลด
for ($i = 1; $i <= 8; $i++) {
    $inputName = "atv_img{$i}";

    // ตรวจสอบว่ามีการอัปโหลดไฟล์นี้หรือไม่
    if (!empty($_FILES[$inputName]["name"])) {
        $exts = explode('.', $_FILES[$inputName]["name"]);
        $ext = $exts[count($exts) - 1];
        $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;

        // ตรวจสอบว่าไฟล์ที่มีชื่อเดียวกันมีอยู่แล้วหรือไม่
        while (file_exists($output_dir . '/' . $fileName)) {
            $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;
        }

        // ย้ายไฟล์ไปยังโฟลเดอร์ปลายทาง
        move_uploaded_file($_FILES[$inputName]["tmp_name"], $output_dir . '/' . $fileName);

        // กำหนดค่าให้กับตัวแปรที่เก็บชื่อไฟล์รูปภาพตามลำดับ
        ${"atv_img{$i}"} = $fileName;
    }
}

// สร้าง SQL query
$strSQL = "INSERT INTO activity (
    `atv_name`,
    `atv_title`,
    `atv_date`,
    `atv_location`,
    `atv_img1`,
    `atv_img2`,
    `atv_img3`,
    `atv_img4`,
    `atv_img5`,
    `atv_img6`,
    `atv_img7`,
    `atv_img8`
) VALUES (
    '$atv_name',
    '$atv_title',
    '$atv_date',
    '$atv_location',
    '$atv_img1',
    '$atv_img2',
    '$atv_img3',
    '$atv_img4',
    '$atv_img5',
    '$atv_img6',
    '$atv_img7',
    '$atv_img8'
)";

// ทำการ query และตรวจสอบการเพิ่มข้อมูล
$objQuery = mysqli_query($objCon, $strSQL) or die(mysqli_error($objCon));
if ($objQuery) {
    echo '<script>window.location="act.php";</script>';
} else {
    echo '<script>alert("พบข้อผิดพลาด");window.location="atv_add.php";</script>';
}
?>
