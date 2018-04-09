<?php
session_start();
if($_SESSION['Login']===1){
if($_SESSION['usertype']==='User'){
    header('Location: ../views/BusinessHome.php');
}
else if($_SESSION['usertype']==='Admin'){
    header('Location: ../admin.php');
      }
    }

$BusinessEmail = $_SESSION['email'];
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
    <nav class="navbar navbar-light bg-light" id="navbarMargin" style="background: linear-gradient(to bottom right, #17202a 0%, #e5e8e8 100%);">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
         <a class="navbar-brand" href="#">NOA |</a>
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


<!-- Map to enter business details into database -->
    <div id="map" height="460px" width="100%"></div>
    <form class="" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
      <div id="form">
        <table>
        <tr><td>Address:</td><td><input type='text' id='address'/> </td> </tr>
        <tr><td>Telephone:</td><td><input type='text' id='telephone'/> </td> </tr>
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
                   <tr><td>Price estimate:</td><td><input type='text' id='price'/> </td> </tr>
                   <tr><td></td><td><input class="btn btn-primary" type='button' value='Save' name = 'map_details'  /></td></tr>
        </table>
      </div>
      </form>

      <script>
        var map;
        var marker;
        var infowindow;
        var messagewindow;

        function initMap() {
          var Limerick = {lat: 52.674798308010125, lng: -8.648500465525103};
          map = new google.maps.Map(document.getElementById('map'), {
            center: Limerick,
            zoom: 13
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

            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map, marker);
              var latitude = this.position.lat();
              var longitude = this.position.lng();
              alert(this.position);
            });
          });
        }

        function saveData() {
     var name = escape(document.getElementById('name').value);
     var address = escape(document.getElementById('address').value);
     var type = document.getElementById('type').value;
     var latlng = marker.getPosition();
     var url = 'phpsqlinfo_addrow.php?name=' + name + '&address=' + address +
               '&type=' + type + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

     downloadUrl(url, function(data, responseCode) {

       if (responseCode == 200 && data.length <= 1) {
         infowindow.close();
         messagewindow.open(map, marker);
       }
     });
    }

    function downloadUrl(url, callback) {
     var request = window.ActiveXObject ?
         new ActiveXObject('Microsoft.XMLHTTP') :
         new XMLHttpRequest;

     request.onreadystatechange = function() {
       if (request.readyState == 4) {
         request.onreadystatechange = doNothing;
         callback(request.responseText, request.status);
       }
     };

     request.open('GET', url, true);
     request.send(null);
    }

    function doNothing () {
    }



      </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCTJAUnNDdnvMhkqtHencorjWQyAJBQz0&callback=initMap">
    </script>


    <?php



    if(isset($_POST['map_details'])){
    $address = $_GET['address'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    $type = $_GET['type'];
    $telephone = $_GET['telephone'];
    $price = $_GET['price'];
    $connect = mysqli_connect('localhost','root','','event_management_system');


    // Inserts new row with place data.
    mysqli_query($connect,"UPDATE business SET address= '$address',type= '$type', telephone= '$telephone', price = '$price'  WHERE emailB = '$BusinessEmail'");

    if(mysqli_affected_rows($connect) >0){
    echo "Welcome, you have now created an account.";
    }
    else {
    echo "Sorry, an error has occurred please try again.  <br>";
    echo mysqli_error($connect);
    }

    }
    ?>

<script src="../JS/jquery.min.js"></script>
<script src="../JS/bootstrap.min.js"></script>
<script src="../JS/myJS.js"></script>
  </body>
</html>
