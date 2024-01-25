<?php 

	include('staff_admin_check.php'); 
?>


<HTML><HEAD>
<TITLE>eLearning store</TITLE>
<?php


//$sql="UPDATE store_items SET store_status = '1' WHERE barcode = '".$_GET['barcode']."'";
//print $fan;
//print $sql;
//exit;
$store_status='1';
//$barcode = $_GET['barcode'];
$barcode=filter_input(INPUT_GET, 'barcode'); /// new Nov 2023		
$stmt = $conn->prepare('UPDATE store_items SET store_status = :store_status WHERE barcode = :barcode');
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_INT);
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);	 
$stmt->execute();
//$result = $conn->query($sql);  //new sql

 if($stmt)
	{

		{
//$row = pg_fetch_array($result);


}
		
	  }
//$result = pg_query($dbcon, $sql);


//$sql="UPDATE store_bookings SET ret = '1' WHERE booking_id = '".$_GET['booking_id']."'";
//print $fan;
//print $sql;
//exit;
$ret='1';
//$booking_id = $_GET['booking_id'];
$booking_id=filter_input(INPUT_GET, 'booking_id'); /// new Nov 2023	
$stmt = $conn->prepare('UPDATE store_bookings SET ret = :ret WHERE booking_id = :booking_id');
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	 
$stmt->execute();
//$result = $conn->query($sql);  //new sql

 if($stmt)
	{

		{
//$row = pg_fetch_array($result);


}
		
	  }
//$result = pg_query($dbcon, $sql);

if (!$stmt) {
  echo "An error occured.\n";
 exit;
}

 


//}else {
//echo "Sorry, you're not authorised for administrator rights"; 
       // } //end if
$denied='report_late_all.php?date_string='.$_GET['date_string'];
header('Location: '. $denied, false);
exit;

 ?>



</BODY>
</HTML>