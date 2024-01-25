<?php 

	include('staff_check.php');
    include ('pdo.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML><HEAD>
<TITLE>eLearning store</TITLE>
<?php
	//include($pagedetails['javascript']); 
// show error if booking non-contiguous
$barcode=filter_input(INPUT_POST, 'barcode'); /// new Nov 2023		
$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE barcode= :barcode');
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);		
$stmt->execute(); 	
	
	
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
$date_1=$row['date_1'];	
$date_2=$row['date_2'];
	
$date_A=filter_input(INPUT_POST, 'date_A'); /// new Nov 2023
$date_B=filter_input(INPUT_POST, 'date_B'); /// new Nov 2023	
//if ($_POST['date_A']<$date_1&&$_POST['date_B']>$date_2)//if its booked //old	
if ($date_A<$date_1&&$date_B>$date_2)//if its booked
{

$denied='booking_error.php';
header('Location: '. $denied, false);
exit;
}
}
if ($date_B=='- NEXT MONTH -') {  //new Nov 2023
	
$n=filter_input(INPUT_POST, 'n'); /// new Nov 2023	
$Y=filter_input(INPUT_POST, 'Y'); /// new Nov 2023		
$Y_next=$Y;
$next=($n+1);
if ($next>12) {
$next=$next-12;
$Y_next=$Y+1;
}
$denied="bookings.php?barcode=".$_POST['barcode']."&Y=".$Y_next."&n=".$next."&date_A=".$_POST['date_A']."&span=yes";
header('Location: '. $denied, false);
exit;
}
if 

($date_A == "---start date---" | $date_B == "---end date---")//if start date not selected

{

$denied='booking_error2.php';
header('Location: '. $denied, false);
exit;
}


else if
($date_A > $date_B)//if start date is later than end date

{


$denied='booking_error3.php';
header('Location: '. $denied, false);
exit;
}

//exit;


	
?>
</HEAD>
<BODY BGCOLOR="#FFFFFF" MARGINHEIGHT="0" MARGINWIDTH="0" LEFTMARGIN="0" TOPMARGIN="0">
<?php //include($pagedetails['header']);



$barcode=filter_input(INPUT_POST, 'barcode'); /// new Nov 2023		
$status='B';
$date_1=filter_input(INPUT_POST, 'date_A'); /// new Nov 2023		
$date_2=filter_input(INPUT_POST, 'date_B'); /// new Nov 2023	
$booking_date=date("Y.m.d");
$fan='fili0008'; //$_SERVER["REMOTE_USER"]
$setup_location=filter_input(INPUT_POST, 'setup_location'); /// new Nov 2023	
$store_location=filter_input(INPUT_POST, 'store_location'); /// new Nov 2023	
$comments=$_POST['comments'];
$p_up='0';
$ret='0';	
$stmt = $conn->prepare('INSERT INTO store_bookings (barcode, status, date_1, date_2, booking_date, fan, setup_location, store_location, comments, p_up, ret) VALUES (:barcode, :status, :date_A, :date_B, :booking_date, :fan, :setup_location, :store_location, :comments,:p_up, :ret)');
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->bindParam(':date_A', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':date_B', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':booking_date', $booking_date, PDO::PARAM_STR);
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);
$stmt->bindParam(':setup_location', $setup_location, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':comments', $comments, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_STR);
$stmt->bindParam(':ret', $ret, PDO::PARAM_STR);			
$stmt->execute(); 	

if (!$stmt) {
  echo "An error occured.\n";
  exit;
}


 
$refresh="bookings.php?barcode=".$_POST['barcode']."&Y=".$_POST['Y']."&n=".$_POST['n']."&booked=yes";
header('Location: '. $refresh, false);
exit;

?>

</BODY>
</HTML>