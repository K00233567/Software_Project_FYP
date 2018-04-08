<?php
session_start();
 require("../CONFIG/connection.php");
 $CustomerEmail = $_SESSION['email'];

 $connection=mysqli_connect ('localhost', $username, $password);
 if (!$connection) {  die('Not connected : ' . mysql_error());}

 // Set the active MySQL database
 $db_selected = mysqli_select_db( $connection,$database);
 if (!$db_selected) {
 die ('Can\'t use db : ' . mysqli_error($connection));
 }

 $userRow = "UPDATE customer SET LoggedIn = 0 WHERE emailC = '$CustomerEmail'";
 $Logout =  mysqli_query($connection,$userRow);

 session_unset();
 session_destroy();
 header('Location: ../index.php');




?>
