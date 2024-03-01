<?php 

	
	include('database_connect2.php');  


$date_request=$_POST['date_1'];
$date_request_exp=explode("-",$date_request);//reverse date 
$inMonth=$date_request_exp[1];//
$inYear=$date_request_exp[0];//
$cat_id=$_GET['cat_id'];


$denied='browse_items.php?cat_id='.$cat_id.'&inMonth='.$inMonth.'&inYear='.$inYear.'';
header('Location: '. $denied, false);
exit;	
?>

<HEAD>

</HEAD>
</BODY>
</HTML>