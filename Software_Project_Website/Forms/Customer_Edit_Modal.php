<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Style.css">
    <title>App</title>
  </head>
  <body>
    <!--CUSTOMER SIGN UP MODAL-->
    <div id="cEdit-Modal" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title">Edit Customer</h4>
            </div>
            <div class="modal-body">

        <div class="form-group">
          <label for="name" class="pull-left"><b>Name</b></label>
          <input type="text" value="<?php echo $row['nameC']; ?>" name="name" required>
        </div>

        <div class="form-group">
          <label for="email" class="pull-left"><b>Email</b></label>
          <input type="text" value="<?php echo $ID; ?>" name="email" required>
        </div>

        <div class="form-group">
          <label for="LoggedIn" class="pull-left"><b>LoggedIn</b></label>
          <input type="text" value="<?php echo $LoggedIn; ?>" name="LoggedIn" required>
        </div>



        <button class="btn btn-primary btn-lg" name ="Customer_editted">Save</button>
        <button type="button" data-dismiss="modal" class="btn btn-danger btn-lg">Cancel</button>
        </div>
    </div> <!--End of modal-->
    </div>
    </div>






<script src="../JS/jquery.min.js"></script>
<script src="../JS/bootstrap.min.js"></script>
<script src="../JS/myJS.js"></script>

  </body>
</html>
