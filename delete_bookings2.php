<?php 

include('staff_check.php'); 
include('pdo.php');
 
	 ?>
<head>

<TITLE>eLearning store</TITLE>




</head>

<body>

     
 

<?php 

$booking_id=filter_input(INPUT_GET, 'booking_id');	// new Nov 2023	
try {		
$stmt = $conn->prepare('DELETE FROM store_bookings WHERE booking_id = :booking_id');   //".$_SERVER["REMOTE_USER"]."
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_STR);	
$stmt->execute();
}
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}	
//if (!$stmt) {
  //echo "An error occured.\n";
 //exit;
//}

$refresh="change_booking_request.php";
header('Location: '. $refresh, false);
exit;

 ?>


</body>
</html>
