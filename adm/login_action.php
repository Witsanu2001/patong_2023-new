<?php
session_start();
?>

<?php
include('./api/dbconnect.php');

// Assuming you are using POST method for form submission
$user = mysqli_real_escape_string($conn, $_POST['user']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$sql = "SELECT * FROM tb_user WHERE user_name='$user' AND user_pass ='$pass'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION["user"] = $user;
    echo "<script>
        window.location='index.php';
        </script>";
} else {
    echo "<script>
        alert('User หรือ Password ไม่ถูกต้อง กรุณาทำรายการใหม่อีกครั้ง!!');
        window.location='login.php';
        </script>";
}

mysqli_close($conn);
?>
