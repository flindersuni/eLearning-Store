<?php 
	//$section = "store";
	//$sectionmenu = "store_admin";
	include('staff_admin_check.php'); 

	include('../pdo.php'); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML><HEAD>
<TITLE>eLearning store</TITLE>
<?php

$sql="SELECT blacklist FROM store_staff  WHERE fan_id='".$_GET['fan_id']."'";


$result = $conn->query($sql);  //new sql
while($row = $result->fetch_assoc()) {
$blacklist=$row['blacklist'];	 
 }	
	//echo $row['blacklist'];
	//exit;
	if ($blacklist=='1')
	{
	$new_blacklist='0';
	}
	else
	{ 
	$new_blacklist='1';
	}
	
//	switch ($store_status) {
//case 1:
   // $new_store_status='0';
  //  break;
//case 0:
   // $new_store_status='1'
   // break;
	//}

$sql="UPDATE store_staff SET blacklist = '$new_blacklist' WHERE fan_id = '".$_GET['fan_id']."'";
//print $fan;
//print $sql;
//exit;
$result = $conn->query($sql);  //new sql

 if($result)
	{

		{
//$row = pg_fetch_array($result);


}
		
	  }
//$result = pg_query($dbcon, $sql);



if (!$result) {
  echo "An error occured.\n";
 exit;
}

 


//}else {
//echo "Sorry, you're not authorised for administrator rights"; 
       // } //end if
$denied='staff_list.php';
header('Location: '. $denied, false);
exit;

 ?>

</BODY>
</HTML>
