<?php 

include('staff_check.php'); 
include('pdo.php'); 
	
 
	 ?>
<head>

<TITLE>eLearning store</TITLE>




</head>

<body>

     
 

<h4>Delete this item? </h4>

  <?php 

//$booking_id=$_GET['booking_id']; // old Nov 2023
$booking_id=filter_input(INPUT_GET, 'booking_id');	// new Nov 2023	
try {	
$stmt = $conn->prepare('DELETE FROM store_bookings WHERE booking_id = :booking_id');   //".$_SERVER["REMOTE_USER"]."
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
}
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}	
//if (!$stmt) {
  //echo "An error occured.\n";
 //exit;
//}

$refresh="checkout.php";
header('Location: '. $refresh, false);
exit;

 ?>


</body>
</html>