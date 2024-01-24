<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <?php include "header-link.php"; ?>

    <style>
    @media (max-width: 768px) {
      .img-fluid {
        width: 360px; /* ขนาดของรูปภาพเมื่อเป็น responsive */
        border-radius:20px
      }
    }
    </style>
  </head>
  <body>
  <div class="scroll-to-top">
    <i class="fa-solid fa-angles-up" style="color: #ffffff;"></i>
  </div>
    
<div class="container">
  <?php include "header.php"; ?>  
</div>



<main class="curtain-container container">
    

    <nav class="nav link d-flex flex-wrap justify-content-between">
      <?php include "nav-link.php"; ?>
    </nav>

    <?php include "link-boot.php"; ?>
    
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>คลินิก</h2>
          <p>Ea vitae aspernatur deserunt voluptatem impedit deserunt magnam occaecati dssumenda quas ut ad dolores adipisci aliquam.</p>
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