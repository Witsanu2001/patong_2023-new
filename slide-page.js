$(document).ready(function() {
  $.ajax({
    method: 'GET',
    url: './api/db.php',
    dataType: 'json',
    success: function(response) {
      console.log(response);
      
      if (response.RespCode === 200) {
        var serviceData = response.data;
        
        var html = '';
        for (var i = 0; i < serviceData.length; i++) {
          const cardElement = document.createElement('div');
          cardElement.classList.add('col-md-6');
          html += `<div class="col-md-6">
                    <div class="card card-1 shadow-sm">
                      <div class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" style="image-rendering: optimizeQuality;">
                        <image src="./images/service/${serviceData[i].sv_img}"/>
                      </div>
                      <div class="card-body">
                        <p class="card-text">${serviceData[i].sv_name}</p>
                      </div> 
                    </div>
                  </div>`;
        }
        $("#servicelist").html(html);
      } else {
        console.log("มีข้อผิดพลาดในการรับข้อมูล");
      }
    },
    error: function(err) {
      console.log("เกิดข้อผิดพลาดในการเรียก API: ", err);
    }
  });
});