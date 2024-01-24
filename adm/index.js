
$(document).ready(function() {
  $.ajax({
    method: 'GET',
    url: './api/atv.php',
    dataType: 'json',
    success: function(response) {
      console.log(response);
      
      if (response.RespCode === 200) {
        var atvData = response.data;
        
        const notificationImg = document.getElementById('notificationImg');
        const notificationText = document.getElementById('notificationText');
        const messages = [];
        const images = [];

        // วนลูปผ่าน atvData เพื่อสร้าง messages และ images
        for (let i = 0; i < atvData.length; i++) {
          messages.push(atvData[i].atv_name); // เพิ่มข้อความจากข้อมูลที่ได้รับมา
          images.push(`../images/activity/${atvData[i].atv_img1}`);
        }

        let index = 0;
        setInterval(() => {
          notificationText.textContent = messages[index];
          notificationImg.src = images[index];
          notificationImg.style.display = 'inline-block'; // แสดงรูปภาพ
          index = (index + 1) % messages.length;
        }, 5000); // เปลี่ยนข้อความทุก 5 วินาที
      } else {
        console.log("มีข้อผิดพลาดในการรับข้อมูล");
      }
    },
    error: function(err) {
      console.log("เกิดข้อผิดพลาดในการเรียก API: ", err);
    }
  });
});


$(document).ready(function() {
  $.ajax({
    method: 'GET',
    url: './api/index_pag.php',
    dataType: 'json',
    success: function(response) {
      console.log(response);
      
      if (response.RespCode === 200) {
        var clinicData = response.data;
        
        var html = '<div class="row">';
        for (var i = 0; i < clinicData.length; i++) {
          html += `
            <div class="col-md-6">
            <a href="${clinicData[i].b_link}">
              <div class="card card-1 shadow-sm">
                <div class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" style="image-rendering: optimizeQuality;">
                  <img src="../images/logo-page/${clinicData[i].b_logo}" width="100%" height="100%"/>
                </div>
                <div class="card-body">
                  <p class="card-text">${clinicData[i].b_name}</p>
                  <div class="d-flex justify-content-between align-items-center">
                     <small class="text-muted">อัพเดตล่าสุด  ${clinicData[i].b_time}</small>
                   </div>
                </div>
              </div>
              </a>
            </div>
          `;
        }
        html += '</div>'; // ปิด row

        $("#newsContainer").html(html);
      } else {
        console.log("มีข้อผิดพลาดในการรับข้อมูล");
      }
    },
    error: function(err) {
      console.log("เกิดข้อผิดพลาดในการเรียก API: ", err);
    }
  });
});



$(document).ready(function () {
  // เรียกฟังก์ชั่นเมื่อโหลดหน้าเว็บ
  checkWidth();

  // เรียกฟังก์ชั่นเมื่อมีการเปลี่ยนขนาดหน้าจอ
  $(window).resize(checkWidth);
});

function checkWidth() {
  var windowWidth = $(window).width(); // ขนาดหน้าจอปัจจุบัน

  if (windowWidth <= 768) {
      // ถ้าหน้าจอมีขนาดไม่เกิน 768px
      // แยกการแสดงผลสำหรับโหมด responsive
      $(".nav .dropdown").addClass("responsive-dropdown");
  } else {
      // ถ้าหน้าจอมีขนาดมากกว่า 768px
      // กำหนดให้แสดงผลเมนูปกติ
      $(".nav .dropdown").removeClass("responsive-dropdown");
  }
}


// JavaScript
window.onscroll = function() {
  var btn = document.querySelector('.scroll-to-top');
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    btn.style.display = 'block';
  } else {
    btn.style.display = 'none';
  }
};

// เพิ่มการทำงานเมื่อคลิกที่ icon เพื่อเลื่อนขึ้นบนหน้าเว็บ
document.querySelector('.scroll-to-top').addEventListener('click', function() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
});

// เพิ่มการทำงานเมื่อคลิกที่ icon searchIcon
document.getElementById('searchIcon').addEventListener('click', function() {
  var searchBox = document.getElementById('searchBox');
  searchBox.style.display = (searchBox.style.display === 'block') ? 'none' : 'block';
  
});

  document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function() {
      this.querySelector('.dropdown-item.item').classList.toggle('show');
    });
  });



  document.addEventListener("DOMContentLoaded", function() {
    const dropdownMenus = document.querySelectorAll('.dropdown-item');

    dropdownMenus.forEach(function(item) {
      const nestedItem = item.querySelector('.nested-item');
      if (nestedItem) {
        nestedItem.style.display = 'none';

        item.addEventListener('click', function(event) {
          event.stopPropagation();
          nestedItem.style.display = nestedItem.style.display === 'none' ? 'block' : 'none';
        });
      }
    });
  });



  document.addEventListener('DOMContentLoaded', function() {
    const searchIcon = document.getElementById('searchIcon');
    const searchBox = document.getElementById('searchBox');
    const closeBtn = searchBox.querySelector('.fa-xmark');

    searchIcon.addEventListener('click', function() {
      searchBox.style.display = 'block';
    });

    closeBtn.addEventListener('click', function() {
      searchBox.style.display = 'none';
    });
  });

// เลือกปุ่มรีเฟรช
const refreshButton = document.getElementById('refreshButton');

// เมื่อคลิกที่ปุ่มรีเฟรช
refreshButton.addEventListener('click', () => {
    const notificationImg = document.getElementById('notificationImg');
    const imageUrl = 'URL ของรูปภาพที่ต้องการให้รีเฟรช'; // เปลี่ยน URL ตามที่ต้องการ

    // ให้รูปภาพเปลี่ยน URL และรีเฟรช
    notificationImg.src = imageUrl + '?time=' + new Date().getTime();
});

// modal
document.getElementById('copy-button').addEventListener('click', function () {
  var modalContent = "ที่อยู่ :  57 ถ.ไสน้ำเย็น ต.ป่าตอง อ.กะทู้ จ.ภูเก็ต 83150 <br> Patong Hospital : 57 sainamyen Rd., Patong, Kathu, Phuket 83150 Thailand";

  // ตรวจสอบว่า navigator.clipboard สามารถใช้งานได้หรือไม่
  if (!navigator.clipboard) {
      console.error('บราวเซอร์ไม่รองรับการเข้าถึง Clipboard');
      return;
  }

  // เขียนข้อความลง Clipboard
  navigator.clipboard.writeText(modalContent)
      .then(() => {
          var myModal = bootstrap.Modal.getInstance(document.getElementById('myModal'));
          myModal.hide();
          alert('คัดลอกข้อความแล้ว!');
      })
      .catch(err => {
          console.error('ไม่สามารถคัดลอกข้อความได้: ', err);
          alert('เกิดข้อผิดพลาดในการคัดลอกข้อความ');
      });
});

const images = document.querySelectorAll('.link-Agency');
const overlay = document.getElementById('overlay');
const imageContainer = document.getElementById('imageContainer');

images.forEach(image => {
  image.addEventListener('click', () => {
    const newImage = document.createElement('img');
    newImage.src = image.src;
    imageContainer.innerHTML = '';
    imageContainer.appendChild(newImage);
    overlay.style.display = 'block';
  });
});

overlay.addEventListener('click', () => {
  overlay.style.display = 'none';
});


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
                      <img src="../images/gallery/${activityData[i].atv_img}" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                      <img src="../images/gallery/${activityData[i].atv_img2}" class="d-block w-100" alt="Slide 2">
                    </div>
                  </div>
                </div>
              </div>
              <div class="meta">
                <span class="post-date">${activityData[i].date}</span>
                <span class="post-author"> / ${activityData[i].author}</span>
              </div>
              <h3 class="post-title">${activityData[i].atv_name}</h3>
              <p>${activityData[i].atv_title}</p>
              <a href="${activityData[i].link}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
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

$(document).ready(function() {
            $.ajax({
                method: 'GET',
                url: './api/news.php',
                dataType: 'json',
                success: function(response) {
                    if (response.RespCode === 200) {
                        var newsData = response.data;
                        var navHtml = '';
                        var tabContentHtml = '';

                        for (var i = 0; i < newsData.length; i++) {
                            navHtml += '<li class="nav-item mt-2">';
                            navHtml += '<a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-' + (i + 1) + '">';
                            navHtml += '<h4>' + newsData[i].n_name + '</h4>';
                            navHtml += '<p>' + newsData[i].n_title + '</p>';
                            navHtml += '</a>';
                            navHtml += '</li>';

                            tabContentHtml += '<div class="tab-pane" id="tab-' + (i + 1) + '">';
                            tabContentHtml += '<h3>' + newsData[i].n_name + '</h3>';
                            tabContentHtml += '<img src="./images/meet/' + newsData[i].n_img + '" alt="" style="max-width: 600px">';
                            tabContentHtml += '</div>';
                        }

                        $('#navHtml').html(navHtml);
                        $('#tabContentHtml').html(tabContentHtml);
                    }
                },
                error: function(xhr, status, error) {
                    // จัดการเมื่อเกิดข้อผิดพลาดในการดึงข้อมูล
                    console.log("เกิดข้อผิดพลาด: " + error);
                }
            });
        });



      //   $.ajax({
      //     method: 'GET',
      //     url: './api/support.php',
      //     dataType: 'json',
      //     success: function(response) {
      //         console.log(response);
              
      //         if (response.RespCode === 200) {
      //             var supportData = response.data;
                  
      //             var html = '<div class="row">';
      //             for (var i = 0; i < supportData.length; i++) {
      //                 html += '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="200" style="margin-top: 30px;">';
      //                 html += '<div class="post-box">';
      //                 html += '<div class="post-img"><img src="./images/gallery/' + supportData[i].sp_img + '" class="img-fluid" alt=""></div>';
      //                 html += '<div class="meta">';
      //                 html += '<span class="post-date">Fri, September 05</span>';
      //                 html += '<span class="post-author"> / Mario Douglas</span>';
      //                 html += '</div>';
      //                 html += '<h3 class="post-title">' + supportData[i].sp_name + '</h3>';
      //                 html += '<p>' + supportData[i].sp_title + '</p>';
      //                 html += '<a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>';
      //                 html += '</div>';
      //                 html += '</div>';
      //             }
      //             html += '</div>'; // ปิด row
      
      //             $("#support").html(html);
      //         } else {
      //             console.log("มีข้อผิดพลาดในการรับข้อมูล");
      //         }
      //     },
      //     error: function(xhr, status, error) {
      //         console.log("เกิดข้อผิดพลาดในการเรียก API: ", error);
      //     }
      // });


      function deleteItem(indexId) {
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณต้องการลบรายการนี้ใช่หรือไม่?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ใช่, ลบ!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                // ถ้าผู้ใช้คลิก "ใช่"
                window.location.href = 'index-pag_delete.php?id=' + indexId;
            }
        });
    }

    function saveItem() {
        Swal.fire({
            title: 'คุณต้องการที่จะบันทึกหรือไม่?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'บันทึก'
        }).then((result) => {
            // ถ้าผู้ใช้กดปุ่ม "บันทึก"
            if (result.isConfirmed) {
                // ดำเนินการบันทึกข้อมูลที่นี่
                // สามารถใส่โค้ดบันทึกข้อมูลหรือทำการ submit ฟอร์มได้
                // ตัวอย่าง: document.getElementById('yourFormId').submit();

                // แสดง SweetAlert บอกว่าบันทึกสำเร็จ
                Swal.fire({
                    title: 'บันทึกสำเร็จ!',
                    icon: 'success'
                });
            }
        });
    }


