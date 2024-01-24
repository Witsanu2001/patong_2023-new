<?
include ('cp/connect.php');

if(isset($_GET['start'])){
			$start = $_GET['start'];
		}else{
		$start = '0';
		}
		$limit = '4';
	
	$count=0;
	
	$Qtotal = mysql_query("select * from tb_news");
	$total = mysql_num_rows($Qtotal);
	
	$Qknow = mysql_query("SELECT * FROM tb_news WHERE news_type='3' ORDER BY news_id DESC LIMIT $start,$limit");
	$totalnews = mysql_num_rows($Qknow);
	
	$page=$_GET['page'];

?>
<?
while($r=mysql_fetch_array($Qknow)){
$news_id = $r['news_id'];
$news_name= $r['news_name'];
$news_detail=$r['news_detail'];
$news_date=$r['news_date'];
$news_type=$r['news_type'];
$news_img=$r['news_img'];

	

$count++;

$bgColor1="white";
$bgColor2="#f0ffdb";

$bgColor = (($count%2) == 0) ? $bgColor2 : $bgColor1; 

	if(!isset($page)){
		$page = 1;
		}
		
$numid=$count+(($page-1)*10);

$time=date('d-m-Y', strtotime($news_date));


echo"<a href='news.php?id=$news_id'>
 	<div class='boxnews'>
		<center><img src='images/news/$news_img' width='220' height='136' border='1'></center><br />
		<div class='news-title'>
		";
echo mb_substr(strip_tags($news_name), 0, 80, 'UTF-8') . '';
echo"
		</div><br />";
	//<span class='news-detail'>";
//echo mb_substr(strip_tags($news_detail), 0, 200, 'UTF-8') . ' ...';

//echo"</span><br />";

		echo"<div class='readmore-news' style='margin-top:-5px;'><span class='glyphicon glyphicon-calendar'></span> $time</div><br />
	</div>
	</a>";

}


?>