
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">

    <title>โรงพยาบาลป่าตอง : Patong hospital</title>
    <link rel="icon" href="./images/logo.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
    <link rel="stylesheet" href="./calendar-01/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index2.css">
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">   
  </head>

  



 
  <body>
  <div class="scroll-to-top">
    <i class="fa-solid fa-angles-up" style="color: #ffffff;"></i>
  </div>
    
    <div class="container">
        <?php include "header.php"; ?>  
    </div>

<main class="curtain-container container">
    <nav class="nav d-flex flex-wrap justify-content-between">
        <?php include "nav-link.php"; ?>
    </nav>
    <br>
    <?php include "link-boot.php"; ?>

      <!-- ======= Recent Blog Posts Section ======= -->
      <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

      <div class="section-header">
          <h2>กิจกรรมภายในโรงพยาบาล</h2>
          <p>Recent posts form our Blog</p>
      </div>
      
      <div class="row" id="activity">
      </a>  
      </div>
      </div>

      </section>
        <br>
        <br>
        <br>
<footer class="blog-footer footer">
  <?php include "footer.php"; ?>
</footer>
</main>

  </body>
</html>

<script src="index.js"></script>
<script src="./calendar-01/js/jquery.min.js"></script>
<script src="./calendar-01/js/popper.js"></script>
<script src="./calendar-01/js/bootstrap.min.js"></script>
<script src="./calendar-01/js/main.js"></script>
<script src="https://unpkg.com/thai-buddhist-date/dist/index.umd.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
          $(document).ready(function() {
            $.ajax({
              method: 'GET',
              url: './api/atv.php',
              dataType: 'json',
              success: function(response) {
                if (response.RespCode === 200) {
                  var activityData = response.data;
                  var html = '';

                  for (var i = 0; i < activityData.length; i++) {
                    html += `
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200" style="margin-top: 30px;">
                      <div class="post-box">
                        <div class="post-img">
                          <div id="myCarousel-${i}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="./images/activity/${activityData[i].atv_img1}" class="d-block w-100" alt="Slide 1">
                              </div>
                              <div class="carousel-item">
                                <img src="./images/activity/${activityData[i].atv_img2}" class="d-block w-100" alt="Slide 2">
                              </div>
                              <div class="carousel-item">
                                <img src="./images/activity/${activityData[i].atv_img3}" class="d-block w-100" alt="Slide 2">
                              </div>
                              <div class="carousel-item">
                                <img src="./images/activity/${activityData[i].atv_img4}" class="d-block w-100" alt="Slide 2">
                              </div>
                              <div class="carousel-item">
                                <img src="./images/activity/${activityData[i].atv_img5}" class="d-block w-100" alt="Slide 2">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="meta">
                          <span class="post-date">${activityData[i].atv_date}</span>
                          <span class="post-author"> / ${activityData[i].author}</span>
                        </div>
                        <h3 class="post-title">${activityData[i].atv_name}</h3>
                        <p>${activityData[i].atv_title}</p>
                        <a href="activity.php?id=${activityData[i].atv_id}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                      </div>
                    </div>
                    `;
                  }

                  $("#activity").html(html);

                  // ให้แต่ละสไลด์เริ่มการสไลด์ในการแสดงผล
                  for (var j = 0; j < activityData.length; j++) {
                    $('#myCarousel-' + j).carousel();
                  }
                } else {
                  console.log("มีข้อผิดพลาดในการรับข้อมูล");
                }
              },
              error: function(err) {
                console.log("เกิดข้อผิดพลาดในการเรียก API: ", err);
              }
            });
          });
        </script>