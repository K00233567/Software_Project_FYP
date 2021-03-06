<?php
session_start();
include("../CONFIG/connection.php");
// CHECKS THAT USER IS LOGGED IN BEFORE ENTRY
if($_SESSION['Login']===null){
  header('Location: ../index.php');
}
//Setting Session Variables
$BusinessEmail = $_SESSION['email'];
$ID =$_SESSION['ID'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Style.css">
    <title>App</title>
  </head>
  <body>
    <nav  class="navbar navbar-default" id="navbarMargin" style="background: linear-gradient(-180deg, #BCC5CE 0%, #929EAD 98%), radial-gradient(at top left, rgba(255,255,255,0.30) 0%, rgba(0,0,0,0.30) 100%);">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <a id="LogoStyle" class="navbar-brand" href="#">EventPrice</a>
         <ul class="nav navbar-nav">
             <li href="#" class="Name">Hello <?php echo $_SESSION['name']; ?> </li>
         </ul>
       </div> <!--end of navbar-header-->

       <div class= "collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">

           <li class ="active"><a href="#" class="home">Home</a></li>
           <li><a href="../php/Business_signout.php" class="Logout">Logout</a></li>
         </ul>
       </div> <!--end of collapse-->
    </nav>
<section id="BusinessHomeColour">


    <!-- Search Box -->
<input id="pac-input" class="controls" type="text" placeholder="Search Location">


<!-- <form class="" action="" method="post"> -->
  <div id="form">
    <form class="" >
    <table>
    <tr><td>Address:</td><td><input type='text' id='address' autofocus required> </td> </tr>
    <tr><td>Telephone:</td><td><input type='text' id='telephone' required> </td> </tr>
    <tr><td>Type:</td> <td><select id='type'> +
               <option value='Bar' SELECTED>Bar</option>
               <option value='Restaurant'>Restaurant</option>
                <option value='Hotel'>Hotel</option>
                 <option value='Hairdresser'>Hairdresser</option>
                  <option value='Florist'>Florist</option>
                   <option value='Musician'>Musician</option>
                    <option value='Car rental'>Car rental</option>
                     <option value='Photographer'>Photographer</option>
                      <option value='Videographer'>Videographer</option>
                       <option value='Dress shop'>Dress shop</option>
                        <option value='Suit shop'>Suit shop</option>
                         <option value='Makeup artist'>Makeup artist</option>
               </select> </td></tr>
               <tr><td>Price estimate:</td><td><input type='text' id='price' required> </td> </tr>
               <tr><td></td><td><input class="btn btn-primary" type="button"  value='Save' onclick='ajax_post()'  required></td></tr>
    </table>
      </form>
  </div>
  <!-- </form> -->

<!-- Map to enter business details into database -->
<div class="row">
<div class="col-sm-8">
    <div id="map" ></div>
  </div>

<div class="col-sm-4" id="businessDetailsPanel">
  <div class="panel panel-default">
    <div class="businessDetailsPanelColour">
    <div class="panel-heading">
        <h2 class="display-1"style="text-align:center;">These are your current details & Bookings.</h2>
    </div>
  </div>
    <div class="panel-body">
      <?php

    $connection=mysqli_connect ('localhost', $username, $password);
    if (!$connection) {  die('Not connected : ' . mysql_error());}

    // Set the active MySQL database
    $db_selected = mysqli_select_db( $connection,$database);
    if (!$db_selected) {
    die ('Can\'t use db : ' . mysqli_error($connection));
    }

    $sql = "SELECT address, telephone, type, price
            FROM business
            WHERE emailB= '$BusinessEmail';";

            $result = mysqli_query($connection,$sql);
            if (!$result) {
            die('Invalid query: ' . mysqli_error($connection));
            }

            // Creating table for business details
         echo '<table class="table table-bordered">';
         echo '<tr><th>Address</th><th>Telephone</th><th>type</th><th>Price €</th></tr>';

         while ($row = mysqli_fetch_assoc($result)) { //fetch associative array from result
           $address= $row['address'];
           $telephone= $row['telephone'];
           $type= $row['type'];
           $price= $row['price'];

           // Displaying the values for the table
           echo "<tr>
       <td>$address</td>
       <td>$telephone</td>
       <td>$type</td>
       <td>$price</td>
       ";
     }

     $booking = "SELECT nameC,date,emailC FROM booking INNER JOIN customer ON customerID=idCustomer WHERE idBusiness= '$ID'";

             $result = mysqli_query($connection,$booking);
             if (!$result) {
             die('Invalid query: ' . mysqli_error($connection));
             }

             // Creating table of bookings to display in panel
          echo '<table class="table table-bordered">';
          echo '<tr><th>Customer Name</th><th>Customer Email</th><th>Date</th></tr>';

          while ($row = mysqli_fetch_assoc($result)) { //fetch associative array from result
            $name= $row['nameC'];
            $date= $row['date'];
            $email=$row['emailC'];


            // Displaying the values for the table
            echo "<tr>
        <td>$name</td>
        <td>$email</td>
        <td>$date</td>
      ";
      }
  echo '</table>'
      ?>

        </div>
      </div>
    </div>
  </div>
  </section>


      <script>
        var map;
        var marker;
        var infowindow;
        var messagewindow;

        function initAutocomplete() {
          var Limerick = {lat: 52.674798308010125, lng: -8.648500465525103};
          map = new google.maps.Map(document.getElementById('map'), {
            center: Limerick,
            zoom: 7
          });

          infowindow = new google.maps.InfoWindow({
            content: document.getElementById('form')
          });

          messagewindow = new google.maps.InfoWindow({
            content: document.getElementById('message')
          });

          google.maps.event.addListener(map, 'click', function(event) {
            marker = new google.maps.Marker({
              position: event.latLng,
              map: map

            });
            markers.forEach(function(marker) {
              marker.setMap(null);
            });

            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map, marker);
              document.getElementById('form').style.display = "block";
              var latitude = this.position.lat();
              var longitude = this.position.lng();
            });
          });




    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        markers.push(new google.maps.Marker({
          map: map,
          icon: icon,
          title: place.name,
          position: place.geometry.location
        }));

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
    });
}


    function ajax_post() {
      // Create our XMLHttpRequest object
  var hr = new XMLHttpRequest();

   // Creating variables to send to php file
  var address = escape(document.getElementById('address').value);
  var type = document.getElementById('type').value;
  var latlng = marker.getPosition();
  var telephone = document.getElementById('telephone').value;
  var price = document.getElementById('price').value;
  var url = '../php/business_details.php';
  var vars= 'address=' + address  + '&lat=' + latlng.lat() + '&lng=' + latlng.lng() +
           '&type=' + type + '&telephone=' + telephone + '&price=' + price;

  hr.open("POST", url, true);
  // Set content type header information for sending url encoded variables in the request
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


  // Access the onreadystatechange event for the XMLHttpRequest object
  hr.onreadystatechange = function() {
  if(hr.readyState == 4 && hr.status == 200) {
  var return_data = hr.responseText;
  }
  };

  // Send the data to PHP now... and wait for response to update the status div
  hr.send(vars); // Actually execute the request
    infowindow.close();
    alert("Details Updated!");
    window.open('../views/BusinessHome.php','_self'); //RELOAD PAGE AFTER SUBMITTING DATA
  }

  </script>


      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCTJAUnNDdnvMhkqtHencorjWQyAJBQz0&libraries=places&callback=initAutocomplete"
           async defer></script>

           <!-- Footer -->
           <footer class="text-center" id="Footer">
           </a><br>
           <h3>NOA</h3>
           <h5>Copyright of Keith Murphy</h5>
           </footer>



<script src="../JS/jquery.min.js"></script>
<script src="../JS/bootstrap.min.js"></script>
<script src="../JS/myJS.js"></script>
  </body>
</html>
