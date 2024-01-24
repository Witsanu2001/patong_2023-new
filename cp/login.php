<?
session_start();
?>
<?

include ('connect.php');

$user = mysql_real_escape_string($_POST[user]);
$pass = mysql_real_escape_string($_POST[pass]);


$sql="select * from tb_user where user_name='$user' and user_pass ='$pass'";
$result=mysql_db_query($dbname,$sql) or die(mysql_error());
$num = mysql_num_rows($result);
if($num==1){
		$_SESSION["user"] = $user;
		echo "<script>
		window.location='cp.php';
		</script>";
}else {
		echo "<script>
		alert('User หรือ Password ไม่ถูกต้อง กรุณาทำรายการใหม่อีกครั้ง!!');
		window.location='index.php';
		</script>";
	}
mysql_close();
?>
