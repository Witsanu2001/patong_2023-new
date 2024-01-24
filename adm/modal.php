<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- Modal -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ข้อมูลโรงพยาบาล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-content">
                ข้อมูลโรงพยาบาลจะปรากฏที่นี่
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" id="copy-button">คัดลอก</button>
            </div>
        </div>
    </div>  

    <script>
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
</script>
