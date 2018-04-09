<?php
session_start();
require("../CONFIG/connection.php");

if(isset($_POST['BLogin'])){
$BusinessEmail = $_POST['bemail'];
$BPassword = $_POST['bpsw'];
$passEncrypt = hash('ripemd160', $Password);  //Encrypting password for security

$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database
$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

$userRow = "SELECT * FROM business WHERE emailB = '$BusinessEmail'";
$userDetails =  mysqli_query($connection,$userRow);

//To check the number of rows returned
$resultCheck = mysqli_num_rows($userDetails);

//Checks to see if email already exists.
if($resultCheck  !=1){
  $_SESSION["Login.Error"] = "This is not a registered email address";

  header('Location: ../index.php?login=error');
  exit();
}

//Checking if the account is logged in already
$loggedIn = "SELECT LoggedIn FROM business WHERE emailB = '$BusinessEmail'";
		$isLoggedin = mysqli_query($connection, $loggedIn);
		$row = mysqli_fetch_assoc($isLoggedin);
		$login = $row['LoggedIn'];

		if($login == 1){
			 $_SESSION["Login.Error"] = "This account is already logged in";
			 header( 'Location: ../index.php?login=erroralreadyloggedin');
			exit();
		}

  else if($row = mysqli_fetch_assoc($userDetails)){
    if($BusinessEmail !== $row['emailB'] && $passEncrypt !== $row['pinB']){
    header('Location: ../index.php?login=wrongcredentials');
    exit();
  }
  else {
    $login = "CALL business_logged_in('$BusinessEmail')";  //updates database to say user is logged in
    mysqli_query($connection,$login);

    $_SESSION['usertype'] = $row['Usertype']; //sets session variable for usertype
    $_SESSION['email'] = $row['emailB'];//sets session variable for email
    $_SESSION['Login'] = $row['LoggedIn'];//sets session variable for login
    $_SESSION['name'] = $row['nameB'];
    header('Location: ../index.php?login=succescredentials');
  }

//Checks whether the logged in usertype is a User or Admin

if($_SESSION['usertype']==='User'){
    header('Location: ../views/BusinessHome.php');
}
else if($_SESSION['usertype']==='Admin'){
    header('Location: ../admin.php');
      }
  }
}

 ?>
