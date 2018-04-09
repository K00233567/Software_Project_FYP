<?php session_start(); ?>
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
    <nav class="navbar navbar-light bg-light" style="background: linear-gradient(to bottom right, #17202a 0%, #e5e8e8 100%);">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
         <a class="navbar-brand" href="#">NOA</a>
       </div> <!--end of navbar-header-->

       <div class= "collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">

           <li class ="active"><a href="./CustomerHome.php" class="home">Home</a></li>
           <li><a href="#Logout" class="Logout">Logout</a></li>
         </ul>
       </div> <!--end of collapse-->

    </nav>


<section class="SearchPageColour">


<div class="row">

  <div class="jumbotron">
    <div class="Jumbotron_height">
      <h2>Search for a Business.</h2>
  <div class="col-sm-12">
    <div class="SearchBar">
  <form class="SearchBar_SearchPage" action="#action_page.php">
    <input type="text" placeholder="Search for a business type eg. Barber, Hotel, Bakery..." name="search">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
</div>
</div>
  </div>
    </div>
</div><!--END of ROW-->


<!-- Filter panel for map -->

  <div class="row">
    <div class="col-sm-4">
      <div class="Filter_Panel">
        <div id="accordion" class="panel panel-info">
        				<div class="panel-heading">
        					<h3 class="panel-title">Search Filter</h3>
        				</div>
        				<div class="panel-body" >
        					<div class="panel-heading " >
        						<h4 class="panel-title">
        							<a data-toggle="collapse" href="#collapse0">
        								<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Price
        							</a>
        						</h4>
        					</div>
        					<div id="collapse0" class="panel-collapse collapse in" >
        						<ul class="list-group">
        							<li class="list-group-item">
        								<div class="checkbox">
        									<label>
        										<input type="checkbox" value="">
        										€0 - €100
        									</label>
        								</div>
        							</li>
        							<li class="list-group-item">
        								<div class="checkbox" >
        									<label>
        										<input type="checkbox" value="">
        										€100 - €500
        									</label>
        								</div>
        							</li>
        							<li class="list-group-item">
        								<div class="checkbox"  >
        									<label>
        										<input type="checkbox" value="">
        										More Than €1000
        									</label>
        								</div>
        							</li>
        						</ul>
        					</div>

        					<div class="panel-heading " >
        						<h4 class="panel-title">
        							<a data-toggle="collapse" href="#collapse1">
        								<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Distance
        							</a>
        						</h4>
        					</div>
        					<div id="collapse1" class="panel-collapse collapse in" >
        						<ul class="list-group">
        							<li class="list-group-item">
        								<div class="checkbox">
        									<label>
        										<input type="checkbox" value="">
        										25km
        									</label>
        								</div>
        							</li>
        							<li class="list-group-item">
        								<div class="checkbox" >
        									<label>
        										<input type="checkbox" value="">
        										50km
        									</label>
        								</div>
        							</li>
        							<li class="list-group-item">
        								<div class="checkbox"  >
        									<label>
        										<input type="checkbox" value="">
        										100km
        									</label>
        								</div>
        							</li>
        						</ul>
        					</div>
        				</div>
        			</div>
  </div>
</div>


<!--GOOGLE MAP-->
    <div class="col-sm-8">
    <div id="map">
  </div>
</div>
</div>
</section>
<!-- Displaying the businesses on map -->
      <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(52.674798308010125, -8.648500465525103),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;


          // Retrieving nodes from XML file to display on map
          downloadUrl('../php/xmlOutput.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var price = markerElem.getAttribute('price');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));


              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = type
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = price
              infowincontent.appendChild(text);




              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
      </script>

<script src="../JS/jquery.min.js"></script>
<script src="../JS/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCTJAUnNDdnvMhkqtHencorjWQyAJBQz0&callback=initMap"></script>
<script src="../JS/myJS.js"></script>
  </body>
</html>
