<?php
session_start();
if($_SESSION['Login']===1){
  if($_SESSION['usertype']==='User'){
    header('Location: ../views/CustomerHome.php');
}
else if($_SESSION['usertype']==='Admin'){
    header('Location: ../admin.php');
      }
    }
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
    <nav class="navbar navbar-light bg-light" style="background: linear-gradient(to bottom right, #17202a 0%, #e5e8e8 100%);">
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
           <li><a href="../php/Customer_signout.php" class="Logout">Logout</a></li>
         </ul>
       </div> <!--end of collapse-->

    </nav>

<div class="row">
  <div class="col-sm-12">
  <div class="jumbotron">
    <div class="container">
      <h1>Planning an event?</h1>
      <p>Throw the perfect event. Find the right business near you.</p>

    <!-- Search Bar Form -->
        <form class="BusinessSearch" action="./Search.php">
          <input type="text" placeholder="Search for a business type eg. Barber, Hotel, Bakery..." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div><!--END of CONTAINER-->
    </div><!--END of JUMBOTRON -->
  </div><!--END of COL-->
</div><!--END of ROW-->

<div class="row">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-body" id=CategoryPanel>
        <h1 class="Categories">Event Categories</h1>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-3">
    <div class="thumbnail">
      <div class="imageEffect">
      <a href="Wedding.php">
      <img src="../Images/weddingCategory.jpeg" alt="Image of midsection of woman making heartshape with hands" style="width:100%;">
      </a>
      </div>
      <div class="wrapper">
        <div class="weddingColour">
          <div class="caption post-content">


                  <h3>Wedding</h3>
                  <p>This Category will help you find businesses relative to planning a wedding.</p>
                   <p><a href="Wedding.php" class="btn btn-default btn-lg" role="button">Explore</a>
                 </div>
              </div>
          </div>
      </div>
  </div>


  <div class="col-sm-3">
    <div class="thumbnail">
      <div class="imageEffect">
      <a href="Birthday.php">
      <img src="../Images/BirthdayCategory.jpeg" alt="Image of cupcakes with candles" style="width:100%;">
    </a>
  </div>
      <div class="wrapper">
        <div class="birthdayColour">
      <div class="caption post-content">

                  <h3>Birthdays</h3>
                  <p>This Category will help you find businesses relative to planning a Birthday Party.</p>
                   <p><a href="Birthday.php" class="btn btn-default btn-lg" role="button">Explore</a>
              </div>
            </div>
          </div>
      </div>
  </div>


  <div class="col-sm-3">
    <div class="thumbnail">
      <div class="imageEffect">
      <a href="Bacholar.php">
      <img src="../Images/BacholarPartyCategory.jpeg" alt="Image of a bottle lying flat on a wooden table" style="width:100%;">
      </a>
        </div>
      <div class="wrapper">
        <div class="bacholarColour">
      <div class="caption post-content">

                  <h3>Bacholar/Bacholarette</h3>
                  <p>This Category will help you find businesses relative to planning a Bacholar/Bacholarette Party.</p>
                   <p><a href="Bacholar.php" class="btn btn-default btn-lg" role="button">Explore</a>
              </div>
            </div>
          </div>
      </div>
  </div>


  <div class="col-sm-3">
    <div class="thumbnail">
      <div class="imageEffect">
      <a href="Corporate.php">
      <img src="../Images/CorporateEvent.jpeg" alt="Image of people wearing formal clothes talking in a function room" style="width:100%;">
    </a>
    </div>
      <div class="wrapper">
        <div class="corporateColour">
      <div class="caption post-content">

                  <h3>Corporate event</h3>
                  <p>This Category will help you find businesses relative to planning a Corporate Event.</p>
                   <p><a href="Corporate.php" class="btn btn-default btn-lg" role="button">Explore</a>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>


<script src="../JS/jquery.min.js"></script>
<script src="../JS/bootstrap.min.js"></script>
<script src="../JS/myJS.js"></script>
  </body>
</html>
