<?
include ('cp/connect.php');

if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
		$start = '0';
		}
		$limit = '10';
	
	$count=0;
	
	$Qtotal = mysql_query("select * from tb_news");
	$total = mysql_num_rows($Qtotal);
	
	$Qnews = mysql_query("SELECT * FROM tb_news WHERE news_type='1' ORDER BY news_id DESC LIMIT $start,$limit");
	$totalnews = mysql_num_rows($Qnews);
	
	$Qnews2 = mysql_query("SELECT * FROM tb_news WHERE news_type='2' ORDER BY news_id DESC LIMIT $start,$limit");
	$totalnews2 = mysql_num_rows($Qnews2);
	
	
	$page=$_GET['page'];

?>

<div class="news">
        	<div id="i_containTab">
                <!--<ul id="navi_containTab">
                    <li class="tab tabNavi1 active">ข่าวประชาสัมพันธ์</li>-->
                    <!--<li class="tab tabNavi2">บทความ</li>-->
                <!--</ul>-->
                <ul id="detail_containTab">
                
                
                
                <li class="detailContent1 animated fadeIn">
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


echo"<a href='news.php?id=$news_id' title='$news_name'><div class='linenews'>";
echo mb_substr(strip_tags($news_name), 0, 75, 'UTF-8') . '';
echo"<div class='linenews-date'>$time</div></div></a>";
}



?>
<div class="clearfix"></div>
<a href="more-news.php?id=1"><div class="readmore">เพิ่มเติม <span class="glyphicon glyphicon-plus-sign"></span></div></a>
                    </li>
                    
                    <!--<li class="detailContent2 animated fadeIn">
                    	<?
//while($r=mysql_fetch_array($Qnews2)){
//$news_id = $r['news_id'];
//$news_name= $r['news_name'];
//$news_detail=$r['news_detail'];
//$news_date=$r['news_date'];
//$news_type=$r['news_type'];
//$news_img=$r['news_img'];

//$sql="select * from tb_type where type_id='$news_type' ";
//	$result=mysql_db_query($dbname,$sql);
//	$r=mysql_fetch_array($result);
//	
//	$type_id=$r['type_id'];
//	$type_name=$r['type_name'];
//	
//	
//
//$count++;
//
//$bgColor1="white";
//$bgColor2="#f0ffdb";
//
//$bgColor = (($count%2) == 0) ? $bgColor2 : $bgColor1; 
//
//	if(!isset($page)){
//		$page = 1;
//		}
//		
//$numid=$count+(($page-1)*10);
//
//$time=date('d-m-Y', strtotime($art_date));
//
//
//echo"<a href='news.php?id=$news_id'><div class='linenews'>";
//echo mb_substr(strip_tags($news_name), 0, 80, 'UTF-8') . '';
//echo"<div class='linenews-date'>$time</div></div></a>";
//}



?>
<div class="clearfix"></div>
<a href="more-news.php?id=2"><div class="readmore">เพิ่มเติม <span class="glyphicon glyphicon-plus-sign"></span></div></a>

                    </li>-->
                    
                    
                </ul>
            </div>
        </div>