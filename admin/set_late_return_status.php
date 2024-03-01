<?php 

	include('staff_admin_check.php'); 
?>


<HTML><HEAD>
<TITLE>eLearning store</TITLE>
<?php


$store_status='1';
$barcode=filter_input(INPUT_GET, 'barcode'); 		
$stmt = $conn->prepare('UPDATE store_items SET store_status = :store_status WHERE barcode = :barcode');
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_INT);
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);	 
$stmt->execute();

 if($stmt)
	{

		{


}
		
	  }

$ret='1';
$booking_id=filter_input(INPUT_GET, 'booking_id'); 
$stmt = $conn->prepare('UPDATE store_bookings SET ret = :ret WHERE booking_id = :booking_id');
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	 
$stmt->execute();

 if($stmt)
	{

		{


}
		
	  }


if (!$stmt) {
  echo "An error occured.\n";
 exit;
}

 

$denied='report_late_all.php?date_string='.$_GET['date_string'];
header('Location: '. $denied, false);
exit;

 ?>



</BODY>
</HTML>