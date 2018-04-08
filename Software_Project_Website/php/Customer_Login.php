<?php
session_start();
require("../CONFIG/connection.php");

if(isset($_POST['CLogin'])){
$CustomerEmail = $_POST['email'];
$Password = $_POST['psw'];
$passEncrypt = hash('ripemd160', $Password);  //Encrypting password for security

$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database
$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

$checkEmail = "SELECT * FROM customer WHERE emailC = '$CustomerEmail'";
$Emails =  mysqli_query($connection,$checkEmail);

//To check the number of rows returned
$resultCheck = mysqli_num_rows($Emails);

//Checks to see if email already exists.
if($resultCheck  !=1){
  $_SESSION["Login.Error"] = "This is not a registered email address";

  header('Location: ../index.php?login=errornotregistered');
  exit();
}
//Checking if the account is logged in already
$loggedIn = "SELECT LoggedIn FROM customers WHERE emailC = '$CustomerEmail'";
		$isLoggedin = mysqli_query($connection, $loggedIn);
		$row = mysqli_fetch_assoc($isLoggedin);
		$login = $row['LoggedIn'];

		if($login == 1){
			 $_SESSION["Login.Error"] = "This account is already logged in";
			header( 'Location: ../index.php?login=erroralreadyloggedin');
			exit();
		}

//Checking that Email & Password are correct
  else if($row = mysqli_fetch_assoc($Emails)){
    if($CustomerEmail !== $row['emailC'] && $CustomerEmail !== $row['emailC']){
    header('Location: ../index.php?login=wrongcredentials');
    exit();
  }
  else {
    $login = "UPDATE customer SET LoggedIn = 1 WHERE emailC = '$CustomerEmail'";  //updates database to say user is logged in
    mysqli_query($connection,$login);

    $_SESSION['usertype'] = $row['UserType']; //sets session variable for usertype
    $_SESSION['email'] = $row['emailC'];//sets session variable for email
    $_SESSION['Login'] = $row['LoggedIn'];
    header('Location: ../index.php?login=succescredentials');
  }


//Checks whether the logged in usertype is a User or Admin
if($_SESSION['Login']===1){
  if($_SESSION['usertype']==='User'){
    header('Location: ../views/CustomerHome.php');
}
else if($_SESSION['usertype']==='Admin'){
    header('Location: ../admin.php');
      }
    }
  }
}



 ?>
