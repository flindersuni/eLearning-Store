<?php 

include('staff_admin_check.php'); 

?>


<HTML><HEAD>
<TITLE>eLearning store</TITLE>
<?php

$store_status='0';
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



$booking_id=filter_input(INPUT_GET, 'booking_id'); 		
$stmt = $conn->prepare('SELECT p_up FROM store_bookings  WHERE booking_id=:booking_id');
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT); 
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
$p_up=$row['p_up'];	 
 }	

	if ($p_up=='1')
	{
	$new_p_up='0';
	}
	else
	{ 
	$new_p_up='1';
	}
	


$p_up=$new_p_up;	
$booking_id=filter_input(INPUT_GET, 'booking_id'); 		
$stmt = $conn->prepare('UPDATE store_bookings SET p_up = :p_up WHERE booking_id = :booking_id');
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	 
$stmt->execute();


 if($result)
	{

		{



}
		
	  }


if (!$stmt) {
  echo "An error occured.\n";
 exit;
}


$denied='report_cow_bookings_today.php?date_string='.$_GET['date_string'];
header('Location: '. $denied, false);
exit;

 ?>

</BODY>
</HTML>