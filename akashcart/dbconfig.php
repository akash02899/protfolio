<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "student";

$mysqli = new mysqli("localhost","root","","student");

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$conn = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname"); 
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}



?>