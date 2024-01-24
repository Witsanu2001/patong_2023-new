<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thai Buddhist Calendar</title>
  <script src="https://unpkg.com/thai-buddhist-date/dist/index.umd.js"></script>
</head>
<body>
  <div class="container">
    <h4 class="fst-italic">ปฏิทิน</h4>
    <div class="row">
      <div class="col-md-12">
        <div class="calendar calendar-first" id="calendar_first">
          <div class="calendar_header">
            <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
            <h2></h2>
            <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
          </div>
          <div class="calendar_weekdays"></div>
          <div class="calendar_content"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // ตัวอย่างการแปลงวันที่ให้เป็นวันที่พุทธศักราชไทย
    const calendar = document.getElementById('calendar_first');
    const thaiCalendar = new TBDateConverter(calendar, 'th');

    // ใส่โค้ดเพิ่มเติมที่ต้องการในการแสดงปฏิทินพุทธศักราชไทยได้ที่นี่
  </script>
</body>
</html>
