<?
include ('cp/connect.php');

if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
		$start = '0';
		}
		$limit = '20';
	
	$count=0;
	
	$id=$_GET['id'];
	
	$Qtotal = mysql_query("select * from tb_tt");
	$total = mysql_num_rows($Qtotal);
	
	$Qtt = mysql_query("SELECT * FROM tb_tt WHERE tt_type='$id' ORDER BY tt_id DESC LIMIT $start,$limit");
	$totaltt = mysql_num_rows($Qtt);
	
	
	$page=$_GET['page'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include"script-head.php";?>
</head>

<body>
<div class="border-top"></div>
<div class="main">
<div class="content">
	<div class="header">
    
        <? include"topbanner.php";?>
        
        <? include"header.php";?>
    
    
    
    <div class="row-main">
    	<div class="col-left">
        	<? include"menu-left.php";?>
            
            <? include"link.php";?>
            
        </div><!--------------left--------------->
        
        <?php
					$id=$_GET[id];
	
	$sql="select * from tb_type where type_id='$id' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$type_id=$r[type_id];
	$type_name=$r[type_name];	

		?>
        
        <div class="col-cr">
        	<div class="toppic"><?=$type_name?></div>
            
            <div style="margin-top:0px; padding:10px;">
             <?
while($r=mysql_fetch_array($Qtt)){
$tt_id = $r['tt_id'];
$tt_name= $r['tt_name'];
$tt_detail=$r['tt_detail'];
$tt_date=$r['tt_date'];
$tt_type=$r['tt_type'];
$tt_img=$r['tt_img'];

$sql="select * from tb_type where type_id='$tt_type' ";
	$result=mysql_db_query($dbname,$sql);
	$r=mysql_fetch_array($result);
	
	$type_id=$r['type_id'];
	$type_name=$r['type_name'];

$count++;

$bgColor1="white";
$bgColor2="#f0ffdb";

$bgColor = (($count%2) == 0) ? $bgColor2 : $bgColor1; 

	if(!isset($page)){
		$page = 1;
		}
		
$numid=$count+(($page-1)*10);

$time=date('d/m/Y', strtotime($tt_date));


echo"<a href='tt.php?id=$tt_id'>
 	<div class='boxtt2'>
	
	<div class='col-tt-left'>
		<center><img src='images/tt/$tt_img' width='180' height='170' border='1'></center>
		</div>
		
		<div class='col-tt-right'>
		<div class='tt-title'>
		";
echo mb_substr(strip_tags($tt_name), 0, 100, 'UTF-8') . '';
echo"
		</div><br />
		<span class='tt-detail'>";
echo mb_substr(strip_tags($tt_detail), 0, 300, 'UTF-8') . ' ...';

echo"</span><br />

		<div class='readmore-tt'><span class='glyphicon glyphicon-calendar'></span> $tt_date</div><br />
	</div>
	</div>
	</a>";
	


}


?>

<div class="pagenav">
<?

 
echo"<center>";

$page = ceil($total/$limit);

echo "ทั้งหมด $page หน้า :";

for($i=1;$i<=$page;$i++){
	if($_GET['page']==$i){ //ถ้าตัวแปล page ตรง กับ เลขที่วนได้
	echo " <a href='?id=$tt_type&start=".$limit*($i-1)."&page=$i'><B>[$i]</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 1
	} else {
	echo " <a href='?id=$tt_type&start=".$limit*($i-1)."&page=$i'><B>[$i]</B></A>"; //ลิ้งค์ แบ่งหน้า เงื่อนไขที่ 2
	}
}
echo"</center>";
echo "<br />";

?>
</div>
        	</div>
            
        </div>
        
    </div><!--------------row-main--------------->
    
    <? include"footer.php";?>
    
</div><!--------------content--------------->

</div><!--------------main--------------->

<? include"script-foot.php";?>

</body>
</html>