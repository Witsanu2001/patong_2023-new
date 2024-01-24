<?
$id_del=$_GET[id_del];
$id_gg=$_GET[id_gg];

include ('connect.php');

$sql="delete from tb_gallery where ga_id='$id_del' ";
$result=mysql_db_query($dbname,$sql);
		if($result) {

			echo "<script>
			window.location='cp-gg.php?id_gg=$id_gg';
			</script>";
			
		} else {
			echo "<center><h5>คลิก ตกลง แล้วกรุณารอสักครู่ ... <br /><font color=red>ระบบจะทำการเปลี่ยนหน้าอัตโนมัติ</font></h5></center>";
			echo "<center><a href='cp-gg.php?id_gg=$id_gg' ><h5>[ ไม่ต้องการรอ .. คลิก!! ]</h5></a></center>";
			echo "<script>
			alert('ไม่สามารถแก้ไขข้อมูลได้ กรุณาลองใหม่อีกครั้ง!');
			window.location='cp-gg.php?id_gg=$id_gg';
			</script>";
		}
?>
