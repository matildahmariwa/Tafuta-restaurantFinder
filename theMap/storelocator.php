<?php
require("phpsqlsearch_dbinfo.php");

// Get parameters from URL
$center_lat = ( isset( $_GET["lat"] ) ? $_GET["lat"] : 37 ); 
$center_lng = ( isset( $_GET["lng"] ) ? $_GET["lng"] : -122 ); 
$radius     = ( isset( $_GET["radius"] ) ? $_GET["radius"] : 25 );

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a mySQL server
$connection=mysqli_connect ('localhost', $username, $password);
if (!$connection) {
  die("Not connected : " . mysqli_error());

}

// Set the active mySQL database
$db_selected = mysqli_select_db($database, $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . mysqli_error());
}

// Search the rows in the markers table

//SELECT CustomerName, City FROM Customers;

$query = sprintf("SELECT address, name, lat, lng FROM markers",
// $query = sprintf("SELECT id, name, address, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($center_lat),
  mysqli_real_escape_string($center_lng),
  mysqli_real_escape_string($center_lat),
  mysqli_real_escape_string($radius));
$result = mysqli_query($query);

if (!$result) {
  die("Invalid query: " . mysqli_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

//var_dump(@mysqli_fetch_assoc($result));
//echo('@mysqli_fetch_assoc($result)');

while ($row = @mysqli_fetch_assoc($result)){
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name", $row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  //$newnode->setAttribute("distance", $row['distance']);
}

echo $dom->saveXML();
?>