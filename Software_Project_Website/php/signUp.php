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
$query = "INSERT INTO customer(nameC,emailC,pinC,UserType)VALUES('$Name','$CustomerEmail','$passEncrypt','$UserType')";

$result = mysqli_query($connection,$query);
if (!$result) {
die('Invalid query: ' . mysqli_error($connection));
}

header('Location: ../index.php?signup=success');
}



//BUSINESS SIGN-UP
if(isset($_POST['Business_Submitted'])){
$BusinessName =$_POST['bname'];
$BEmail = $_POST['bemail'];
$PasswordB= $_POST['bpsw']  ;
$BpassEncrypt = hash('ripemd160', $PasswordB);
$UserType = 'User';

$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

//Inserting Business details into database
$query = "INSERT INTO business(nameB,emailB,pinB,Usertype)VALUES('$BusinessName','$BEmail','$BpassEncrypt','$UserType')"; //Encrypting password for security

$result = mysqli_query($connection,$query);
if (!$result) {
die('Invalid query: ' . mysqli_error($connection));
}

header('Location: ../index.php');

}
 ?>
