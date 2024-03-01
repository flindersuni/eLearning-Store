<?php 

	include('staff_admin_check.php'); 

?>


<HTML><HEAD>
<TITLE>eLearning store</TITLE>
<?php



$sql="SELECT m FROM store_admin_staff  WHERE fan='".$_GET['fan']."'";

	
$result = $conn->query($sql);  //new sql
 while($row = $result->fetch_assoc()) {
$m=$row['m'];	 
 }
	
	if ($m=='1')
	{
	$new_m='0';
	}
	else
	{ 
	$new_m='1';
	}

	
	
$sql="UPDATE store_admin_staff SET m = '$new_m' WHERE fan='".$_GET['fan']."'";

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

 
$denied='admin_staff_locations.php';
header('Location: '. $denied, false);
exit;

 ?>

</BODY>
</HTML>