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
  <nav class="navbar navbar-default" id="navbarMargin">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
         <a class="navbar-brand" href="./CustomerHome.php">NOA</a>
       </div> <!--end of navbar-header-->
       <div class="bacholarColour">
       <div class= "collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">

           <li><a href="./CustomerHome.php" class="home">Home</a></li>
           <li><a href="../php/Customer_signout.php" class="Logout">Logout</a></li>
         </ul>
       </div> <!--end of collapse-->
       </div>
    </nav>

<section id='BacholarImage'>


<!--TO-DO LIST PANEL-->
    <div class="row">
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="bacholarColour">
          <div class="panel-heading">
              <h1 class="display-1"style="text-align:center;">To-do List</h1>
          </div>
        </div>

          <div class="panel-body">
              <p class="lead" style="text-align:center;">Click on a business type below to search for them in your area!</p>
          </div>

            <div class="list-group">
              <button type="button" class="list-group-item">Search for a Venue.</button>
              <button type="button" class="list-group-item">Search for Caterer.</button>
              <button type="button" class="list-group-item">Search for Barber/Hairdresser.</button>
              <button type="button" class="list-group-item">Search for Fluerist.</button>
              <button type="button" class="list-group-item">Search for Baker.</button>
            </div>

      </div>
    </div> <!--END OF COL-->



  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="bacholarColour">
      <div class="panel-heading">
          <h1 class="display-1"style="text-align:center;">Event Total</h1>
      </div>
    </div>

      <div class="panel-body">
          <p class="lead" style="text-align:center;">Here is a price estimate of your event!</p>
      </div>



  </div>
</div> <!--END OF COL-->
</div> <!--END OF ROW-->

</section>

    <script src="../JS/jquery.min.js"></script>
    <script src="../JS/bootstrap.min.js"></script>
    <script src="../JS/myJS.js"></script>
  </body>
</html>
