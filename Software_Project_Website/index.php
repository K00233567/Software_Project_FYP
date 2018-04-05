<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/Style.css">
    <title>App</title>
  </head>
  <body>

<nav>

      <header id="header">
          <div class="container">

            <div id="logo" class="pull-left">
              <h1>NOA</h1>
            </div>
            <nav id="nav-menu-container">
              <ul class="nav-menu">
                <li><a href="views/CustomerHome.html">Login</a></li>
              </ul>
            </nav><!-- #nav-menu-container -->
          </div>
        </header><!-- #header -->
</nav>
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
      <form class="modal-content" action="<?php echo 'php/signUp.php';?>" method = "post">
        <div class="container">
          <h1>Customer Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>

          <label for="name" class="pull-left"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" required>

          <label for="email" class="pull-left"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required>

          <label for="psw" class="pull-left"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>

          <div class="clearfix">
            <button type="button" onclick="document.getElementById('cSign-Up').style.display='none'" class="cancelbtn">Cancel</button>
            <input type="submit" class="signupbtn" name="Customer_Submitted">
          </div>
        </div>
      </form>
    </div> <!--End of modal-->



<!--BUSINESS SIGN UP BUTTON-->


      <button onclick="document.getElementById('bSign-Up').style.display='block'" id="bSign-up-button"  class="btn btn-danger btn-lg" type="button">Business Sign-Up</button>

      <div id="bSign-Up" class="modal">
        <span onclick="document.getElementById('bSign-Up').style.display='none'" class="close" title="Close Modal">&times;</span>
        <form class="modal-content" action="<?php echo 'php/signUp.php';?>" method="post">
          <div class="container">
            <h1>Business Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="bname" class="pull-left"><b>Business Name</b></label>
            <input type="text" placeholder="Enter Business Name" name="bname" required>

            <label for="btype" class="pull-left"><b>Business Type</b></label>
            <input type="text" placeholder="Enter Business Type" name="btype" required>

            <label for="bemail" class="pull-left"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="bemail" required>

            <label for="telephone" class="pull-left"><b>Telephone</b></label>
            <input type="number" placeholder="Enter Telephone" name="telephone" required><br><br><br>

            <label for="stAddress" class="pull-left"><b>Street Address</b></label>
            <input type="text" placeholder="Enter Street Address" name="stAddress" required>

            <label for="price" class="pull-left"><b>Price Estimate of Product/Service</b></label>
            <input type="number" placeholder="Enter Price Estimate" name="price" required><br><br><br>

            <label for="bpsw" class="pull-left"><b>Password</b></label>
            <input required type="password" placeholder="Enter Password"  name="bpsw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

            <div class="clearfix">
              <button type="button" onclick="document.getElementById('bSign-Up').style.display='none'" class="cancelbtn">Cancel</button>
            <input type="submit" class="signupbtn" name="Business_Submitted">
            </div>
          </div>
        </form>
      </div> <!--End of modal-->
      </div>
    </div>

</section><!-- #intro -->


<script src="JS/jquery.min.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/myJS.js"></script>

  </body>
</html>
