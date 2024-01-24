<?php
require_once "./config/db.php";
header('Content-type: application/json');
$request = $_POST['username'];

$query = mysqli_query($con,"SELECT * FROM users WHERE username ='$request'");
$result = mysqli_num_rows($query);
if ($result == 0){
$valid = 'true';}
else{
$valid = 'false';
}
echo $valid;
?>