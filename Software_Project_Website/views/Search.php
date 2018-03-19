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

           <li class ="active"><a href="#" class="home">Home</a></li>
           <li><a href="#Logout" class="Logout">Logout</a></li>
         </ul>
       </div> <!--end of collapse-->

    </nav>

<div class="row">
  <div class="jumbotron">
    <div class="container">
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

<div class="row">
  <div class="col-sm-9">
    <div class="googleMap" id="googleMap">


    </div>
  </div>
</div>



<script src="../JS/jquery.min.js"></script>
<script src="../JS/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBUkohgKOWbDL6w8g3orL7cQsn3gELOb0&callback=myMap"></script>
<script src="../JS/myJS.js"></script>
  </body>
</html>
