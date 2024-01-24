<?php 

    session_start();
    require_once './config/db.php';

    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $nickname = $_POST['nickname'];
        $numberphone = $_POST['numberphone'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';

        if (empty($firstname)) {
            $_SESSION['error'] = 'กรุณากรอกข้อมูล';
            header("location: register.php");
        } else if (empty($lastname)) {
            $_SESSION['error'] = 'กรุณากรอกนามสกุล';
            header("location: register.php");
        } else if (empty($nickname)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อเล่น';
            header("location: register.php");
        } else if (empty($numberphone)) {
            $_SESSION['error'] = 'กรุณากรอกเบอร์โทร';
            header("location: register.php");
        } else if (strlen($_POST['numberphone']) > 10 || strlen($_POST['numberphone']) < 0) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 0 ถึง 20 ตัวอักษร';
            header("location: register.php"); 
        } else if (empty($username)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: register.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: register.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
            header("location: register.php");
        } else if (empty($c_password)) {
            $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
            header("location: register.php");
        } else if ($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: register.php");
        } else {
            try {

                $check_username = $conn->prepare("SELECT username FROM users WHERE username = :username");
                $check_username->bindParam(":username", $username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='index.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
                    header("location: index.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(firstname, lastname, nickname, numberphone, address, district, city, username, password, urole) 
                                            VALUES(:firstname, :lastname, :nickname, :numberphone, :address, :district, :city, :username, :password, :urole)");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":nickname", $nickname);
                    $stmt->bindParam(":numberphone", $numberphone);
                    $stmt->bindParam(":address", $address);
                    $stmt->bindParam(":district", $district);
                    $stmt->bindParam(":city", $city);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":urole", $urole);
                    $stmt->execute();
                    $_SESSION['success'] = "คุณสมัครสมาชิกเรียบร้อยแล้ว!";
                    header("location: index.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                    header("location: register.php");
                }

            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>