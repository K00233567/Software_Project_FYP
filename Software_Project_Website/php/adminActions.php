<?php
require("../CONFIG/connection.php");

//CONNECTING TO DATABASE
$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database
$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

//UPDATING THE CUSTOMER DETAILS
if(isset($_POST['Customer_editted'])){
$id=$_POST['id'];
$name= $_POST['name'];
$email=$_POST['email'];
$LoggedIn=$_POST['LoggedIn'];


//UPDATE STATEMENT TO CUSTOMER TABLE
$sql= "UPDATE customer SET nameC= '$name',emailC='$email',LoggedIn='$LoggedIn' WHERE customerID = '$id'";
 $result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/Admin.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA

}


//DELETING CUSTOMER
if(isset($_POST['delete'])){
  $id=$_POST['delete_id'];


$sql= "DELETE FROM `customer` WHERE customerID= '$id'";
$result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/Admin.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA
}




//UPDATING BUSINESS DETAILS
if(isset($_POST['Business_editted'])){
$id=$_POST['id'];
$name= $_POST['name'];
$email=$_POST['email'];
$LoggedIn=$_POST['LoggedIn'];


//UPDATE STATEMENT TO BUSINESS TABLE
$sql= "UPDATE business SET nameB= '$name',emailB='$email',LoggedIn='$LoggedIn' WHERE businessID = '$id'";
 $result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/AdminAction_Business_Users.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA

}

//DELETING CUSTOMER
if(isset($_POST['Bdelete'])){
  $id=$_POST['Bdelete_id'];


$sql= "DELETE FROM `business` WHERE businessID= '$id'";
$result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/AdminAction_Business_Users.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA
}





//UPDATING ADMIN DETAILS
if(isset($_POST['Admin_editted'])){
$id=$_POST['id'];
$name= $_POST['name'];
$email=$_POST['email'];
$LoggedIn=$_POST['LoggedIn'];


//UPDATE STATEMENT TO ADMIN TABLE
$sql= "UPDATE admin SET name= '$name',emailA='$email',LoggedIn='$LoggedIn' WHERE idAdmin = '$id'";
 $result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/AdminAction_Admin_Users.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA

}

//DELETING ADMIN
if(isset($_POST['Adelete'])){
  $id=$_POST['Adelete_id'];
  $LoggedIn= $_POST['LoggedIn_check'];
  if($LoggedIn == 1){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Cannot delete, Admin is logged in');
    window.location.href='../views/AdminAction_Admin_Users.php';
    </script>");
    exit();
  }
  else{

$sql= "DELETE FROM `admin` WHERE idAdmin= '$id'";
$result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/AdminAction_Admin_Users.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA
}
 }


//ADD NEW Admin
if(isset($_POST['Admin_Added'])){
  $name= $_POST['name'];
  $email=$_POST['emailA'];
  $password=$_POST['Apsw'];
  $passEncrypt= hash('ripemd160', $password);//Encrypting password for security
  $UserType = 'Admin';

  $register = "CALL register_admin('$name','$email','$passEncrypt','$UserType')";

  $result = mysqli_query($connection,$register);
  if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
  }else{

  header('Location: ../views/AdminAction_Admin_Users.php');
    }
}

 ?>
