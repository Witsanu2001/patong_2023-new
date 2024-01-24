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
        
        <div class="col-cr">
        	<div class="toppic">รู้จักองค์กร</div>
            <div style="margin-top:10px; padding:10px;">
            <?php
				$sql="select * from tb_page where page_id='1' ";
				$result=mysql_db_query($dbname,$sql);
				$r=mysql_fetch_array($result);
				
			$page_id = $r['page_id'];
			$page_name = $r['page_name'];
			$page_detail = $r['page_detail'];
		echo str_replace("../upload/files","upload/files",$page_detail);
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