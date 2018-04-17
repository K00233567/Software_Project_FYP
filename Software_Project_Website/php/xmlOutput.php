<?php

require("../CONFIG/connection.php");
// Get parameters from URL

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected = mysqli_select_db( $connection,$database);
if (!$db_selected) {
die ('Can\'t use db : ' . mysqli_error($connection));
}

// Select all the rows in the business table

$query = "SELECT businessID,nameB,address,lat,lng,type,price,telephone FROM business WHERE 1";
$result = mysqli_query($connection,$query);
if (!$result) {
die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id", $row['businessID']);
  $newnode->setAttribute("name", $row['nameB']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", $row['type']);
  $newnode->setAttribute("price", $row['price']);
  $newnode->setAttribute("telephone", $row['telephone']);

}
echo $dom->saveXML();
?>
