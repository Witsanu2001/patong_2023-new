<?php
session_start();

if(!isset($_SESSION['user'])) {
  echo '<script>alert("กรุณาเข้าสู่ระบบก่อน!!!");window.location="login.php";</script>';
  die();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <?php include "header-link.php"; ?>

    </style>
  </head>
  <body>
    
<div class="container">
  <?php include "header.php"; ?>  
</div>


<main class="curtain-container container">
    

    <nav class="nav link d-flex flex-wrap justify-content-between">
      <?php include "nav-link.php"; ?>
    </nav>


    <br>
    <div class="row g-5">
        <div>    
        <h4 class="pb-4 mb-4 fst-italic border-bottom ">
          <div class="dropdown d-lg-none">
            <button class="btn" type="button" id="dropdownMenuButtonMobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownMenuButtonMobile">
            <?php include "button-menu.php"; ?>
            </div>
        </div>
        

    <?php include "link-boot.php"; ?>
    
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>คลินิก</h2>
          <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p>
          <br>
          <button type="button" class="btn btn-outline-primary"><a href="clinic_add.php">เพิ่ม</a></button>
        </div>
          
          <div class="row gy-5" id="cliniclist"></div>
          
        </div>
      </div>
    </section>

   

        <br>
        <br>
        <br>
        <br>
<footer class="blog-footer footer" data-aos="fade-up">
  <?php include "footer.php"; ?>
</footer>
</main>

<!-- Modal -->
<div class="modal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<?php include "modal.php" ?>
</div>


        
  </body>
</html>

<script src="person.js"></script>
<script src="./calendar-01/js/jquery.min.js"></script>
<script src="./calendar-01/js/popper.js"></script>
<script src="./calendar-01/js/bootstrap.min.js"></script>
<script src="./calendar-01/js/main.js"></script>
<script src="https://unpkg.com/thai-buddhist-date/dist/index.umd.js"></script>

<script>
  
$(document).ready(function() {
  $.ajax({
    method: 'GET',
    url: './api/get.php',
    dataType: 'json',
    success: function(response) { 
      if (response.RespCode === 200) {
        var clinicData = response.data;

        const clinicContainer = document.querySelector("#cliniclist");

        clinicData.forEach((clinic, i) => {
          const clinicItem = document.createElement("div");
          clinicItem.classList.add("col-xl-4", "col-md-6");
          clinicItem.setAttribute("data-aos", "zoom-in");
          clinicItem.setAttribute("data-aos-delay", `${100 * (i + 1)}`);

          clinicItem.innerHTML = `
              <div class="service-item">
                <div class="img">
                  <img src="../images/clinic/${clinic.cn_img}" class="img-fluid" alt="">
                </div>
                <div class="details position-relative">
                  <div class="icon">
                    <i class="fas fa-heartbeat"></i>
                  </div>
                  <a href="cliniclist.php?id=${clinic.cn_id}" class="stretched-link">
                    <h3>${clinic.cn_name}<a href="clinic_edit.php?id=${clinic.cn_img}">&nbsp;<i class="bi bi-pencil-square"></i></a></h3>
                  </a>
                </div>
              </div>
          `;


          clinicContainer.appendChild(clinicItem);
        });
      } else {
        console.log("Error: Unable to fetch clinic data");
      }
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText);
    }
  });
});
</script>