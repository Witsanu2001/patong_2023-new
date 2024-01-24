<?
session_start();

//include "connect.php";

//$logout = $_POST['action'];
//$user=$_POST['user'];


//if($logout == 'logout'){
	
	//$user_id=$_POST['user'];	
	unset($_SESSION['user']);
	session_destroy();
//	}

echo "<script>window.location='index.php';</script>";

//mysql_close();
?>