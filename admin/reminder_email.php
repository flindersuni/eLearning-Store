

<?php 
require('staff_admin_check.php'); 


$barcode=filter_input(INPUT_GET, 'barcode'); /// new Nov 2023	
$stmt6 = $conn->prepare('SELECT * FROM store_items WHERE barcode= :barcode');
$stmt6->bindParam(':barcode', $barcode, PDO::PARAM_INT);	
$stmt6->execute(); 

while ($row6 = $stmt6->fetch(PDO::FETCH_ASSOC)) {		
$store_location=$row6['store_location'];
                                       }
///
//$sql7="SELECT * FROM store_images  WHERE barcode = '".$_GET['barcode']."'";
//	$result7 = pg_query($sql7);
//	$nrows7 = pg_numrows($result7);	
//	$row7 = pg_fetch_array($result7);
///
///// new bit for colleges 7-11-19
switch ($store_location) {
case 'b':  
	$store_name  = "BGL";
	$store_location  = "LWCM Rm 313";
   break; 
case 'c':  
	$store_name  = "CENTRAL";
	$store_location  = "Engineering Rm 470";	
   break;
case 'e':  
	$store_name  = "EPSW";
	$store_location  = "Education Rm 3.16";	
   break;
case 'h':  
	$store_name  = "HASS";
	$store_location  = "Humanities Rm 269";
   break;		
 case 'm':  
	$store_name  = "MPH";
	$store_location  = "Health Sciences 5.15";
   break;
 case 'n':  
	$store_name  = "NHS";
	$store_location  = "Sturt West W401";
   break;
case 's':  
	$store_name  = "SE";
	$store_location  = "Engineering Rm 4.63";	
   break;		
   }
//// 

$email=filter_input(INPUT_GET, 'fan')."@flinders.edu.au";
//$name=$row['first_name']." ".$row['last_name'];
// Send HTML email to TAPS

$to = $email;
$subject = "Late item from eLearning equipment store";
$body = "
<body bgcolor='#e0efff'>
Dear  " .$_GET['first_name'].",<p><p>
<p>The following equipment that you borrowed from the ".$store_name." branch of the eLearning store is now late.<br>
Could you please return the equipment to ".$store_location." as soon as possible?<p>
<p><strong>
".$_GET['category']." ".$_GET['item']."<br> 
(booked from ".$_GET['date1']." until ".$_GET['date2'].")</strong></p>






<p>Regards<br>
".$store_name." eLearning Team</p>";

$body .= "</ul>\n";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= 'From:   ' . "donotreply@flinders.edu.au \r\n";
//$headers .= 'Reply-To: ' . "".$_POST['email']." . \r\n" ;
//echo $to;
//echo $body;
mail($to, $subject, $body, $headers);




/// add date to reminder column
$date_string =mktime(0, 0, 0);
$date=date("Y.m.d", $date_string);
$date_exp=explode(".",$date);//reverse date 
$e_date=$date_exp[2].".".$date_exp[1].".".$date_exp[0];//


$booking_id=filter_input(INPUT_GET, 'booking_id'); /// new Nov 2023	
$stmt3 = $conn->prepare('SELECT setup FROM store_bookings  WHERE booking_id = :booking_id');
$stmt3->bindParam(':booking_id', $booking_id, PDO::PARAM_INT); 
$stmt3->execute();


while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {	
                                     
$count=$row3['setup'];
$new_count=$count+1;
 }


$powerboard=$e_date;
$setup=$new_count;
$booking_id = $_GET['booking_id'];	
$stmt = $conn->prepare('UPDATE store_bookings SET powerboard = :powerboard, setup = :setup  WHERE booking_id = :booking_id');
$stmt->bindParam(':powerboard', $p_up, PDO::PARAM_STR);
$stmt->bindParam(':setup', $setup, PDO::PARAM_STR);
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	 
$stmt->execute();




 if(!$stmt)
	{

	{



}
		
	  }
	
	


echo "Reminder email has been sent to ".$name."<p>";
// change this to redirect back to report_late_all.php
$return='report_late_all.php';

header('Location: '. $return, false);
exit;
  ?>