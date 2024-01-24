<title>โรงพยาบาลป่าตอง : Patong hospital</title>
    <link rel="icon" href="./images/logo.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/blog/">
    <link rel="stylesheet" href="./calendar-01/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="index2.css">
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/th.js'></script>
    <script src="https://unpkg.com/thai-buddhist-date/dist/index.umd.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    .bi.bi-x-lg:hover {
        color: red; /* สีที่คุณต้องการเมื่อ hover */
        cursor: pointer; /* เปลี่ยนรูป cursor เป็น pointer เมื่อ hover */
    }
    .modal{
        z-index: 10000;
    }
    </style>
    
    <?php
    require('./api/dbconnect.php');
    $sql = "SELECT * FROM contact";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
    $ct_id = $row['ct_id'];
        if ($ct_id == 1) {
            echo '<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">ที่อยู่โรงพยาบาลป่าตอง</h5>
                                <i class="bi bi-x-lg" data-dismiss="modal" aria-label="Close"></i>
                            </div>
                            <div class="modal-body">
                                <!-- เพิ่ม ID ให้กับ Element ที่เก็บข้อมูลที่ต้องการให้คัดลอก -->
                                <span id="address">'.$row['ct_name'].'</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="copyButton">คัดลอก</button>
                            </div>
                        </div>
                    </div>
                </div>';

    } elseif ($ct_id == 2) {
            echo '<div class="modal fade" id="exampleModalCall" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">เบอร์โทรติดต่อโรงพยาบาลป่าตอง</h5>
                            <i class="bi bi-x-lg" data-dismiss="modal" aria-label="Close"></i>
                        </div>
                        <div class="modal-body">
                            <!-- เพิ่ม ID ให้กับ Element ที่เก็บข้อมูลที่ต้องการให้คัดลอก -->
                            <span id="call">'.$row['ct_name'].'</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="copycall">คัดลอก</button>
                        </div>
                    </div>
                </div>
            </div>';
    } elseif ($ct_id == 3) {
            echo '<div class="modal fade" id="exampleModalfax" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">หมายเลข Fax ติดต่อโรงพยาบาลป่าตอง</h5>
                            <i class="bi bi-x-lg" data-dismiss="modal" aria-label="Close"></i>
                        </div>
                        <div class="modal-body">
                            <!-- เพิ่ม ID ให้กับ Element ที่เก็บข้อมูลที่ต้องการให้คัดลอก -->
                            <span id="fax">'.$row['ct_name'].'</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="copyfax">คัดลอก</button>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }   
    ?>


    <!-- ส่วนของ Script -->
    <script>
    // เมื่อ DOM โหลดเสร็จ
    document.addEventListener("DOMContentLoaded", function () {
        // ค้นหาปุ่ม "คัดลอก" ด้วย ID
        var copyButton = document.getElementById('copyButton');

        // ใช้ Clipboard API เพื่อคัดลอกข้อความ
        copyButton.addEventListener('click', function () {
            // ค้นหา Element ที่เก็บข้อมูลที่ต้องการให้คัดลอก
            var addressElement = document.getElementById('address');

            // สร้าง Range และ Selection
            var range = document.createRange();
            var selection = window.getSelection();

            // ตั้งค่า Range ให้เป็นทั้ง Element
            range.selectNodeContents(addressElement);

            // ลบ Selection ที่มีอยู่
            selection.removeAllRanges();

            // เพิ่ม Range ลงใน Selection
            selection.addRange(range);

            try {
                // ทำงานคำสั่งคัดลอก
                document.execCommand('copy');

                // แสดง Swal ทันทีหลังจากคัดลอกสำเร็จ
                Swal.fire({
                    icon: 'success',
                    title: 'คัดลอกสำเร็จ!',
                    showConfirmButton: false,
                    timer: 1500
                });
            } catch (error) {
                console.error('คัดลอกผิดพลาด: ', error);
            }

            // ลบ Selection ที่มีอยู่
            selection.removeAllRanges();
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
            // ค้นหาปุ่ม "คัดลอก" ด้วย ID
            var copycall = document.getElementById('copycall');

            // ใช้ Clipboard API เพื่อคัดลอกข้อความ
            copycall.addEventListener('click', function () {
                // ค้นหา Element ที่เก็บข้อมูลที่ต้องการให้คัดลอก
                var callElement = document.getElementById('call');

                // สร้าง Range และ Selection
                var range = document.createRange();
                var selection = window.getSelection();

                // ตั้งค่า Range ให้เป็นทั้ง Element
                range.selectNodeContents(callElement);

                // ลบ Selection ที่มีอยู่
                selection.removeAllRanges();

                // เพิ่ม Range ลงใน Selection
                selection.addRange(range);

                try {
                // ทำงานคำสั่งคัดลอก
                    document.execCommand('copy');

                    // แสดง Swal ทันทีหลังจากคัดลอกสำเร็จ
                    Swal.fire({
                        icon: 'success',
                        title: 'คัดลอกสำเร็จ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } catch (error) {
                    console.error('คัดลอกผิดพลาด: ', error);
                }

                // ลบ Selection ที่มีอยู่
                selection.removeAllRanges();
            });
        });
        // เมื่อ DOM โหลดเสร็จ
        document.addEventListener("DOMContentLoaded", function () {
            // ค้นหาปุ่ม "คัดลอก" ด้วย ID
            var copyfax = document.getElementById('copyfax');

            // ใช้ Clipboard API เพื่อคัดลอกข้อความ
            copyfax.addEventListener('click', function () {
                // ค้นหา Element ที่เก็บข้อมูลที่ต้องการให้คัดลอก
                var faxElement = document.getElementById('fax');

                // สร้าง Range และ Selection
                var range = document.createRange();
                var selection = window.getSelection();

                // ตั้งค่า Range ให้เป็นทั้ง Element
                range.selectNodeContents(faxElement);

                // ลบ Selection ที่มีอยู่
                selection.removeAllRanges();

                // เพิ่ม Range ลงใน Selection
                selection.addRange(range);

                try {
                // ทำงานคำสั่งคัดลอก
                    document.execCommand('copy');

                    // แสดง Swal ทันทีหลังจากคัดลอกสำเร็จ
                    Swal.fire({
                        icon: 'success',
                        title: 'คัดลอกสำเร็จ!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                } catch (error) {
                    console.error('คัดลอกผิดพลาด: ', error);
                }

                // ลบ Selection ที่มีอยู่
                selection.removeAllRanges();
            });
        });
    </script>
