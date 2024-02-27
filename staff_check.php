
<?php

require_once('/opt/simplesaml/lib/_autoload.php');
$as = new \SimpleSAML\Auth\Simple('default-sp');
$as->requireAuth();
$attributes = $as->getAttributes();
$_SERVER["REMOTE_USER"]=$attributes['fan'][0];


 //error_reporting(E_ALL); 
$real_fan=$_SERVER["REMOTE_USER"];                                                                                  
include('pdo.php');



$fan=filter_var($_SERVER['REMOTE_USER'],FILTER_UNSAFE_RAW, FILTER_NULL_ON_FAILURE);  // Jan 2024
$stmt3 = $conn->prepare('SELECT * FROM store_admin_staff  WHERE fan =:fan');
$stmt3->bindParam(':fan', $fan, PDO::PARAM_STR);	
$stmt3->execute();


while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
$fan=$row3['fan'];	
}




if ($_SERVER["REMOTE_USER"]==$fan) { 
$admin='1';
}

if ($stmt3) {


session_start();
$_SERVER["REMOTE_USER"]=$_SESSION['proxy_fan'];  
}
else { 
$_SERVER["REMOTE_USER"]=$real_fan; 
}
if ($_SERVER["REMOTE_USER"]==NULL) {

$_SERVER["REMOTE_USER"]=$real_fan;
}

$fan_id=filter_var($_SERVER['REMOTE_USER'],FILTER_UNSAFE_RAW, FILTER_NULL_ON_FAILURE);  // Jan 2024
$blacklist='1';	//was $_SERVER["REMOTE_USER"]
$stmt = $conn->prepare('SELECT * FROM store_staff  WHERE fan_id =:fan_id AND blacklist= :blacklist');
$stmt->bindParam(':fan_id', $fan_id, PDO::PARAM_STR);
$stmt->bindParam(':blacklist', $blacklist, PDO::PARAM_INT);	
$stmt->execute();




if ($stmt)  {


return ("ok");


}else {
$denied='denied.php';
    header('Location: '. $denied, false);
    exit;
  
}
return ("ok");
   ?>

