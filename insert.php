<?php


require_once 'connection.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
$user = $_SESSION['username'];
$query = "SELECT * FROM `details` WHERE `username`='$user'";
$fire = mysqli_query($con, $query);
$confirm = mysqli_fetch_array($fire);
$id = $confirm['id'];
$count = $confirm['count_pallete'];
++$count;
$update = "UPDATE `color_pallete`.`details` SET `count_pallete`='$count' where `username`='$user'";
if ($con->query($update) == true) {
    echo `<script>
    alert("data updated");
    </script>`;
}

$data = file_get_contents("php://input");
$mydata = json_decode($data, true);


for ($i = 0; $i < sizeof($mydata); $i++) {
    $hexcode = $mydata[$i];
    $insert = "INSERT INTO pallete (`id`,`username`,`hexcode`,`pallete no`) VALUES ('$id','$user','$hexcode','$count')";
    if ($con->query($insert) == true) {
        echo `<script>
        alert("data updated");
        </script>`;
    }
}
