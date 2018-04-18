<?php
session_start();
require("../CONFIG/connection.php");
$customerID = $_SESSION['ID'];

//Business Booking
if(isset($_POST['Book'])){
$Name = $_POST['name'];
$Date =$_POST['date'];


$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database
$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

$sql = "SELECT * FROM business WHERE nameB = '$Name'";

        $result = mysqli_query($connection,$sql);
        if (!$result) {
        die('Invalid query: ' . mysqli_error($connection));
        }

     while ($row = mysqli_fetch_assoc($result)) { //fetch associative array from result
       $businessID= $row['businessID'];



//
// $sql = "SELECT 'business.nameB', 'booking.date', 'business.telephone','business.price' FROM booking INNER JOIN business ON 'business.businessID' = 'booking.idBusiness'";
// }




//Cecking if the date entered is a past date
if(strtotime($Date)<strtotime("today")){

  echo "<SCRIPT type='text/javascript'> //not showing me this
        alert('Sorry, you cannnot pick a past date!');
        window.location.replace('../views/Search.php');
    </SCRIPT>";
    exit();
}
else{
  //Inserting Booking details into database
$Book = "INSERT INTO booking(date,idCustomer,idBusiness) VALUES ('$Date','$customerID','$businessID')";
// $Book= "CALL booking_business('$Date','$customerID','$businessID')";
$result = mysqli_query($connection,$Book);
if (!$result) {
die('Invalid query: ' . mysqli_error($connection));
}else{
header('Location: ../views/Search.php');
echo '<script language="javascript">';
echo 'alert("The business has been booked!")';
echo '</script>';

    }
  }
}
}

?>
