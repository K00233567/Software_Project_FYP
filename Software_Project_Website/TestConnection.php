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







  <script src="JS/jquery.min.js"></script>
  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/myJS.js"></script>
</body>
</html>
