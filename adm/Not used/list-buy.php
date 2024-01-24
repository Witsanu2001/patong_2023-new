<?php
include ('cp/connect.php');
	
	$Qbuy= mysql_query("SELECT * FROM tb_article WHERE art_type='4' ORDER BY art_id DESC LIMIT $start,$limit");
	$totalbuy = mysql_num_rows($Qbuy);
	
	$Qbuy2= mysql_query("SELECT * FROM tb_article WHERE art_type='5' ORDER BY art_id DESC LIMIT $start,$limit");
	$totalbuy2 = mysql_num_rows($Qbuy2);
	
	
	$page = $_GET['page'];

?>

<div class="news">
    <div id="i_containTab3">
        <ul id="navi_containTab3">
            <li class="tab3 tabNavi1 active">จัดซื้อจัดจ้าง</li>
            <li class="tab3 tabNavi2">ประกาศผลจัดซื้อจัดจ้าง</li>
        </ul>
        <ul id="detail_containTab3">
            <li class="detailContent1 animated fadeIn">
                <?php
                $mysqli = new mysqli("localhost", "my_user", "my_password", "my_db");

                if ($mysqli->connect_errno) {
                    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }

                $Qbuy = $mysqli->query("SELECT * FROM tb_article WHERE art_type='4' ORDER BY art_id DESC LIMIT $start,$limit");

                while ($r = $Qbuy->fetch_assoc()) {
                    $art_id = $r['art_id'];
                    // ส่วนอื่น ๆ ของคุณ...
                    echo "<a href='article.php?id=$art_id' title='$art_name'><div class='linenews'>";
                    echo mb_substr(strip_tags($art_name), 0, 75, 'UTF-8') . '';
                    echo "<div class='linenews-date'>$time</div></div></a>";
                }

                ?>
                <div class="clearfix"></div>
                <a href="more-article.php?id=4"><div class="readmore">เพิ่มเติม <span class="glyphicon glyphicon-plus-sign"></span></div></a>
            </li>

            <li class="detailContent2 animated fadeIn">
                <?php
                $Qbuy2 = $mysqli->query("SELECT * FROM tb_article WHERE art_type='5' ORDER BY art_id DESC LIMIT $start,$limit");

                while ($r = $Qbuy2->fetch_assoc()) {
                    // ส่วนอื่น ๆ ของคุณ...
                    echo "<a href='article.php?id=$art_id'><div class='linenews'>";
                    echo mb_substr(strip_tags($art_name), 0, 80, 'UTF-8') . '';
                    echo "<div class='linenews-date'>$time</div></div></a>";
                }

                ?>
                <div class="clearfix"></div>
                <a href="more-article.php?id=5"><div class="readmore">เพิ่มเติม <span class="glyphicon glyphicon-plus-sign"></span></div></a>
            </li>
        </ul>
    </div>
</div>
                    
                    <li class="detailContent2 animated fadeIn">
					<?php
$mysqli = new mysqli("localhost", "my_user", "my_password", "my_db");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$result = $mysqli->query("SELECT * FROM tb_article WHERE art_type='4' ORDER BY art_id DESC LIMIT $start,$limit");

while ($row = $result->fetch_assoc()) {
    printf ("%s (%s)\n", $row["art_name"], $row["art_date"]);
}

$result->free();
?>




<div class="clearfix"></div>
<a href="more-article.php?id=5"><div class="readmore">เพิ่มเติม <span class="glyphicon glyphicon-plus-sign"></span></div></a>

                    </li>
                    
                    
                </ul>
            </div>
        </div>