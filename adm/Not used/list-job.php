<?
include ('cp/connect.php');
	
	$Qjob= mysql_query("SELECT * FROM tb_article WHERE art_type='6' ORDER BY art_id DESC LIMIT $start,$limit");
	$totaljob = mysql_num_rows($Qjob);
	
	$Qjob2= mysql_query("SELECT * FROM tb_article WHERE art_type='7' ORDER BY art_id DESC LIMIT $start,$limit");
	$totaljob2 = mysql_num_rows($Qjob2);
	
	
	$page=$_GET['page'];

?>

<div class="news">
        	<div id="i_containTab2">
                <ul id="navi_containTab2">
                    <li class="tab2 tabNavi1 active">รับสมัครงาน</li>
                    <li class="tab2 tabNavi2">ประกาศผลรับสมัครงาน</li>
                </ul>
                <ul id="detail_containTab2">
                
                
                
                <li class="detailContent1 animated fadeIn">
<?
while($r=mysql_fetch_array($Qjob)){
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
echo mb_substr(strip_tags($art_name), 0, 80, 'UTF-8') . ' ...';
echo"<div class='linenews-date'>$time</div></div></a>";
}



?>
<div class="clearfix"></div>
<a href="more-article.php?id=6"><div class="readmore">เพิ่มเติม <span class="glyphicon glyphicon-plus-sign"></span></div></a>
                    </li>
                    
                    <li class="detailContent2 animated fadeIn">
                    	<?
while($r=mysql_fetch_array($Qjob2)){
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
echo mb_substr(strip_tags($art_name), 0, 80, 'UTF-8') . ' ...';
echo"<div class='linenews-date'>$time</div></div></a>";
}



?>
<div class="clearfix"></div>
<a href="more-article.php?id=7"><div class="readmore">เพิ่มเติม <span class="glyphicon glyphicon-plus-sign"></span></div></a>

                    </li>
                    
                    
                </ul>
            </div>
        </div>