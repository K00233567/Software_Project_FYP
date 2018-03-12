<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/Style.css">
    <title>App</title>
  </head>
  <body>


      <header id="header">
          <div class="container">

            <div id="logo" class="pull-left">
              <h1>NOA</h1>
              <!-- Uncomment below if you prefer to use an image logo -->
              <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
            </div>
            <nav id="nav-menu-container">
              <ul class="nav-menu">
                <li><a href="Login.php">Login</a></li>
              </ul>
            </nav><!-- #nav-menu-container -->
          </div>
        </header><!-- #header -->

srthsdfhdfdf
    <!--==========================
        Intro Section
      ============================-->

    <section id="intro">
        <div class="intro-text">
          <h2>Find The Right Business Near You...</h2>
          <p> Looking for an easy way to plan an event? This app helps you find all the businesses you need to make that event happen!</p>


<!--CUSTOMER SIGN UP BUTTON-->
<div class="row">


    <button onclick="document.getElementById('cSign-Up').style.display='block'" id="cSign-up-button"  class="btn btn-primary btn-lg" type="button">Customer Sign-Up</button>

    <div id="cSign-Up" class="modal">
      <span onclick="document.getElementById('cSign-Up').style.display='none'" class="close" title="Close Modal">&times;</span>
      <form class="modal-content" action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
        <div class="container">
          <h1>Customer Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>

          <label for="id"><b>ID</b></label>
          <input type="text" placeholder="Enter ID" name="id" required>

          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>

          <div class="clearfix">
            <button type="button" onclick="document.getElementById('cSign-Up').style.display='none'" class="cancelbtn">Cancel</button>
            <input type="submit" class="signupbtn" name="Customer_Submitted">
          </div>
        </div>
      </form>
    </div> <!--End of modal-->


    <?php
    if(isset($_POST['Customer_Submitted'])){
    $ID = $_POST['id'];
    $Name = $_POST['name'];
    $CustomerEmail = $_POST['email'];
    $Password = $_POST['psw'];
    $connect = mysqli_connect('localhost','root','','event_management_system');

    mysqli_query($connect,"INSERT INTO customer(customerID,nameC,emailC,pinC)VALUES('$ID','$Name','$CustomerEmail','$Password')");

    if(mysqli_affected_rows($connect) >0){
      echo "Welcome, you have now created an account.";
    }
    else {
      echo "Sorry, an error has occurred please try again.  <br>";
      echo mysqli_error($connect);
    }

    }
     ?>



<!--BUSINESS SIGN UP BUTTON-->


      <button onclick="document.getElementById('bSign-Up').style.display='block'" id="bSign-up-button"  class="btn btn-danger btn-lg" type="button">Business Sign-Up</button>

      <div id="bSign-Up" class="modal">
        <span onclick="document.getElementById('bSign-Up').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
          <div class="container">
            <h1>Business Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="bID"><b>Business Id</b></label>
            <input type="text" placeholder="Enter Business Id" name="bID" required>

            <label for="bname"><b>Business Name</b></label>
            <input type="text" placeholder="Enter Business Name" name="bname" required>

            <label for="btype"><b>Business Type</b></label>
            <input type="text" placeholder="Enter Business Type" name="btype" required>

            <label for="bemail"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="bemail" required>

            <label for="telephone"><b>Telephone</b></label>
            <input type="number" placeholder="Enter Telephone" name="telephone" required><br><br><br>

            <label for="stAddress"><b>Street Address</b></label>
            <input type="text" placeholder="Enter Street Address" name="stAddress" required>

            <label for="price"><b>Price Estimate of Product/Service</b></label>
            <input type="number" placeholder="Enter Price Estimate" name="price" required><br><br><br>

            <label for="bpsw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="bpsw" required>

            <label for="description"><b>Brief description of business</b></label>
            <input type="text" placeholder="Enter a brief description of your business" name="description" required>

            <div class="clearfix">
              <button type="button" onclick="document.getElementById('bSign-Up').style.display='none'" class="cancelbtn">Cancel</button>
            <input type="submit" class="signupbtn" name="Business_Submitted">
            </div>
          </div>
        </form>
      </div> <!--End of modal-->

      <?php
      if(isset($_POST['Business_Submitted'])){
      $BusinessID = $_POST['bID'];
      $BusinessName = $_POST['bname'];
      $Btype = $_POST['btype'];
      $BEmail = $_POST['bemail'];
      $Telephone = $_POST['telephone'];
      $StAddress= $_POST['stAddress'];
      $Price= $_POST['price'];
      $PasswordB= $_POST['bpsw'];
      $Description= $_POST['description'];

      $connect = mysqli_connect('localhost','root','','event_management_system');

      mysqli_query($connect,"INSERT INTO business(businessID,nameB,type,emailB,telephone,address,price,pinB,description)VALUES('$BusinessID','$BusinessName','$Btype','$BEmail','$Telephone','$StAddress','$Price','$PasswordB','$Description')");

      if(mysqli_affected_rows($connect) >0){
        echo "Welcome, you have now created an account.";
      }
      else {
        echo "Sorry, an error has occurred please try again.  <br>";
        echo mysqli_error($connect);
      }

      }
       ?>


      </div>
    </div>

</section><!-- #intro -->


<script src="JS/jquery.min.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/myJS.js"></script>





  </body>
</html>
