<?

include ('connect.php');

session_start();

if(!isset($_SESSION['user'])) {
	header('Location: index.php');
	die();
}

$user=$_SESSION['user'];

	$sql="select * from tb_user where user_name='$user' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$id = $r['user_id'];
	$user = $r['user_name'];
	$class= $r['user_class'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include"script-head.php";?>
</head>

<body onLoad="java script:history.go(1);" class="bodycp">
<div class="container">
<? include "header.php"; ?>
<?
	$id_edit=$_GET[id_edit];
	
	$sql="select * from tb_page where page_id='$id_edit' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
$page_id = $r['page_id'];
$page_name = $r['page_name'];
$page_detail = $r['page_detail'];

if($class !== 'a'){
		echo "<script>
			alert('สิทธิ์ของท่านไม่ได้รับอนุญาตให้จัดการส่วนนี้');
			window.location='cp.php';
			</script>";

	die();
	}
	else{
		
	}


?>
    <div class="box" style="margin-top:-10px;">

      <form class="form-horizontal" method="post" action="edit-page.php"enctype="multipart/form-data">
  
  <legend>จัดการหน้า : <?=$page_name?></legend>
  
<div class="alert alert-info" role="alert"><b>กำลังแก้ไขหน้า : <?=$page_name?></b>
  <textarea id="detail" name="detail" cols="45" rows="10" class="ckeditor"><?=$page_detail?></textarea><br />
  <input type="hidden" id="id_edit" name="id_edit" value="<?=$page_id?>"  />
  <button type="submit" class="btn btn-default">บันทึก</button>
  
</form>
      

    </div>
</div>
    <? include"footer.php";?>
</div>
</body>
</html>