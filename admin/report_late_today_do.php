<?php 

include('staff_admin_check.php'); 

$date=filter_input(INPUT_POST, 'date'); /// new Nov 2023	
$date_string= strtotime ($date);


$denied='report_late_all.php?date_string='.$date_string;
header('Location: '. $denied, false);
exit;	
?>

