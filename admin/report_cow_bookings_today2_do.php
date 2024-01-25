<?php 

include('staff_admin_check.php'); 

$date_string=$_GET['date_string'];

$denied='report_cow_bookings_today.php?date_string='.$date_string;
header('Location: '. $denied, false);
exit;	
?>

<HEAD>


</HEAD>






</BODY>
</HTML>