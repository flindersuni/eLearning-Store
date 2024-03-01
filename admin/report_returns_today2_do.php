<?php 

include('staff_admin_check.php'); 


$date_string=filter_input(INPUT_GET, 'date_string'); 	
$denied='report_returns_today.php?date_string='.$date_string;
header('Location: '. $denied, false);
exit;	
?>

<HEAD>


</HEAD>

</BODY>
</HTML>