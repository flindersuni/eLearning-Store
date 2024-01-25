<?php 

include ('pdo.php');



//$inYear=$_POST['inYear'];
$inYear=filter_input(INPUT_POST, 'inYear');	// new Nov 2023	
//$cat_id=$_POST['cat_id'];
$cat_id=filter_input(INPUT_POST, 'cat_id');	// new Nov 2023
//$inMonth=$_POST['next_month'];
$inMonth=filter_input(INPUT_POST, 'next_month');	// new Nov 2023
if ($inMonth==NULL) {
//$inMonth=$_POST['last_month'];
$inMonth=filter_input(INPUT_POST, 'last_month');	// new Nov 2023	
}

$denied='browse_items.php?cat_id='.$cat_id.'&inMonth='.$inMonth.'&inYear='.$inYear.'';
header('Location: '. $denied, false);
exit;	
?>

<HEAD>

</HEAD>
</BODY>
</HTML>