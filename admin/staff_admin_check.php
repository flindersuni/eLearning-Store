<?php
//include('ldap_connect2.php');
//include ('database_connect2.php');
require_once('/opt/simplesaml/lib/_autoload.php');
$as = new \SimpleSAML\Auth\Simple('default-sp');
$as->requireAuth();
$attributes = $as->getAttributes();
$_SERVER["REMOTE_USER"]=$attributes['fan'][0];

include('pdo.php');
//$sql="SELECT * FROM store_admin_staff ";
//////////////////	
$stmt = $conn->prepare('SELECT * FROM store_admin_staff');
$stmt->execute(); 
////////////////
//$result = $conn->query($sql);  //new sql

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			//$row = pg_fetch_array($result);
$fan=$row['fan'];	


if ($_SERVER["REMOTE_USER"]==$fan)  {
//if ('fili0008'==$fan)  { //was  pre PHP 8.2

$admin='1';  
return ("ok");
//$result = pg_query($dbcon, $sql);

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