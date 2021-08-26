<?php
require_once ("connection.php");
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
$user=$_SESSION['username'];

$data=file_get_contents("php://input");
$pallete_number=json_decode($data,true);
$pallete_num=(int)$pallete_number;

$sql="SELECT * FROM `pallete` WHERE `username`='$user' AND `pallete no`='$pallete_num'";
$sqlQuery=mysqli_query($con,$sql);
if($sqlQuery->num_rows>0){
    while($row=mysqli_fetch_array($sqlQuery)){
        $colors_data[]=$row['hexcode'];
    }
    echo json_encode($colors_data);
}
else echo json_encode(0);
