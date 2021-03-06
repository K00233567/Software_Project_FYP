href="./Search.php" <?php
session_start();
include("../CONFIG/connection.php");

// CHECKS THAT USER IS LOGGED IN BEFORE ENTRY
if($_SESSION['Login']===null){
  header('Location: ../index.php');
}

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
  <nav class="navbar navbar-default" id="navbarMargin">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
         <a id="LogoStyle" class="navbar-brand" href="#">EventPrice</a>
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
              <a href="./Search.php" type="button" class="list-group-item">Search for a Venue.</a>
              <a href="./Search.php" type="button" class="list-group-item">Search for Caterer.</a>
              <a href="./Search.php" type="button" class="list-group-item">Search for Barber/Hairdresser.</a>
              <a href="./Search.php" type="button" class="list-group-item">Search for Florist.</a>
              <a href="./Search.php" type="button" class="list-group-item">Search for Baker.</a>
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

          <?php
          $connection=mysqli_connect ('localhost', $username, $password);
          if (!$connection) {  die('Not connected : ' . mysql_error());}

          // Set the active MySQL database
          $db_selected = mysqli_select_db( $connection,$database);
          if (!$db_selected) {
          die ('Can\'t use db : ' . mysqli_error($connection));
          }

          //Selecting the values for the customer's bookings to insert into panel
     $sql="SELECT nameB,date,telephone,emailB,price FROM booking INNER JOIN business ON businessID=idBusiness WHERE idCustomer= '$ID'";

                        $result = mysqli_query($connection,$sql);
                        if (!$result) {
                        die('Invalid query: ' . mysqli_error($connection));
                        }

                        // Creating table of bookings and displaying the Headers
                     echo '<table class="table table-bordered">';
                     echo '<tr><th>Business</th><th>Date</th><th>Telephone</th><th>Business Email</th><th>Price</th></tr>';

                     while ($row = mysqli_fetch_assoc($result)) { //fetch associative array from result
                       $name= $row['nameB'];
                       $telephone= $row['telephone'];
                       $date= $row['date'];
                      $email = $row['emailB'];
                       $price = $row['price'];

                       // Displaying the values for the table
                       echo "<tr>
                   <td>$name</td>
                   <td>$date</td>
                   <td>$telephone</td>
                   <td>$email</td>
                   <td>€$price</td>
                   ";
    }


          $query = "SELECT SUM(price) FROM business,booking WHERE businessID=idBusiness && idCustomer='$ID'";
          $result = mysqli_query($connection,$query);
          if (!$result) {
          die('Invalid query: ' . mysqli_error($connection));
          }
          While($resultset = mysqli_fetch_assoc($result)){
          $Total = $resultset['SUM(price)'];


          echo '<table class="table table-bordered">';
          echo "<tr>
          <td><strong>Total: € $Total</strong></td>
          ";
          }
          ?>

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
