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
$sql= "Call AdminAction_CustomerUpdate('$name','$email','$LoggedIn','$id')";
 $result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/Admin.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA

}


//DELETING CUSTOMER
if(isset($_POST['delete'])){
  $id=$_POST['Bdelete_id'];



$sql= "CALL delete_Customer('$id')";
$result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/Admin.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//UPDATING BUSINESS DETAILS
if(isset($_POST['Business_editted'])){
$id=$_POST['id'];
$name= $_POST['name'];
$email=$_POST['email'];
$LoggedIn=$_POST['LoggedIn'];


//UPDATE STATEMENT TO BUSINESS TABLE
$sql="CALL adminAction_BusinessUpdate('$name','$email','$LoggedIn','$id')";
 $result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/AdminAction_Business_Users.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA

}

//DELETING BUSINESS
if(isset($_POST['Bdelete'])){
  $id=$_POST['Bdelete_id'];


// $sql= "DELETE FROM `business` WHERE businessID= '$id'";
$sql= "CALL delete_Business('$id')";
$result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/AdminAction_Business_Users.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//UPDATING ADMIN DETAILS
if(isset($_POST['Admin_editted'])){
$id=$_POST['id'];
$name= $_POST['name'];
$email=$_POST['email'];
$LoggedIn=$_POST['LoggedIn'];


//UPDATE STATEMENT TO ADMIN TABLE
$sql= "CALL adminAction_AdminUpdate('$name','$email','$LoggedIn','$id')";
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


$sql="CALL delete_Admin('$id')";
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




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//UPDATING BOOKING DETAILS
if(isset($_POST['Booking_editted'])){
$id=$_POST['id'];
$date= $_POST['date'];
$idCustomer=$_POST['idCustomer'];
$idBusiness=$_POST['idBusiness'];


//Cecking if the date entered is a past date
if(strtotime($date)<strtotime("today")){

  echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Sorry, you cannnot pick a past date!');
        window.location.replace('../views/AdminAction_Bookings.php');
    </SCRIPT>";
    exit();
} else{

//UPDATE STATEMENT TO BOOKING TABLE
$sql= "UPDATE booking SET date= '$date' WHERE bookingID = '$id'";
 $result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/AdminAction_Bookings.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA

  }
}

//DELETING a Booking
if(isset($_POST['Booking_Delete'])){
  $id=$_POST['BookingID'];

$sql= "DELETE FROM `booking` WHERE bookingID= '$id'";
$result=mysqli_query($connection,$sql);
 echo "<script>window.open('../views/AdminAction_bookings.php','_self') </script>"; //RELOAD PAGE AFTER SUBMITTING DATA
}




//ADDING a Booking
if(isset($_POST['Book'])){
$Date =$_POST['date'];
$idCustomer =$_POST['customerID'];
$idBusiness=$_POST['BusinessID'];

//Cecking if the date entered is a past date
if(strtotime($Date)<strtotime("today")){

  echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Sorry, you cannnot pick a past date!');
        window.location.replace('../views/AdminAction_Bookings.php');
    </SCRIPT>";
    exit();
} else{

//Inserting booking details into booking table
$Book = "INSERT INTO booking(date,idCustomer,idBusiness) VALUES ('$Date','$idCustomer','$idBusiness')";

$result = mysqli_query($connection,$Book);
if (!$result) {
die('Invalid query: ' . mysqli_error($connection));
}else{
  echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Booking has been added!');
        window.location.replace('../views/AdminAction_Bookings.php');
    </SCRIPT>";    }
  }
}
 ?>
