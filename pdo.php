<?php

$servername = "elearn-db01p";
$username = "ehltdev";
$password = "Frt12^wfg#ft5"; 
$dbname = "elearning";
$conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed ". $conn->connect_error);
}

//echo "Connected successfully";
//mysqli_close($conn);
?>

