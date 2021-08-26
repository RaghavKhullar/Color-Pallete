<?php
require_once ("connection.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
$user=$_SESSION['username'];

$data=file_get_contents("php://input");
$mydata=json_decode($data,true);
$pallete_num=(int)$mydata['pallete'];

$sql="DELETE FROM `pallete` WHERE `username`='$user' AND `pallete no`='$pallete_num'";
$sqlQuery=mysqli_query($con,$sql);

$query = "SELECT * FROM `details` WHERE `username`='$user'";
$fire = mysqli_query($con, $query);
$confirm=mysqli_fetch_array($fire);
$id=$confirm['id'];




for($i=0;$i<sizeof($mydata['array']);$i++){
    $hexcode=$mydata['array'][$i];
$insert = "INSERT INTO pallete (`id`,`username`,`hexcode`,`pallete no`) VALUES ('$id','$user','$hexcode','$pallete_num')";
if($con->query($insert)==true){
        echo `<script>
        alert("data updated");
        </script>`;
    }}
