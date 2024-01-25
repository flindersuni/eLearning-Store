<?php 

//$servername = "127.0.0.1"; //DE
$servername = "webmysql-db01d"; //DEV
//$servername = "webmysql-db01p"; //PROD
//$username = "ehltadmin"; 
//$password = "P@ssw0rd";
//$username = "root";
$username = "fili0008";
//$username = "Test"; 
//$password = "";//DEV
$password = "*rpRhGE7CrxEOUHv";//DEV
//$password = "*CnIFgg7ok3LXaSl";//PROD
//$password = "!2345University";//PROD
//$dbname = "EHLTWEB";
$dbname = "Storedev";
// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = new PDO("mysql:host=$servername;dbname=Storedev", $username, $password);	
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to sql !!";



 ?>