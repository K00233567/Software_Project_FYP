<?php
include ('CONFIG/connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./CSS/bootstrap.min.css">
        <link rel="stylesheet" href="./CSS/Style.css">
    </head>
    <body>
    <div><h1>This is a Test Page</h1>

<?php
echo '<h3>Connect to MySQL Server and database</h3>';

//connect using object oriented method - use MySQLi class
//MySQLi class : http://php.net/manual/en/class.mysqli.php
@$db=new mysqli($DBServer, $DBUser, $DBPass, $DBName); //try to connect to the MySQL server

echo '<hr>';
echo '<h4>Connect to MySQL Server</h4>';
if($db->connect_errno){
    //if DEBUG is enabled display diagnostics
    if (__DEBUG==1){
        echo '<h3>DIAGNOSTIC DATA - Unable to connect to MySQL Server</h3>';
        echo 'MySQL Server Connection parameters attempted:<br>';
        echo 'Host address :'.$DBServer.'<br>';
        echo 'Username : '.$DBUser.'<br>';
        echo 'Password : '.$DBPass.'<br>';
        echo 'Selected Database : '.$DBName.'<br>';
        echo '<h4>MySQLi error message:</h4>';
        echo $db->connect_error;
        $db->close();
        exit ('<hr>Script terminated');
    }
    else{
        echo 'System Error - no debug information available';
        $db->close();
        exit ('<hr>Script terminated');
        }
        }
else{
        echo 'Server & database connection successful<br>';
    }

echo '<h4>Use the connection to MySQL Server</h4>';
//use the connection
//display connection parameters
echo '<h5>MySQLi Server Connection Object information :</h5>';
echo "Client connection info  string :  $db->client_info <br>";
echo "Server Version   [as decimal release]:  $db->server_info <br>";
echo "Host info :  $db->host_info() <br>";
$sql = "Select * from customer ";

echo 'SQL = '.$sql.'<br>';

if(@$rs=$db->query($sql)){
    echo '<br>Query has been Executed<br>';
}
else{
    echo '<br>SQL Query has FAILED - possible problem in the SQL - check for syntax errors<br>';
    exit ('<hr>Script terminated');
}

//query results
echo '<h5>Query Result</h5>';
//check if any rows returned from query
if (!$rs->num_rows){
        echo 'No records have been returned - resultset is empty - Nr Rows = '.$rs->num_rows. '<br>';
}


    //fetch associative array using a WHILE + FOREACH loop
    echo "<h5>This is an example of writing from the database</h5>";
    $rs->data_seek(0);  //point to the first row
    while ($row = $rs->fetch_assoc()) {
            foreach ($row as $key=>$value){
                echo $value.' ';
            }
            echo '<br>';
    }



echo '<h4>Tidy Up!</h4>';
//end of database operations
$db->close();
echo 'Database connection closed<br>';




?>
<nav class="navbar navbar-default navbar-fixed-top ">

  <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
     <a class="navbar-brand" href="#">Relics Of Time</a>
   </div> <!--end of navbar-header-->

   <div class= "collapse navbar-collapse" id="myNavbar">
     <ul class="nav navbar-nav">

       <li class ="active"><a href="#">Home</a></li>
       <li class ="dropdown">
         <a class = "dropdown-toggle" data-toggle="dropdown" href="#">Shop Online<span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li><a href="ClocksAndWatches.html">Clocks & Watches</a></li>
           <li><a href="IrishCollectables.html">Irish Collectables</a></li>
         </ul>
       </li>
       <li><a href="Restoration.html">Restoration</a></li>
       <li><a href="Auctions.html">Auctions</a></li>
       <li><a href="ContactUs.html">Contact Us</a></li>
       <li><a href="Checkout.html" class="shoppingCart">Checkout<i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
     </ul>
   </div> <!--end of collapse-->
 </div>
</nav>



<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1>NOA</h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#Login">Login</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

<section id="intro">

    <div class="intro-text">
      <h2>Find The Right Business Near You...</h2>
      <p> Looking for an easy way to plan an event? This app helps you find all the businesses you need to make that event happen!</p>

    </div>



  </section><!-- #intro -->
  <script src="JS/jquery.min.js"></script>
  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/myJS.js"></script>
</body>
</html>
