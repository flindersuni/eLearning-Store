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
;


}
		
	  }
	
$booking_id=filter_input(INPUT_GET, 'booking_id'); 	
$stmt = $conn->prepare('SELECT ret FROM store_bookings  WHERE booking_id=:booking_id');
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT); 
$stmt->execute();
	
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
$ret=$row['ret'];	 
 }
	
	if ($ret=='1')
	{
	$new_ret='0';
	}
	else
	{ 
	$new_ret='1';
	}

	
	

$ret=$new_ret;
$booking_id=filter_input(INPUT_GET, 'booking_id'); 		
$stmt = $conn->prepare('UPDATE store_bookings SET ret = :ret WHERE booking_id = :booking_id');
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	 
$stmt->execute();

 if($smt)
	{

		{



}
		
	  }


if (!$stmt) {
  echo "An error occured.\n";
 exit;
}

 
$denied='report_returns_today.php?date_string='.$_GET['date_string'];
header('Location: '. $denied, false);
exit;

 ?>

</BODY>
</HTML>