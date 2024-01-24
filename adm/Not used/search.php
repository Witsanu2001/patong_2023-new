<?
include ('cp/connect.php');


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
         <?
			$txt = $_POST['txt'];

			$Qnews = mysql_query("SELECT * FROM tb_news WHERE news_name like '%$txt%' ORDER BY news_id DESC");
			$totalnews = mysql_num_rows($Qnews);
			
			$Qart= mysql_query("SELECT * FROM tb_article WHERE art_name like '%$txt%' ORDER BY art_id DESC");
			$totalart = mysql_num_rows($Qart);
			
			$total=$totalart+$totalnews;
			?>
        
        <div class="col-cr">
        	<div class="toppic">ค้นหาข่าวและบทความ</div>
            <div style="padding-left:10px; padding-top:10px;"><b>ผลการค้นหา :</b> ทั้งหมด <?=$total?> รายการ</div>
            <div style="margin-top:0px; padding:10px;">
            
           
            <?

			while($r=mysql_fetch_array($Qnews)){
			$news_id = $r['news_id'];
			$news_name= $r['news_name'];
			$news_detail=$r['news_detail'];
			$news_date=$r['news_date'];
			$news_type=$r['news_type'];
			$news_img=$r['news_img'];
			
			$sql="select * from tb_type where type_id='$news_type' ";
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
			
			$time=date('d-m-Y', strtotime($news_date));
			
			
			echo"<a href='news.php?id=$news_id'><div class='linenews'>";
			echo mb_substr(strip_tags($news_name), 0, 80, 'UTF-8') . '';
			echo"<div class='linenews-date'>$time</div></div></a>";
			}
			
			
			
			?>
            
            <?
while($r=mysql_fetch_array($Qart)){
$art_id = $r['art_id'];
$art_name= $r['art_name'];
$art_detail=$r['art_detail'];
$art_date=$r['art_date'];
$art_type=$r['art_type'];
$art_img=$r['art_img'];

$sql="select * from tb_type where type_id='$art_type' ";
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

$time=date('d-m-Y', strtotime($art_date));


echo"<a href='article.php?id=$art_id'><div class='linenews'>";
echo mb_substr(strip_tags($art_name), 0, 80, 'UTF-8') . '';
echo"<div class='linenews-date'>$time</div></div></a>";
}



?>
            
        	</div>
            
        </div>
        
    </div><!--------------row-main--------------->
    
    <? include"footer.php";?>
    
</div><!--------------content--------------->

</div><!--------------main--------------->

<? include"script-foot.php";?>

</body>
</html>