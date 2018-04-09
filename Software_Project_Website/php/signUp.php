<?php
session_start();
require("../CONFIG/connection.php");


//CUSTOMER SIGN-UP
if(isset($_POST['Customer_Submitted'])){
$Name = $_POST['name'];
$CustomerEmail =$_POST['email'];
$Password = $_POST['psw'];
$passEncrypt = hash('ripemd160', $Password);  //Encrypting password for security
$UserType = 'User';


$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database
$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

//Inserting Customer details into database
$register= "CALL register_customer('$Name','$CustomerEmail','$passEncrypt','$UserType')";

$result = mysqli_query($connection,$register);
if (!$result) {
die('Invalid query: ' . mysqli_error($connection));
}else{

header('Location: ../index.php?signup=success');
}
}



//BUSINESS SIGN-UP
if(isset($_POST['Business_Submitted'])){
$BusinessName =$_POST['bname'];
$BEmail = $_POST['bemail'];
$PasswordB= $_POST['bpsw']  ;
$BpassEncrypt = hash('ripemd160', $PasswordB);//Encrypting password for security
$UserType = 'User';

$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

//Inserting Business details into database
$register = "CALL register_business('$BusinessName','$BEmail','$BpassEncrypt','$UserType')";

$result = mysqli_query($connection,$register);
if (!$result) {
die('Invalid query: ' . mysqli_error($connection));
}else{

header('Location: ../index.php');
  }
}
 ?>
