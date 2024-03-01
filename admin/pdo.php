<?php 

$servername = "webmysql-db01d"; //DEV
$username = "fili0008";
$password = "*rpRhGE7CrxEOUHv";//DEV
$dbname = "Storedev";

$conn = new PDO("mysql:host=$servername;dbname=Storedev", $username, $password);	

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




 ?>