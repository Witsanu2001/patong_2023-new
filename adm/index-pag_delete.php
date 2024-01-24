<?php
require('./api/dbconnect.php');

$id = $_GET["id"];

// ตรวจสอบว่า np_id ไม่เท่ากับ 1
if ($id != 1) {
    $sql_delete = "DELETE FROM news_pag WHERE np_id=$id";
    $result_delete = mysqli_query($conn, $sql_delete);

    // 2. หาค่า np_date ล่าสุดจากตาราง news_pag
    $sql_max_date = "SELECT MAX(np_date) AS max_date FROM news_pag";
    $result_max_date = mysqli_query($conn, $sql_max_date);
    $row_max_date = mysqli_fetch_assoc($result_max_date);
    $max_date = $row_max_date['max_date'];

    // 3. อัปเดตค่า np_date ล่าสุดในตาราง index_page สำหรับแถวที่ b_id เท่ากับ 3
    $sql_update_index_page = "UPDATE index_pag SET b_time='$max_date' WHERE b_id=4";
    $result_update_index_page = mysqli_query($conn, $sql_update_index_page);

    if ($result_delete && $result_max_date && $result_update_index_page) {
        header("location: index-page.php");
        exit(0);
    } else {
        echo "ไม่สามารถลบได้ หรือ มีข้อผิดพลาดเกิดขึ้น";
    }
} else {
  echo '<script>
          alert("หมายเหตุ!: ไม่สามารถลบภาพนี้ได้ กรุณากลับไปแก้ไขได้เฉพาะรูปนี้เท่านั่น รูปอื่น ๆ สามารถลบได้ปกติ");
          window.location.href = "index-pag_edit.php?id=' . $id . '";
        </script>';
}
?>
