<?
session_start();

if(!isset($_SESSION['user'])) {
	header('Location: index.php');
	die();
	
	$user=$_SESSION['user'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include"script-head.php";?>
</head>

<body onLoad="java script:history.go(1);" class="bodycp">
<div class="container">
<? include "header.php"; ?>
<?
	
	
	include ('connect.php');
	
	$sql="select * from tb_user where user_name='$user' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
$id = $r['user_id'];
$user = $r['user_name'];
$pass = $r['user_pass'];

?>
    <div class="box" style="margin-top:-10px;">
  <legend>เปลี่ยนรหัสผ่าน</legend>

      <form class="form-horizontal"  method="post" action="edit-user2.php"enctype="multipart/form-data">

  <div class="form-group">
    <label for="user" class="col-sm-2 control-label">User</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="user" name="user" placeholder="" disabled value="<?=$user?>">
    </div>
  </div>
  <div class="form-group">
    <label for="pass" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="pass" name="pass" placeholder="" value="<?=$pass?>">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
      <button type="submit" class="btn btn-default">Change Password</button>
    </div>
  </div>

</form>
      


    </div>
    </div>
    
    <? include"footer.php";?>
    
</div>
</body>
</html>