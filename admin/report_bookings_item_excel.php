<?php 

include('staff_admin_check.php'); 
//include('database_connect2.php');
//include('ldap_connect2.php');
$barcode=$_GET['barcode'];
$todays_date=date('Y').".".date('n').".".date('d');
//echo $barcode;
//exit;
$sql="SELECT * FROM store_bookings WHERE barcode='$barcode' ORDER BY booking_id DESC";
	$result = pg_query($sql);
	$nrows = pg_numrows($result);

$filename = "eLearning store booking history_".$barcode."_data_" . date('d-M-Y') . ".xls"; 
header("Content-Disposition: attachment; filename=\"$filename\""); 
header("Content-Type: application/vnd.ms-excel"); 
echo "Booked from";
echo "\t";
echo "Booked to";
echo "\t";
echo "Time out";
echo "\t";
echo "Return";
echo "\t";
echo "Booking date";
echo "\t";
echo "Equipment";
echo "\t";
echo "Name";
echo "\t";
echo "Comments";
echo "\n";
for($j=0;$j<$nrows;$j++)
       {
			$row = pg_fetch_array($result);
			
$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//		
echo  $e_date_1;
echo "\t";

$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//
echo  $e_date_2;
echo "\t";		
echo  $row['time_1'];
echo "\t";
echo $row['time_2'];
echo "\t";
$booking_date_exp=explode(".",$row['booking_date']);//reverse date 2
$e_booking_date=$booking_date_exp[2].".".$booking_date_exp[1].".".$booking_date_exp[0];//
echo $e_booking_date;//show reversed booking date
echo "\t";
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];
$comments=$row['comments'];
$sql2="SELECT item,cat_id FROM store_items  WHERE barcode = '$barcode'";
//echo $sql3;
//exit;

	$result2 = pg_query($sql2);
	$nrows2 = pg_numrows($result2);	
	$row = pg_fetch_array($result2);
	
$item=$row['item'];
$cat=$row['cat_id'];
$sql3="SELECT category FROM store_category  WHERE cat_id = '$cat'";
//echo $sql3;
//exit;

	$result3 = pg_query($sql3);
	$nrows3 = pg_numrows($result3);	
	$row = pg_fetch_array($result3);
echo $row['category'];
echo $item;
echo "\t";
$sql4="SELECT first_name,last_name FROM store_staff  WHERE fan_id = '$fan_d'";
//echo $sql3;
//exit;

	$result4 = pg_query($sql4);
	$nrows4 = pg_numrows($result4);	
	$row = pg_fetch_array($result4);
echo $row['first_name']." ".$row['last_name'];
echo "\t";
echo $comments;
echo "\n";
//$result = pg_query($dbcon, $sql);
//$result2 = pg_query($dbcon, $sql2);
//$result2 = pg_query($dbcon, $sql2);

       }
	
$result = pg_query($dbcon, $sql);
//$result2 = pg_query($dbcon, $sql2);
$result2 = pg_query($dbcon, $sql2);
pg_close;


 ?>



