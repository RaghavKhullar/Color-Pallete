<?php
require_once("connection.php");
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



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="style.css">
    <title>View Palletes</title>
</head>

<body>
    <div class="navbar" id="navbarTop" style="display:flex;">
        <button class="buttons" id="new" onclick="location.href='index.php'">New Pallete</button>
        <button class="buttons" class='logout' id="logout1" onclick="location.href='logout.php'">Logout</button>
    </div>
    <table class="table" id="table">
        <?php
        echo "<h2 id='heading'>EXISTING PALLETES</h2>";

        $c = 1;
        echo "<tr>";

        echo "<th> PALLETE NO.</th>";
        echo "<th> ACTION</th>";
        echo "<tr/>";
        while ($c <= $count) {
            echo "<tr>";

            echo "<td> $c</td>";

            echo "<td><button class='view' onclick='view_pallete($c)'>VIEW</button></td>";
            $i = 0;

            echo "<tr/>";

            $c++;
        }



        ?>
    </table>

    <div class="navbar" id="navbar" style="display:none;">

        <button class="buttons" id="add">Add Color</button>
        <button class="buttons" id="save" onclick="save_data()">Save Changes</button>
        <button class="buttons" id="back" onclick="location.href='view.php'">Hide Pallete</button>
        <button class="buttons" id="logout2" onclick="location.href='logout.php'">Logout</button>
    </div>

    <div class="big_div">
        <div class="container" id="collection">

        </div>
        <script src="view.js"></script>
</body>

</html>