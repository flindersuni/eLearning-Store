<?php

require_once('/opt/simplesaml/lib/_autoload.php');
$as = new \SimpleSAML\Auth\Simple('default-sp');
$as->requireAuth();
$attributes = $as->getAttributes();
$_SERVER["REMOTE_USER"]=$attributes['fan'][0];

include('pdo.php');

$stmt = $conn->prepare('SELECT * FROM store_admin_staff');
$stmt->execute(); 


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

$fan=$row['fan'];	


if ($_SERVER["REMOTE_USER"]==$fan)  {


$admin='1';  //checks if user is in store_admin_staff table
return ("ok");


if (!$stmt) {
  echo "An error occured.\n";
  exit;
}

}else {

        } //end if
}
$denied='admin_denied.php';
    header('Location: '. $denied, false);
    exit;
   
 ?>