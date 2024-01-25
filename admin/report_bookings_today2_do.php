<?php 

	//include('staff_admin_check.php'); 

//$date_string=$_GET['date_string'];
$date_string=filter_input(INPUT_GET, 'date_string'); /// new Nov 2023
$denied='report_bookings_today.php?date_string='.$date_string;
header('Location: '. $denied, false);
exit;	
?>

<HEAD>


</HEAD>






</BODY>
</HTML>