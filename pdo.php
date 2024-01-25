<?php 


$servername = "webmysql-db01d"; //DEV
$username = "fili0008";
$password = "*rpRhGE7CrxEOUHv";//DEV
$dbname = "Storedev";
// Create connection
$conn = new PDO("mysql:host=$servername;dbname=Storedev", $username, $password);	
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully to sql !!";



 ?>
