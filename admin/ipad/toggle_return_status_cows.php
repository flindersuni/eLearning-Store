<?php 
error_reporting(0);;
	include('../staff_admin_check.php'); 

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML><HEAD>
<TITLE>EHL store</TITLE>
<?php

$sql="SELECT store_status FROM store_items  WHERE barcode='".$_GET['barcode']."'";


	$result = pg_query($sql);
	$nrows = pg_numrows($result);
	
	$row = pg_fetch_array($result);
	$result = pg_query($dbcon, $sql);
	
	//echo $row['store_status'];
	//exit;
	if ($row['store_status']=='1')
	{
	$new_store_status='0';
	}
	else
	{ 
	$new_store_status='1';
	}
	
//	switch ($store_status) {
//case 1:
   // $new_store_status='0';
  //  break;
//case 0:
   // $new_store_status='1'
   // break;
	//}

$sql="UPDATE store_items SET store_status = '$new_store_status' WHERE barcode = '".$_GET['barcode']."'";
//print $fan;
//print $sql;
//exit;

    $result = pg_query($sql);
	$nrows = pg_numrows($result);

 if($nrows != 0)
	{

		{
$row = pg_fetch_array($result);


}
		
	  }
$result = pg_query($dbcon, $sql);

$sql="SELECT ret FROM store_bookings  WHERE booking_id='".$_GET['booking_id']."'";


	$result = pg_query($sql);
	$nrows = pg_numrows($result);
	
	$row = pg_fetch_array($result);
	$result = pg_query($dbcon, $sql);
	
	//echo $row['p_up'];
	//exit;
	if ($row['ret']=='1')
	{
	$new_ret='0';
	}
	else
	{ 
	$new_ret='1';
	}
	
//	switch ($store_status) {
//case 1:
   // $new_store_status='0';
  //  break;
//case 0:
   // $new_store_status='1'
   // break;
	//}

$sql="UPDATE store_bookings SET ret = '$new_ret' WHERE booking_id = '".$_GET['booking_id']."'";
//print $fan;
//print $sql;
//exit;

    $result = pg_query($sql);
	$nrows = pg_numrows($result);

 if($nrows != 0)
	{

		{
$row = pg_fetch_array($result);


}
		
	  }
$result = pg_query($dbcon, $sql);

if (!$result) {
  echo "An error occured.\n";
 exit;
}

 


//}else {
//echo "Sorry, you're not authorised for administrator rights"; 
       // } //end if
$denied='cow_returns_today.php?';
header('Location: '. $denied, false);
exit;

 ?>

</BODY>
</HTML>