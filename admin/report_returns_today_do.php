<?php 

include('staff_admin_check.php'); 

$date=filter_input(INPUT_POST, 'date'); 
$date_string= strtotime ($date);

$denied='report_returns_today.php?date_string='.$date_string;
header('Location: '. $denied, false);
exit;	
?>

<HEAD>


</HEAD>






</BODY>
</HTML>