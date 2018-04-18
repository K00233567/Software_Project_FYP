<?php
session_start();
  ?>
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
              <a class="LogoStyle"  href="#ASignInModal" data-toggle='modal'>NOA</a>
            </div>
            <nav id="nav-menu-container">
              <ul class="nav-menu">
                <a href="#SignInModal" data-toggle='modal'>Customer Login</a>
                <a href="#BSignInModal" data-toggle='modal'>| Business Login</a>
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
  <div class="col-sm-6">

    <button href='#cSign-up-Modal' id="cSign-up-button"  class="btn btn-primary btn-lg" type="button" data-toggle='modal'>Customer Sign-Up</button>

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
          <input type="text" placeholder="Enter Name" name="name" autofocus required>
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
    </div>



<!--BUSINESS SIGN UP BUTTON-->
<div class="col-sm-6">

      <button href='#bSign-Up-Modal' id="bSign-up-button"  class="btn btn-danger btn-lg" type="button" data-toggle='modal'>Business Sign-Up</button>
</div>

  <!--BUSINESS SIGN UP MODAL-->
      <div id="bSign-Up-Modal" class="modal fade">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Business Sign-Up</h4>
              </div>
              <div class="modal-body">
        <form class="form" id='signup' action="<?php echo 'php/signUp.php';?>" method="post">
             <div class="form-group">
            <label for="bname" class="pull-left"><b>Business Name</b></label>
            <input type="text" placeholder="Enter Business Name" name="bname" class="form-control" autofocus required>
          </div>

             <div class="form-group">
            <label for="bemail" class="pull-left"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="bemail" class="form-control" required>
          </div>

           <div class="form-group">
            <label for="bpsw" class="pull-left"><b>Password</b></label>
            <input required type="password" placeholder="Enter Password" id='Password'  name="bpsw" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
          </div>

          <div class="form-group">
           <label for="bpsw" class="pull-left"><b>Confirm Password</b></label>
           <input required type="password" placeholder="Confirm Password"  id='passwordConfirm' class="form-control">
         </div>

          <button class="btn btn-primary btn-lg" name ="Business_Submitted">Sign-Up</button>
          <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg">Cancel</button>
        </form>
      </div> <!--End of modal-->
      </div>
    </div>
  </div>


</section><!-- #intro -->


<!-- Customer Login Modal -->
<div id="SignInModal" class="modal fade">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Customer Login</h4>
               </div>
               <div class="modal-body">
                  <form class="form" method="post" autocomplete="off"  action ="<?php echo './php/Customer_Login.php';?>">

                      <div class="form-group">
                        <label for="email" class="pull-left"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" autofocus required>
                      </div>

                      <div class="form-group">
                      <label for="psw" class="pull-left"><b>Password</b></label>
                      <input type="password" placeholder="Enter Password" name="psw" required>
                    </div>

                     <button class="btn btn-primary btn-lg" name ="CLogin">Sign In</button>
                     <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg">Cancel</button>
                  </form>
               </div>
            </div>
         </div>
      </div>


      <!-- Business Login Modal -->
      <div id="BSignInModal" class="modal fade">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Business Login</h4>
                     </div>
                     <div class="modal-body">
                        <form class="form" method="post" autocomplete="off"  action ="<?php echo 'php/Business_Login.php';?>">

                            <div class="form-group">
                           <label for="bemail" class="pull-left"><b>Email</b></label>
                           <input type="text" placeholder="Enter Email" name="bemail" class="form-control" autofocus required>
                         </div>

                         <div class="form-group">
                          <label for="bpsw" class="pull-left"><b>Password</b></label>
                          <input required type="password" placeholder="Enter Password"  name="bpsw" class="form-control">
                        </div>
                           <button class="btn btn-primary btn-lg" name ="BLogin">Sign In</button>
                           <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg">Cancel</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>



            <!-- Admin Login Modal -->
            <div id="ASignInModal" class="modal fade">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Admin Login</h4>
                           </div>
                           <div class="modal-body">
                              <form class="form" method="post" autocomplete="off"  action ="<?php echo 'php/Admin_Login.php';?>">

                                  <div class="form-group">
                                 <label for="bemail" class="pull-left"><b>Email</b></label>
                                 <input type="text" placeholder="Enter Email" name="Aemail" class="form-control" autofocus required>
                               </div>

                               <div class="form-group">
                                <label for="bpsw" class="pull-left"><b>Password</b></label>
                                <input required type="password" placeholder="Enter Password"  name="Apsw" class="form-control">
                              </div>
                                 <button class="btn btn-primary btn-lg" name ="ALogin">Sign In</button>
                                 <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg">Cancel</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>


<script src="JS/jquery.min.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/myJS.js"></script>

  </body>
</html>
