


// ตรวจสอบขนาดหน้าจอเพื่อเปลี่ยนแสดงเมนูเป็นปุ่ม dropdown
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




document.addEventListener("DOMContentLoaded", function() {
setTimeout(function() {
document.getElementById('curtain').classList.add('hide'); // เพิ่ม class เพื่อเริ่มการปิดอย่างช้าๆ
setTimeout(function() {
document.getElementById('curtain').style.display = 'none'; // ซ่อนฉากม่านเมื่อเสร็จสิ้น
}, 1000); // รอ 3 วินาที แล้วซ่อน
}, 1000); // รอ 2 วินาที ก่อนที่จะเริ่มการปิด
});

document.addEventListener("DOMContentLoaded", function() {
setTimeout(function() {
document.getElementById('curtain').classList.add('curtain');
}, 1000); // รอ 2 วินาที ก่อนที่จะเริ่มการปิด
});

document.addEventListener("DOMContentLoaded", function() {
setTimeout(function() {
document.querySelector('.row.g-5').classList.add('show'); // เพิ่ม class เพื่อเริ่มการเคลื่อนที่
}, 2000); // รอ 2 วินาที ก่อนที่จะเริ่มการเคลื่อนที่
});




// AJAX สำหรับแสดงข้อมูลบริการ
$(document).ready(function() {
  $.ajax({
    method: 'GET',
    url: './api/db.php',
    dataType: 'json',
    success: function(response) {
      if (response.RespCode === 200) {
        var serviceData = response.data; 

        const serviceContainer = document.querySelector("#servicelist");

        serviceData.forEach((service, i) => {
          const serviceItem = document.createElement("div");
          serviceItem.classList.add("col-xl-4", "col-md-6");
          serviceItem.setAttribute("data-aos", "zoom-in");
          serviceItem.setAttribute("data-aos-delay", `${100 * (i + 1)}`);

          serviceItem.innerHTML = `
            <div class="service-item">
              <div class="img">
                <img src="./images/service/${service.sv_img}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="fas fa-wheelchair"></i>
                </div>
                <a href="serviceitem.php?id=${service.sv_id}" class="stretched-link">
                  <h3>${service.sv_name}</h3>
                </a>
              </div>
            </div>
          `;

          serviceContainer.appendChild(serviceItem);
        });
      } else {
        console.log("Error: Unable to fetch service data");
      }
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText);
    }
  });
});

// AJAX สำหรับแสดงข้อมูลคลินิก
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
                  <img src="./images/clinic/${clinic.cn_img}" class="img-fluid" alt="">
                </div>
                <div class="details position-relative">
                  <div class="icon">
                    <i class="fas fa-heartbeat"></i>
                  </div>
                  <a href="cliniclist.php?id=${clinic.cn_id}" class="stretched-link">
                    <h3>${clinic.cn_name}</h3>
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




  
  var nav = document.querySelector('.link');

  window.addEventListener('scroll', function() {
    if (window.scrollY > 100) {
      nav.classList.add('nav-sticky');
    } else {
      nav.classList.remove('nav-sticky');
    }
  });

  // modal
    document.getElementById('address-link').addEventListener('click', function (event) {
        event.preventDefault();
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            backdrop: true, // ให้ใช้หน้าจอมืดและสามารถคลิกปิดได้
            keyboard: true // ให้ใช้ปุ่ม Escape สำหรับปิด
        });
        myModal.show();
        
        var modalContent = document.getElementById('modal-content');
        modalContent.innerHTML = "ที่อยู่ :  57 ถ.ไสน้ำเย็น ต.ป่าตอง อ.กะทู้ จ.ภูเก็ต 83150 <br> Patong Hospital : 57 sainamyen Rd., Patong, Kathu, Phuket 83150 Thailand";
    });


// ใช้ window.onscroll เพื่อตรวจจับเหตุการณ์เมื่อมีการเลื่อนหน้าจอ
window.onscroll = function() {
  var navbar = document.querySelector('.nav'); // ตัวแปร navbar เก็บ element ของ Navbar

  // เช็คเงื่อนไขว่า scrollY (ตำแหน่งที่เลื่อน) มากกว่าหรือเท่ากับ 100px (ตัวอย่าง)
  if (window.scrollY > 100) {
    navbar.classList.add('navbar-scrolled'); // เพิ่มคลาส navbar-scrolled เมื่อเลื่อนลง
  } else {
    navbar.classList.remove('navbar-scrolled'); // ลบคลาส navbar-scrolled เมื่อเลื่อนขึ้นสูงกว่า 100px
  }
};



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

$.ajax({
  method: 'GET',
  url: './api/support.php',
  dataType: 'json',
  success: function(response) {
      console.log(response);
      
      if (response.RespCode === 200) {
          var supportData = response.data;
          
          var html = '<div class="row">';
          for (var i = 0; i < supportData.length; i++) {
              html += '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="200" style="margin-top: 30px;">';
              html += '<div class="post-box">';
              html += '<div class="post-img"><img src="./images/gallery/' + supportData[i].sp_img + '" class="img-fluid" alt=""></div>';
              html += '<div class="meta">';
              html += '<span class="post-date">Fri, September 05</span>';
              html += '<span class="post-author"> / Mario Douglas</span>';
              html += '</div>';
              html += '<h3 class="post-title">' + supportData[i].sp_name + '</h3>';
              html += '<p>' + supportData[i].sp_title + '</p>';
              html += '<a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>';
              html += '</div>';
              html += '</div>';
          }
          html += '</div>'; // ปิด row

          $("#support").html(html);
      } else {
          console.log("มีข้อผิดพลาดในการรับข้อมูล");
      }
  },
  error: function(xhr, status, error) {
      console.log("เกิดข้อผิดพลาดในการเรียก API: ", error);
  }
});


// AJAX สำหรับแสดงข้อมูลบริการ
// $(document).ready(function() {
//   $.ajax({
//     method: 'GET',
//     url: './api/ceo.php',
//     dataType: 'json',
//     success: function(response) {
//       if (response.RespCode === 200) {
//         var ceoData = response.data; 

//         const ceoContainer = document.querySelector("#ceolist");

//         ceoData.forEach((ceo, i) => {
//           const ceoItem = document.createElement("div");
//           ceoItem.classList.add("col-xl-4", "col-md-6","d-flex");
//           ceoItem.setAttribute("data-aos", "zoom-in");
//           ceoItem.setAttribute("data-aos-delay", `${100 * (i + 1)}`);

//           ceoItem.innerHTML = `
//             <div class="team-member">
//               <div class="member-img">
//                 <img src="./images/ceo/${ceo.ceo_img}" class="img-fluid" alt="">
//               </div>
//               <div class="member-info">

//                 <h6>${ceo.ceo_name}</h6>
//                 <span>${ceo.ceo_position}</span>
//                 <span>โทร 076-342-633-4</span>
//               </div>
//             </div>
//           `;

//           ceoContainer.appendChild(ceoItem);
//         });
//       } else {
//         console.log("Error: Unable to fetch ceo data");
//       }
//     },
//     error: function(xhr, status, error) {
//       console.error(xhr.responseText);
//     }
//   });
// });
