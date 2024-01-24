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

if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
		$start = '0';
		}
		$limit = '10';
	
	$count=0;
	
	$Qtotal = mysql_query("select * from tb_gallery_group");
	$total = mysql_num_rows($Qtotal);
	
	$Query = mysql_query("SELECT * FROM tb_gallery_group ORDER BY gg_id DESC LIMIT $start,$limit");
	$totalp = mysql_num_rows($Query);
	
	$page=$_GET['page'];
	
	if($class !== 'a'){
		echo "<script>
			alert('สิทธิ์ของท่านไม่ได้รับอนุญาตให้จัดการส่วนนี้');
			window.location='cp.php';
			</script>";

	die();
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include"script-head.php";?>
</head>

<body onLoad="java script:history.go(1);" class="bodycp">
<div class="container">
<? include "header.php"; ?>

    <div class="box" style="margin-top:-10px;">

      <form class="form-horizontal" method="post" action="add-gallery-group.php"enctype="multipart/form-data">
  
  <legend>จัดการหมวดภาพ</legend>
  
  <p><strong style="color:#b5d333">&raquo; เพิ่มหมวดภาพ</strong></p>

    <label for="exampleInputFile">File Upload</label>
    <input type="file" name="fileupload">
    <p class="help-block">ระบบจะปรับความกว้างเป็น 500px อัตโนมัติ</p>
    
    <label for="name">ชื่อหมวดภาพ :</label><br />
	<input name="name"  type="text" class="form-control w400" id="name" placeholder="ชื่อหมวดภาพ" /><br />



  <button type="submit" class="btn btn-default">ตกลง</button>
  
</form>
      
      <hr />
      <p><strong>หมวดภาพทั้งหมด :
<?=$total?> หมวด</strong></p>
<table align="center" cellpadding="10" cellspacing="0" width="600px" class="table table-bordered table-hover">
<tr style="color:black; font-weight:bold; text-align:center;" class="info">
	<td width="7%">ลำดับที่</td>
    <td width="35%">ภาพหมวด</td>
    <td width="35%">ชื่อหมวด</td>
    <td width="7%">จำนวนภาพในหมวด</td>
    <td width="7%">ดูภาพในหมวด</td>
    <td width="7%">แก้ไข</td>   
    <td width="7%">ลบ</td>
 </tr>

<?
while($r=mysql_fetch_array($Query)){
$gg_id = $r['gg_id'];
$gg_name = $r['gg_name'];
$gg_img = $r['gg_img'];

$count++;

$bgColor1="white";
$bgColor2="#f0ffdb";

$bgColor = (($count%2) == 0) ? $bgColor2 : $bgColor1; 

	if(!isset($page)){
		$page = 1;
		}
		
$numid=$count+(($page-1)*10);

echo"
 <tr >
 	<td align='center' >$numid</td>
    <td align='center'><img src='../images/gallery-group/$gg_img' border='0'  class='img-thumbnail' width='300'></td>
	<td align='center' >$gg_name</td>
	";
	$Qga = mysql_query("select * from tb_gallery where ga_group='$gg_id' ");
	$totalga = mysql_num_rows($Qga);
	echo"<td align='center' >$totalga</td>";
	echo"
	 <td align='center'><a href=\"cp-gg.php?id_gg=$gg_id\"><button class='btn btn-default'><span class='glyphicon glyphicon-eye-open'></span></button></a></td>
    <td align='center'><a href=\"edit-gallery-group.php?id_edit=$gg_id\"><button class='btn btn-default'><span class='glyphicon glyphicon-edit'></span></button></a></td>
    <td align='center'><a href=\"del-gallery-group.php?id_del=$gg_id\" onclick=\"return confirm('คุณต้องการลบจริงหรือไม่')\"><button class='btn btn-default'><span class='glyphicon glyphicon-remove'></span></button></a></td>
</tr>";

}

mysql_close();

?>
  </table>
<?
 echo"<br />";
 
echo"<center>";

$page = ceil($total/$limit);

echo "ทั้งหมด $page หน้า :";

for($i=1;$i<=$page;$i++){
	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
	echo " <a href='?start=".$limit*($i-1)."&page=$i'><B>[$i]</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
	} else {
	echo " <a href='?start=".$limit*($i-1)."&page=$i'><B>[$i]</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
	}
}
echo"</center>";
echo "<br />";

?>

    </div>
</div>
    <? include"footer.php";?>
</div>
</body>
</html>