<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thai Calendar</title>
  <!-- Include FullCalendar core stylesheet and script -->
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/th.js'></script>
</head>
<body>
  <div class="container">
    <h4 class="fst-italic">ปฎิทิน</h4>
    <div class="row">
      <div class="col-md-12">
        <div id="calendar"></div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        defaultView: 'month',
        locale: 'th', // ตั้งค่าให้เป็นภาษาไทย
        events: [
          // รายการกิจกรรมที่จะแสดงบนปฎิทิน
          {
            title: 'งาน A',
            start: '2023-12-01'
          },
          {
            title: 'งาน B',
            start: '2023-12-07'
          }
          // สามารถเพิ่มรายการกิจกรรมต่างๆ ตามต้องการ
        ]
      });
    });
  </script>
</body>
</html>
