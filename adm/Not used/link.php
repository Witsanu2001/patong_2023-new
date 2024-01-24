<div class="h-menu-l"><span class="glyphicon glyphicon-link"></span> หน่วยงานที่เกี่ยวข้อง</div>
            <div class="boxlink">
            	<?
						$sql="select * from tb_page where page_id='4' ";
						$result=mysql_db_query($dbname,$sql);
						$r=mysql_fetch_array($result);
						
					$page_id = $r['page_id'];
					$page_name = $r['page_name'];
					$page_detail = $r['page_detail'];
					
					
					$word_cut = array("<p>","</p>");
					$replace = " ";  
					
					for ($i=0 ; $i<sizeof($word_cut) ; $i++) { 
					$page_detail = eregi_replace($word_cut[$i],$replace,$page_detail);  
					} 
					
					echo str_replace("../upload/files","upload/files",$page_detail);
					?>
            </div>