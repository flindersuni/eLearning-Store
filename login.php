<?php

require_once('/opt/simplesaml/lib/_autoload.php');
$as = new \SimpleSAML\Auth\Simple('default-sp');
$as->requireAuth();
$attributes = $as->getAttributes();
$_SERVER["REMOTE_USER"]=$attributes['fan'][0];
//$_SERVER["REMOTE_USER"]="fili0008";
echo $_SERVER["REMOTE_USER"];

?>

