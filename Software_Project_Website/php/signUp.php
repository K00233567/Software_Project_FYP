<?php
//Customer signUp
if(isset($_POST['Customer_Submitted'])){
$Name = $_POST['name'];
$CustomerEmail = $_POST['email'];
$Password = $_POST['psw'];
$connect = mysqli_connect('localhost','root','','event_management_system');

mysqli_query($connect,"INSERT INTO customer(nameC,emailC,pinC)VALUES('$Name','$CustomerEmail','$Password')");

if(mysqli_affected_rows($connect) >0){
  echo "Welcome, you have now created an account.";
}
else {
  echo "Sorry, an error has occurred please try again.  <br>";
  echo mysqli_error($connect);
}

}

//Business signUp
if(isset($_POST['Business_Submitted'])){
$BusinessName = $_POST['bname'];
$Btype = $_POST['btype'];
$BEmail = $_POST['bemail'];
$Telephone = $_POST['telephone'];
$StAddress= $_POST['stAddress'];
$Price= $_POST['price'];
$PasswordB= $_POST['bpsw'];

$connect = mysqli_connect('localhost','root','','event_management_system');

mysqli_query($connect,"INSERT INTO business(nameB,type,emailB,telephone,address,price,pinB)VALUES('$BusinessName','$Btype','$BEmail','$Telephone','$StAddress','$Price','$PasswordB')");

if(mysqli_affected_rows($connect) >0){
  echo "Welcome, you have now created an account.";
}
else {
  echo "Sorry, an error has occurred please try again.  <br>";
  echo mysqli_error($connect);
}

}
 ?>
