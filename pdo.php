<?php

$servername = "elearn-db01p"; //DEV
$username = "ehltadmin";
$password = "sp@frEvu5Echa"; //DEV
$dbname = "EHLTWEB";
$conn = new PDO ("mysql:host=$servername;dbname=EHLTWEB", $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed ". $conn->connect_error);
}

//echo "Connected successfully";
//mysqli_close($conn);
?>

