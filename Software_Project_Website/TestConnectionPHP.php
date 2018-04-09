<?php

    $name = $_GET['name'];
    $address = $_GET['address'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $type = $_GET['type'];
    $connect = mysqli_connect('localhost','root','','event_management_system');


    // Inserts new row with place data.
// UPDATE business SET address= '$address',type= '$type',lat='$lat',lng= '$lng'  WHERE emailB = 'Nathan@gmail.com'");
    mysqli_query($connect,"UPDATE business SET address= '$address',type= '$type',lat='$lat',lng= '$lng'  WHERE emailB = 'Nathan@gmail.com'");

    if(mysqli_affected_rows($connect) >0){
      echo "You have just updated your details.";
    }
    else {
      echo "Sorry, an error has occurred please try again.  <br>";
      echo mysqli_error($connect);
    }




 ?>
