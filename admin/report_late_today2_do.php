<?php 

	//include('staff_admin_check.php'); 

$date_string=$_GET['date_string'];

$denied='report_late_all.php?date_string='.$date_string;
header('Location: '. $denied, false);
exit;	
?>

