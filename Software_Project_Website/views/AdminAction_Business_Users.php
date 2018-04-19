<?php
session_start();
include("../CONFIG/connection.php");

// CHECKS THAT USER IS LOGGED IN BEFORE ENTRY
if($_SESSION['Login']===null){
  header('Location: ../index.php');
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

           <li class ="active"><a href="Admin.php" class="home">Home</a></li>
           <li class ="active"><a href="#" class="home">Business Users</a></li>
           <li class =""><a href="AdminAction_Bookings.php" class="home">Bookings</a></li>
           <li class =""><a href="./AdminAction_Admin_Users.php" class="home">Admin Users</a></li>
           <li><a href="../php/Admin_Logout.php" class="Logout">Logout</a></li>
         </ul>
       </div> <!--end of collapse-->

    </nav>

<style>
  body{
    	background: linear-gradient(10deg, rgba(40, 60, 190, 0.3), rgba(29, 200, 205, 0.8));
      background-size: cover;
    	width: 100%;
    	height: 92.5vh;
    	position: relative;
  }
</style>


<!-- View Business Panel -->
<div class="container">
  <div class="panel panel-default">
      <div class="panel-heading">Business Users</div>
        <div class="panel-body">
          <?php

          $connection=mysqli_connect ('localhost', $username, $password);
          if (!$connection) {  die('Not connected : ' . mysql_error());}

          // Set the active MySQL database
          $db_selected = mysqli_select_db( $connection,$database);
          if (!$db_selected) {
          die ('Can\'t use db : ' . mysqli_error($connection));
          }

          $sql = "SELECT businessID, nameB, emailB, LoggedIn
                  FROM business
                  Group by businessID;";

                  $result = mysqli_query($connection,$sql);
                  if (!$result) {
                  die('Invalid query: ' . mysqli_error($connection));
                  }

                  // Creating table of businesses and displaying the Headers
               echo '<table class="table table-bordered">';
               echo '<tr><th>BusinessID</th><th>Name</th><th>Email</th><th>LoggedIn</th></tr>';

               while ($row = mysqli_fetch_assoc($result)) { //fetch associative array from result
                 $id= $row['businessID'];
                 $name= $row['nameB'];
                 $email= $row['emailB'];
                 $LoggedIn= $row['LoggedIn'];

                 // Displaying the values for the table
                 echo "<tr>
             <td>$id</td>
             <td>$name</td>
             <td>$email</td>
             <td>$LoggedIn</td>
             ";
?>
            <!-- Creating 'Edit' and 'Delete' button at each row -->
             <td>
               <button class="btn btn-primary" type="button" data-toggle="modal" id="Edit" href="#BEdit-Modal<?php echo $id ?>">Edit</button>
               <button class="btn btn-danger" type="button"  data-toggle="modal" id="Delete"  href="#Bdelete<?php echo $id; ?>">Delete</button>
           </td>


             <!--BUSINESS EDIT MODAL-->
             <div id="BEdit-Modal<?php echo $id ?>" class="modal fade">

               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Business</h4>
                     </div>
                     <div class="modal-body">
                  <form role="form" action="../php/adminActions.php" method="post">

                    <div class="form-group">
                      <label for="name" class="pull-left"><b>Id</b></label>
                      <input type="text" name="id" value="<?php echo $id; ?>" readonly>
                    </div>
                 <div class="form-group">
                   <label for="name" class="pull-left"><b>Name</b></label>
                   <input type="text" value="<?php echo $name; ?>" name="name" autofocus required>
                 </div>

                 <div class="form-group">
                   <label for="email" class="pull-left"><b>Email</b></label>
                   <input type="text" value="<?php echo $email; ?>" name="email" required>
                 </div>

                 <div class="form-group">
                   <label for="LoggedIn" class="pull-left"><b>LoggedIn</b></label>
                   <input type="text" value="<?php echo $LoggedIn; ?>" name="LoggedIn" required>
                 </div>



                 <button class="btn btn-primary btn-lg" name ="Business_editted">Save</button>
                 <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg">Cancel</button>
                 </div>
               </form>
             </div> <!--End of modal-->
             </div>
             </div>

             <!--Delete Modal -->
   <div id="Bdelete<?php echo $id; ?>" class="modal fade" role="dialog">
       <div class="modal-dialog">
           <form method="post" action="../php/adminActions.php">
               <!-- Modal content-->
               <div class="modal-content">

                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Delete</h4>
                   </div>

                   <div class="modal-body">
                       <input type="hidden" name="Bdelete_id" value="<?php echo $id; ?>">
                       <p>
                           <div class="alert alert-danger">Are you Sure you want Delete <strong><?php echo $name; ?>?</strong></p>
                       </div>
                       <div class="modal-footer">
                           <button type="submit" name="Bdelete" class="btn btn-danger">YES</button>
                           <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                       </div>
                   </div>
           </form>
           </div>
       </div>
   </div>
           </tr>







<?php
        }//end of while loop


           ?>


        </div>
      </div>
</div>



<script src="../JS/jquery.min.js"></script>
<script src="../JS/bootstrap.min.js"></script>
<script src="../JS/myJS.js"></script>
  </body>
</html>
