 <?php
   require("phpsqlsearch_dbinfo.php");
   // Get parameters from URL
   $center_lat = (isset( $_GET["lat"] ) ? $_GET["lat"] : 1.1026 ); 
   $center_lng =( isset( $_GET["lng"] ) ? $_GET["lng"] : -37.0132 ); 
   $radius= ( isset( $_GET["radius"] ) ? $_GET["radius"] : 25 );

  //  $center_lat = $_GET["lat"];
  //  $center_lng = $_GET["lng"];
  //  $radius = $_GET["radius"];
   // Start XML file, create parent node
   $dom = new DOMDocument("1.0");
   $node = $dom->createElement("restaurants");
   $parnode = $dom->appendChild($node);
   // Opens a connection to a mySQL server
   $connection=mysqli_connect ("127.0.0.1", $username, $password);
   if (!$connection) {
     die("Not connected : " . mysqli_error());
   }
   // Set the active mySQL database
   $db_selected = mysqli_select_db($connection,$database );
   if (!$db_selected) {
     die ("Can\'t use db : " . mysqli_error());
   }
   // Search the rows in the restaurants table
   $query = sprintf("SELECT id, name, physical_address,opening_time,days_of_operation,website,closing_time,email,phone, lat, lng, ( 3959 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM restaurants HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($connection,$center_lat),
  mysqli_real_escape_string($connection,$center_lng),
  mysqli_real_escape_string($connection,$center_lat),
  mysqli_real_escape_string($connection,$radius));
 
   $result = mysqli_query($connection,$query);
   $result = mysqli_query($connection,$query);
   if (!$result) {
     die("Invalid query: " . mysqli_error($connection));
   }
  <!-- header("Content-type: text/xml"); -->
   // Iterate through the rows, adding XML nodes for each
   while ($row = @mysqli_fetch_assoc($result)){
     $node = $dom->createElement("restaurant");
     $newnode = $parnode->appendChild($node);
     $newnode->setAttribute("id", $row['id']);
     $newnode->setAttribute("name", $row['name']);
     $newnode->setAttribute("opening_time", $row['opening_time']);
     $newnode->setAttribute("closing_time", $row['closing_time']);
     $newnode->setAttribute("days_of_operation", $row['days_of_operation']);
     $newnode->setAttribute("physical_address", $row['physical_address']);
     $newnode->setAttribute("lat", $row['lat']);
     $newnode->setAttribute("lng", $row['lng']);
     $newnode->setAttribute("distance", $row['distance']);
   }

    // echo saveXML();

   echo $dom->saveXML();
   ?>
  </body>
</html>
