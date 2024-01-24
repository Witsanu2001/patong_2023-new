<link rel="stylesheet" href="index.css">

<div class="footer-left">
    <img src="./images/footer-dr.png" alt="Footer Image" />
  </div>
  <div class="footer-right">
    <div class="footer-right-upper">
      <img src="./images/award.png" /><br />
    </div>
    <div class="footer-right-lower">
      <center><b>Copyright &copy; 2558 Patong Hospital. Allright Reserved.</b><br />
      โรงพยาบาลป่าตอง : 57 ถ.ไสน้ำเย็น ต.ป่าตอง อ.กะทู้ จ.ภูเก็ต 83150<br />
      Patong Hospital : 57 sainamyen Rd., Patong, Kathu, Phuket 83150 Thailand<br />
      Tel. 076-342 633-4 | Fax. 076-340 617<br /></center>
    </div>
  </div>

  <a href="./adm" target="_blank" class="admin-link">
    <i class="bi bi-gear-fill ms-auto"></i>
    <span class="admin-tooltip">สำหรับเจ้าหน้าที่ admin</span>
</a>

<style>
    .ms-auto {
        float: right; /* กำหนดให้อยู่ฝั่งขวาด้วย float */
        font-size: 40px;
        color: #fff;
        position: relative; /* ตั้งค่า position เพื่อให้สามารถใช้ absolute ในลูกข่ายได้ */
        margin-top: -100px;
        margin-right: 15px;
    }

    .admin-link {
        position: relative; /* ตั้งค่า position เพื่อให้สามารถใช้ absolute ในลูกข่ายได้ */
        display: inline-block;
    }

    .admin-tooltip {
        position: absolute;
        top: -130px;
        left: -70%;
        transform: translateX(-50%);
        background-color: #333;
        color: #fff;
        padding: 5px;
        border-radius: 5px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        pointer-events: none; /* ปิดการใช้งาน pointer events เพื่อไม่ให้ทับกับ element ต่อไป */
        width: 160px;
    } 

    .admin-link:hover .admin-tooltip {
        opacity: 1;
    }
</style>
