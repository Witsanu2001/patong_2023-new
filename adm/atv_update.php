<?php
require('./api/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $objCon = connectDB();
    $id = $_POST['atv_id'];
    $atv_name = $_POST['atv_name'];
    $atv_date = $_POST['atv_date'];
    $atv_location = $_POST['atv_location'];
    $atv_title = $_POST['atv_title'];

    // ทำการ update ข้อมูล
    $strSQL = "UPDATE activity SET 
                atv_name = '$atv_name',
                atv_title = '$atv_title',
                atv_date = '$atv_date',
                atv_location = '$atv_location'
                WHERE atv_id = $id";

    $objQuery = mysqli_query($objCon, $strSQL);

    if ($objQuery) {
        // ทำการ update รูปภาพ
        for ($i = 1; $i <= 8; $i++) {
            $inputName = "atv_img{$i}";

            // ตรวจสอบว่ามีการอัปโหลดรูปภาพนี้หรือไม่
            if (!empty($_FILES[$inputName]["name"])) {
                $exts = explode('.', $_FILES[$inputName]["name"]);
                $ext = $exts[count($exts) - 1];
                $fileName = date("YmdHis") . '_' . randomString() . "." . $ext;

                // ย้ายไฟล์ไปยังโฟลเดอร์ปลายทาง
                move_uploaded_file($_FILES[$inputName]["tmp_name"], '../images/activity/' . $fileName);

                // ทำการ update ชื่อไฟล์รูปภาพในฐานข้อมูล
                $updateImageSQL = "UPDATE activity SET atv_img{$i} = '$fileName' WHERE atv_id = $id";
                mysqli_query($objCon, $updateImageSQL);
            }
        }

        echo '<script>window.location="activity.php?id='.$id.'";</script>';
    } else {
        echo '<script>alert("พบข้อผิดพลาด: ' . mysqli_error($objCon) . '");window.location="atv_update.php?id=' . $id . '";</script>';
    }
    
} else {
    // ถ้าไม่ได้ส่งค่ามาจากฟอร์ม ให้เปลี่ยนเส้นทางไปที่หน้าที่คุณต้องการ
    header("location: activity.php");
}
?>
