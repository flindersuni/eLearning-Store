<?php 

session_start();
if 
($_POST['time_A'] == "---start time---" | $_POST['time_B'] == "---end time---")//if start time not selected

{

echo "<span class='style1'>Error - you haven't picked a start time or end time<br>";
echo "Press your browser's 'back' button and pick some different times, then try again.";
exit;
}


if ($_POST['recurring']=='yes')
{

$denied='hour_bookings_recurring.php?barcode='.$_SESSION['barcode'].'&Y='.$_SESSION['Y'].'&n='.$_SESSION['n'].'&day='.$_SESSION['day'].'';
		
//$_SESSION['time_A']=$_POST['time_A'];
$_SESSION['time_A']=filter_input(INPUT_POST, 'time_A'); /// new Nov 2023		
//$_SESSION['time_B']=$_POST['time_B'];
$_SESSION['time_B']=filter_input(INPUT_POST, 'time_B'); /// new Nov 2023	
//$_SESSION['time_B+']=$_POST['time_B']+1;
$_SESSION['time_B']=filter_input(INPUT_POST, 'time_B'+1); /// new Nov 2023		
//$_SESSION['comments']=$_POST['comments'];
$_SESSION['comments']=filter_input(INPUT_POST, 'comments'); /// new Nov 2023		
//$_SESSION['setup_location']=$_POST['setup_location'];
$_SESSION['setup_location']=filter_input(INPUT_POST, 'setup_locations'); /// new Nov 2023		
//$_SESSION['store_location']=$_POST['store_location'];
$_SESSION['store_location']=filter_input(INPUT_POST, 'store_location'); /// new Nov 2023		
//$_SESSION['internet']=$_POST['internet'];
$_SESSION['internet']=filter_input(INPUT_POST, 'internet'); /// new Nov 2023		
//$_SESSION['ext_ord']=$_POST['ext_cord'];
$_SESSION['ext_cord']=filter_input(INPUT_POST, 'ext_ord'); /// new Nov 2023		
header('Location: '. $denied, false);

exit;
}
else
{
}
include('staff_check.php'); 
include('pdo.php'); 

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML><HEAD>
<TITLE>eLearning store</TITLE>
<?php

// show error if booking non-contiguous
//$item=$_POST['item'];
$item=filter_input(INPUT_POST, 'item'); /// new Dec 2023	
//$date_query =  $_POST['Y'].".".$_POST['n'].".".$_POST['day'];
$date_query['setup_location']=filter_input(INPUT_POST, 'Y').".".filter_input(INPUT_POST, 'n').".".filter_input(INPUT_POST, 'day'); /// new Nov 2023		
//$barcode=$_POST['barcode'];		
$barcode['ext_cord']=filter_input(INPUT_POST, 'barcode'); /// new Nov 2023	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE barcode= :barcode AND hourly_booking = :date_query ORDER BY booking_id DESC'); 	
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmt->bindParam(':date_query', $date_query, PDO::PARAM_STR);  
$stmt->execute();
	
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$time_1=$row['time_1'];
$time_2=$row['time_2'];	

	
		
if ($_POST['time_A']<$time_1&&$_POST['time_B']>$time_2)//if its booked
{

$denied='booking_error_time.php';
header('Location: '. $denied, false);
exit;
}
}

if 

//($_POST['time_A'] > $_POST['time_B'])//if start time is later than end time
(filter_input(INPUT_POST, 'time_A') > filter_input(INPUT_POST, 'time_A'))//if start time is later than end time	

{


$denied='booking_error_time3.php';
header('Location: '. $denied, false);
exit;
}
else if 

//($_POST['time_A'] == "---start time---" | $_POST['time_B'] == "---end time---")//if start time not selected
(filter_input(INPUT_POST, 'time_A') == "---start time---" | filter_input(INPUT_POST, 'time_B') == "---end time---")//if start time not selected
{

$denied='booking_error_time2.php';
header('Location: '. $denied, false);
exit;
//exit;

}


?>
</HEAD>
<BODY BGCOLOR="#FFFFFF" MARGINHEIGHT="0" MARGINWIDTH="0" LEFTMARGIN="0" TOPMARGIN="0">
<?php //include($pagedetails['header']);
//$booked_day1 = $_POST['day'];
//$booked_day=$_POST['Y'].".".$_POST['n'].".".$_POST['day'];
$booked_day=filter_input(INPUT_POST, 'Y').".".filter_input(INPUT_POST, 'n').".".filter_input(INPUT_POST, 'day'); /// new Nov 2023	
//$barcode=$_POST['barcode'];
$barcode=filter_input(INPUT_POST, 'barcode'); /// new Nov 2023		
$status='P';
$date_1=$booked_day;
$date_2=$booked_day;
$booking_date=date("Y.m.d");	
$hourly_booking=$booked_day;
$hourly_status='B';
//$time_1=$_POST['time_A'];
$time_1=filter_input(INPUT_POST, 'time_A'); // new Dec 2023		
//$time_2=$_POST['time_B'];
$time_2=filter_input(INPUT_POST, 'time_B'); // new Dec 2023		
$fan='fili0008' ;//$_SERVER["REMOTE_USER"]; 
//$internet=$_POST['internet'];
$internet=filter_input(INPUT_POST, 'internet'); // new Dec 2023		
//$ext_cord=$_POST['ext_cord'];
$ext_cord=filter_input(INPUT_POST, 'ext_cord'); // new Dec 2023			
//$powerboard=$_POST['powerboard'];
$powerboard=filter_input(INPUT_POST, 'powerboard'); // new Dec 2023			
//$setup=$_POST['setup'];	
$setup=filter_input(INPUT_POST, 'setup'); // new Dec 2023			
//$setup_location=$_POST['setup_location'];
$setup_location=filter_input(INPUT_POST, 'setup_location'); // new Dec 2023			
//$store_location=$_POST['store_location'];
$store_location=filter_input(INPUT_POST, 'store_location'); // new Dec 2023		
//$comments=$_POST['comments'];
$comments=filter_input(INPUT_POST, 'comments'); // new Dec 2023		
$p_up='0';
$ret='0';	
$stmt = $conn->prepare('INSERT INTO store_bookings (barcode, status, date_1, date_2, booking_date, hourly_booking, hourly_status, time_1, time_2, fan, internet, ext_cord, powerboard, setup, setup_location, store_location, comments, p_up, ret) VALUES (:barcode, :status, :date_1, :date_2, :booking_date, :hourly_booking, :hourly_status, :time_1, :time_2, :fan, :internet, :ext_cord, :powerboard, :setup, :setup_location, :store_location, :comments, :p_up, :ret)'); 
	
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmt->bindParam(':status', $status, PDO::PARAM_STR);
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':booking_date', $booking_date, PDO::PARAM_STR);
$stmt->bindParam(':hourly_booking', $hourly_booking, PDO::PARAM_STR);
$stmt->bindParam(':hourly_status', $hourly_status, PDO::PARAM_STR);		
$stmt->bindParam(':time_1', $time_1, PDO::PARAM_STR);
$stmt->bindParam(':time_2', $time_2, PDO::PARAM_STR);
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);
$stmt->bindParam(':internet', $internet, PDO::PARAM_STR);
$stmt->bindParam(':ext_cord', $ext_cord, PDO::PARAM_STR);
$stmt->bindParam(':powerboard', $powerboard, PDO::PARAM_STR);
$stmt->bindParam(':setup', $setup, PDO::PARAM_STR);	
$stmt->bindParam(':setup_location', $setup_location, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':comments', $comments, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);			
$stmt->execute(); 	

if (!$stmt) {
  echo "An error occured.\n";
  exit;
}


//$refresh="hour_bookings.php?barcode=".$_POST['barcode']."&Y=".$_POST['Y']."&n=".$_POST['n']."&day=".$_POST['day']."&booked=yes";  //old Dec 23
$refresh="hour_bookings.php?barcode=".filter_input(INPUT_POST, 'barcode')."&Y=".filter_input(INPUT_POST, 'Y')."&n=".filter_input(INPUT_POST, 'n')."&day=".filter_input(INPUT_POST, 'day')."&booked=yes"; //newDec 23	
//$refresh="hour_bookings.php?barcode=".filter_input(INPUT_POST, 'barcode')."&Y=".filter_input(INPUT_POST, 'Y')."&day=".filter_input(INPUT_POST, 'day')."&booked=yes"; // new Dec 2023		
header('Location: '. $refresh, false);
exit;



 ?>

</BODY>
</HTML>