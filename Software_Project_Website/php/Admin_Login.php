<?php
session_start();
require("../CONFIG/connection.php");

// CHECKS THAT USER IS LOGGED IN BEFORE ENTRY
if($_SESSION['Login']===null){
  header('Location: ../index.php');
}

if(isset($_POST['ALogin'])){
$AdminEmail = $_POST['Aemail'];
$Password = $_POST['Apsw'];
$passEncrypt = hash('ripemd160', $Password);  //Encrypting password for security

$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database
$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

$userRow = "SELECT * FROM admin WHERE emailA = '$AdminEmail'";
$userDetails =  mysqli_query($connection,$userRow);

//To check the number of rows returned
$resultCheck = mysqli_num_rows($userDetails);

//Checks to see if email exists.
if($resultCheck  !=1){
  $_SESSION["Login.Error"] = "This is not a registered email address";

  header('Location: ../index.php?login=errornotregistered');
  exit();
}

//Checking if the account is logged in already
$loggedIn = "SELECT LoggedIn FROM admin WHERE emailA = '$AdminEmail'";
		$isLoggedin = mysqli_query($connection, $loggedIn);
		$row = mysqli_fetch_assoc($isLoggedin);
		$login = $row['LoggedIn'];


		if($login == 1){
			 $_SESSION["Login.Error"] = "This account is already logged in";
			 header( 'Location: ../index.php?login=erroralreadyloggedin');
			exit();
		}

//Checking that Email & Password are correct
  else if($row = mysqli_fetch_assoc($userDetails)){
    if($AdminEmail !== $row['emailA'] && $passEncrypt !== $row['pinA']){
    header('Location: ../index.php?login=wrongcredentials');
    exit();
  }
  else {
    $login = "CALL admin_logged_in('$AdminEmail')";  //updates database to say user is logged in
    mysqli_query($connection,$login);

    $_SESSION['name'] = $row['name'];
    $_SESSION['usertype'] = $row['UserType']; //sets session variable for usertype
    $_SESSION['email'] = $row['emailA'];//sets session variable for email
    $_SESSION['Login'] = $row['LoggedIn']; //sets session variable for login
    header('Location: ../index.php?login=succescredentials');
  }


//Checks whether the logged in usertype is a User or Admin

  if($_SESSION['usertype']==='User'){
    header('Location: ../views/CustomerHome.php');
}
else if($_SESSION['usertype']==='Admin'){
    header('Location: ../views/Admin.php');
      }
  }
}



 ?>
