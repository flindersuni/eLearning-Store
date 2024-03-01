
    
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');

	require('admin/staff_admin_check.php'); 

?>
<title>Quick book</title>

</head>
<body>

      
<!--  body begins GF --> 



<h2 align="left">Delete this item?</h2>

  <?php 

$booking_id=$_POST['booking_id'];
//$sql="DELETE FROM store_bookings WHERE booking_id = $booking_id";
	
$stmt = $conn->prepare('DELETE FROM store_bookings WHERE booking_id = :booking_id');   
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	                 //was $_SERVER["REMOTE_USER"]  
$stmt->execute();	
	
//echo $sql;
//exit;
//$result = $conn->query($sql);  //new sql
if (!$stmt) {
  echo "An error occured.\n";
 exit;
}

$refresh="hour_bookings.php?barcode=".$_POST['barcode']."&Y=".$_POST['Y']."&n=".$_POST['n']."&day=".$_POST['day']."";
header('Location: '. $refresh, false);
exit;

 ?>




<!--  body ends GF -->


  </body>
</html>
