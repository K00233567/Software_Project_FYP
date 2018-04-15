<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Info Window Simple</title>
<link rel="stylesheet" href="./CSS/bootstrap.min.css">
<link rel="stylesheet" href="./CSS/jquery-ui.min.css">
<link rel="stylesheet" href="./CSS/Style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>
<body>
  <div id="map">

  </div>

<!--
<div id="datepicker"></div> -->

<script>
$( "#datepicker" ).datepicker();
</script>

  <script>

    function initMap() {
      var myLatlng = new google.maps.LatLng(52.674419,-8.648215
);
      var myOptions = {
        zoom: 4,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }


      var map = new google.maps.Map(document.getElementById("map"), myOptions);
      var contentButton = '<div <button type="button" data-toggle="modal" class="btn btn-primary" href="#cSign-up-Modal">Book</button></div>';
      var contentString = '<div id="datepicker"><form id="" onsubmit="" action="" method="post"></form></div>';

      var infowindow = new google.maps.InfoWindow({
          content: contentButton


      });

      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,

      });
      google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
      });


      google.maps.event.addListener(infowindow, 'domready', function() {
          $('#datepicker').datepicker();
      });
    }
      </script>

      <!--CUSTOMER SIGN UP MODAL-->
      <div id="cSign-up-Modal" class="modal fade">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Customer Sign-Up</h4>
              </div>
              <div class="modal-body">
        <form class="form" id= 'csignup'action="<?php echo 'php/signUp.php';?>" method="post">

          <div class="form-group">
            <label for="name" class="pull-left"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>
          </div>

          <div class="form-group">
            <label for="email" class="pull-left"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
          </div>

            <div class="form-group">
            <label for="psw" class="pull-left"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id= 'CPassword'  name="psw" required  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters">
          </div>

          <div class="form-group">
           <label for="bpsw" class="pull-left"><b>Confirm Password</b></label>
           <input required type="password" placeholder="Confirm Password"  id='CpasswordConfirm' class="form-control">
         </div>



          <button class="btn btn-primary btn-lg" name ="Customer_Submitted">Sign-Up</button>
          <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg">Cancel</button>
          </div>
        </form>
      </div> <!--End of modal-->
      </div>
      </div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCTJAUnNDdnvMhkqtHencorjWQyAJBQz0&callback=initMap"></script>
  <script src="./JS/jquery.min.js"></script>
  <script src="./JS/jquery-ui.min.js"></script>
  <script src="./JS/bootstrap.min.js"></script>
  <script src="./JS/myJS.js"></script>
</body>
</html>
