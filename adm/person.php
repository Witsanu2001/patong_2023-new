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
$strSQL = "SELECT * FROM ceo_manage";
$objQuery = mysqli_query($objCon, $strSQL);
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
      .img-fluid{
        width: 300px;
        max-height: 300px;
        object-fit: cover;
      }
      .member-info{
        width: 250px;
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
      <?php
      $strSQL = "SELECT * FROM ceo WHERE co_id = 1";
      $objQuery_c = mysqli_query($objCon, $strSQL);
      $objResult_c = mysqli_fetch_array($objQuery_c, MYSQLI_ASSOC);
      ?>
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>โครงสร้างผู้บริหารโรงพยาบาลป่าตอง</h2>
          <!-- <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p> -->
        </div>
        <div class="row gy-5">    
        <center>
          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200" style="margin-left: 100px;">
            <div class="team-member">
              <div class="member-img">
                <img src="../images/ceo/<?php echo $objResult_c["co_img"]; ?>"  alt="" style="height: 400px;  width: 300px;">
              </div>
              <div class="member-info">
              <div class="social">
                <a href="ceo_edit.php?id=<?php echo $objResult_c["co_id"]; ?>"><i class="bi bi-pencil-square"></i></a>
              </div>             
                <h6><?php echo $objResult_c["co_name"]; ?></h6>
                <span><?php echo $objResult_c["co_position"]; ?></span>
                <span>ผู้อำนวยการโรงพยาบาลป่าตอง</span>
                <span>โทร 076-342-633-4</span>
              </div>
            </div>
          </center>
        </div>
      </div>
      <br>
      <br>

      <center><div class="row gy-5" id="ceolist" style="margin-left: 20px; margin-right: -130px;"></div></center>
      <br>
      <div class="row gy-5">    
          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="../images/noimg.png" class="img-fluid" alt="">
              </div>
              <a href="person_add.php"> 
                <div class="member-info"> 
                    <h5>เพิ่ม</h5>
                </div>
              </a>
            </div>
        </div>
      </div>
    </section><!-- End Team Section -->

    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>โครงสร้างบริหารงานโรงพยาบาล</h2>
        </div>
        <div class="row gy-5"> 
        <center>
          <div class="row"  data-aos="fade-up">
            <img src="../images/sytem.jpg" alt="">
          </div>
        </center>   
        
      </div>
    </section><!-- End Team Section -->
        
        <br>
        <br>
        <br>
        <br>

        <footer class="blog-footer footer"  data-aos="fade-up">
          <?php include "footer.php"; ?>
        </footer>
    </main>
  </body>
</html>
<script src="person.js"></script>

<script>
  $(document).ready(function() {
  $.ajax({
    method: 'GET',
    url: './api/ceo.php',
    dataType: 'json',
    success: function(response) {
      if (response.RespCode === 200) {
        var ceoData = response.data; 

        const ceoContainer = document.querySelector("#ceolist");

        ceoData.forEach((ceo, i) => {
          const ceoItem = document.createElement("div");
          ceoItem.classList.add("col-xl-4", "col-md-6","d-flex");
          ceoItem.setAttribute("data-aos", "zoom-in");
          ceoItem.setAttribute("data-aos-delay", `${100 * (i + 1)}`);

          ceoItem.innerHTML = `
            <div class="team-member">
              <div class="member-img">
                <img src="../images/ceo/${ceo.ceo_img}" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href="person_edit.php?id=${ceo.ceo_id}"><i class="bi bi-pencil-square"></i></a>
                </div>
                <h6>${ceo.ceo_name}</h6>
                <span>${ceo.ceo_position}</span>
                <span>โทร 076-342-633-4</span>
              </div>
            </div>
          `;

          ceoContainer.appendChild(ceoItem);
        });
      } else {
        console.log("Error: Unable to fetch ceo data");
      }
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText);
    }
  });
});
</script>



