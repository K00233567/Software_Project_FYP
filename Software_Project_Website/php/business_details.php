<?php
session_start();
require("../CONFIG/connection.php");
$BusinessEmail= $_SESSION['email'];

$address = $_POST['address'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];
$telephone = $_POST['telephone'];
$price = $_POST['price'];
$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database
$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}


    // Inserts new row with place data.

  $userDetails=  mysqli_query($connection,"UPDATE business SET address= '$address',type= '$type',lat='$lat',lng= '$lng',price='$price',telephone='$telephone'  WHERE emailB = '$BusinessEmail'");
      mysqli_query($connection,$userDetails);




 ?>
