<?php
session_start();

if(!isset($_SESSION['user'])) {
  echo '<script>alert("กรุณาเข้าสู่ระบบก่อน!!!");window.location="login.php";</script>';
  die();
}

?>

<?php
require('./api/connect.php');

$objCon = connectDB();
$id = $_GET['id'];
$strSQL = "SELECT * FROM news_pag WHERE np_id = $id";
$objQuery = mysqli_query($objCon, $strSQL);
$objQuery_s = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="stylesheet" href="index2.css">

    <?php include "header-link.php"; ?> 

    <style>
    p {
        text-indent: 2em; /* ค่าที่ต้องการให้ย่อหน้า (เช่น 2em) */
    }
    .index-pag{
      width : 800px;
    }
    .img-des{
        width: 423px;
      }

    @media (max-width: 768px) {
      .index-pag{
        width: 300px;
      }
      .img-des{
        width: 300px;
      }
    }
</style>


  </head>
  <body>
  
  <div class="container">
    <?php include "header.php"; ?>
  </div>
<main class="curtain-container container">
    <!-- <div id="curtain" class="curtain">
    <?php include "slide-page.php"; ?>
    </div> -->

    <nav class="nav link d-flex flex-wrap justify-content-between">
        <?php include "nav-link.php"; ?>
    </nav>
</div>
<?php include "link-boot.php"; ?> 
    <!-- ======= Team Section ======= -->
    <section id="portfolio" class="portfolio" data-aos="fade-up">
        <div class="container">
          <div class="row"  data-aos="fade-up">
            <center><img src="../images/news/<?php echo $objResult ['np_img']?>" alt="" class="img-fluid"></center>
          </div>
          <br>
          <div class="section-header">
            <h2><?php echo $objResult ['np_name']?>&nbsp;<a href="index-pag_edit.php?id=<?php echo $objResult['np_id'];?>"><i class="bi bi-pencil-square"></i></a></h2>
            <p><?php echo $objResult ['np_title']?></p>
          </div>
        </div>
        <?php
        while ($objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) :
        ?>
        <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
                <div class="row g-0 portfolio-container">
                    <?php for ($i = 1; $i <= 3; $i++) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item" style="width: 423px;">
                            <img src="../images/news/<?php echo $objResult_s['img_' . $i] ?>" alt="" class="img-fluid">
                            <div class="portfolio-info">
                                <a href="../images/news/<?php echo $objResult_s['img_' . $i] ?>" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        </div>
      </section>
      <p><?php echo $objResult ['np_details']?></p>
      
 
    <section id="portfolio" class="portfolio" data-aos="fade-up">
      <div class="container">
        <div class="section-header">
          <h2>ข่าวอื่นๆ</h2>
        </div>
      </div>
      <?php
      $strSQL_s = "SELECT np_img, np_id, np_name, np_title FROM news_pag ORDER BY np_id DESC";
      $objQuery_s = mysqli_query($objCon, $strSQL_s);
      ?>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="200">
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
          <div class="row g-0 portfolio-container">
            <?php while ($objResult_s = mysqli_fetch_array($objQuery_s, MYSQLI_ASSOC)) : ?>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 portfolio-item">
                <img src="../images/news/<?php echo $objResult_s['np_img'] ?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4><?php echo $objResult_s['np_name']; ?></h4>
                  <a href="news-pag.php?id=<?php echo $objResult_s['np_id'] ?>" title="More Details" class="details-link"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </section>

    <br>
    <br>

        <footer class="blog-footer footer"  data-aos="fade-up">
          <?php include "footer.php"; ?>
        </footer>
    </main>
  </body>
</html>
<script src="person.js"></script>

