<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "patong_2023";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    $sql = "SELECT * FROM service WHERE sv_name='$name'";
    $result_s = $conn->query($sql);

    if ($result_s->num_rows > 0) {
        while($row = $result_s->fetch_assoc()) {
            $sv_id = $row["sv_id"];
            header("Location: serviceitem.php?id=$sv_id");
            exit();
        }
    } else {
        echo "No results found";
    }

    $sql = "SELECT * FROM clinic WHERE cn_name='$name'";
    $result_c = $conn->query($sql);

    if ($result_c->num_rows > 0) {
        while($row = $result_c->fetch_assoc()) {
            $cn_id = $row["cn_id"];
            header("Location: cliniclist.php?id=$cn_id");
            exit();
        }
    } else {
        echo "No results found";
    }

    $sql = "SELECT * FROM support WHERE sp_name='$name'";
    $result_c = $conn->query($sql);

    if ($result_c->num_rows > 0) {
        while($row = $result_c->fetch_assoc()) {
            $sp_id = $row["sp_id"];
            header("Location: support-details.php?id=$sp_id");
            exit();
        }
    } else {
        echo "No results found";
    }

    $sql = "SELECT * FROM activity WHERE atv_name='$name'";
    $result_c = $conn->query($sql);

    if ($result_c->num_rows > 0) {
        while($row = $result_c->fetch_assoc()) {
            $atv_id = $row["atv_id"];
            header("Location: activity.php?id=$atv_id");
            exit();
        }
    } else {
        echo "No results found";
    }

    $sql = "SELECT * FROM news_pag WHERE np_name='$name'";
    $result_c = $conn->query($sql);

    if ($result_c->num_rows > 0) {
        while($row = $result_c->fetch_assoc()) {
            $np_id = $row["np_id"];
            header("Location: news-pag.php?id=$np_id");
            exit();
        }
    } else {
        echo "No results found";
    }
}

// ถ้าไม่ได้เข้าสู่ส่วน POST ให้ปิดการเชื่อมต่อและออก
mysqli_close($conn);
?>