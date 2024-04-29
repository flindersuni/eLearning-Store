<?php 
session_start();
include('staff_check.php');
//include('bootstrap/boot1_ehlstore_bookings.html');
include('pdo.php');  

	 ?>


<HTML><HEAD>
<TITLE>eLearning store</TITLE>



</HEAD>



      
<!--  body begins GF -->
  <?php 
//unset($_SESSION['start_date_status']);
if ($_SESSION['skip']==yes) {

} 
else {//else
$_SESSION['item']=$_POST['item'];
$_SESSION['time_A']=$_POST['time_A'];
$_SESSION['time_B']=$_POST['time_B'];
$_SESSION['barcode']=$_POST['barcode'];
$_SESSION['start_date'] = $_POST['Y'].".".$_POST['n'].".".$_POST['day'];
$_SESSION['comments']=$_POST['comments'];
$_SESSION['internet']=$_POST['internet'];
$_SESSION['ext_cord']=$_POST['ext_cord'];
$_SESSION['setup_location']=$_POST['setup_location'];
$_SESSION['store_location']=$_POST['store_location'];
	
$end_date=$_POST['end_date'];
$end_date_exp=explode("-",$end_date);
$_SESSION['end_day']=$end_date_exp[2];//these numbers were reversed 18-8-11 (day and year)! 
$_SESSION['end_month']=$end_date_exp[1];
$_SESSION['end_year']=$end_date_exp[0];
//echo "end date =".$end_date;
//echo "end day =".$_SESSION['end_day'];

$_SESSION['start_date_string']=mktime(0,0,0,$_POST['n'],$_POST['day'],$_POST['Y']);
//echo $_SESSION['start_date_string'];
//exit;
//}

//$end_date_string=strtotime("$end_date");
if ($_SESSION['end_day']==NULL) {
$_SESSION['end_date_string']=000000;
}else {
//$_SESSION["end_date_string"]=mktime(0,0,0,$_SESSION['end_month'],$_SESSION['end_day'],$_POST['Y']);
$_SESSION['end_date_string']=mktime(0,0,0,$_SESSION['end_month'],$_SESSION['end_day'],$_SESSION['end_year']);
//echo $end_date_string;
}

$_SESSION['next_day']=$_POST['day'];

$_SESSION['day']=$_POST['day'];
$_SESSION['n']=$_POST['n'];
$_SESSION['Y']=$_POST['Y'];

}//end else



//echo $_SESSION["skip"];//test

echo "<p>start string=".$_SESSION['start_date_string'];///test
echo "<br>end string=".$_SESSION['end_date_string'];/// test
echo "<p>";/// test





if ($_SESSION['start_date_string']<=$_SESSION['end_date_string'])                         { //loop A	



## select all FULL DAY bookings including start_date #################################################################
$sql="SELECT * FROM store_bookings WHERE barcode='".$_SESSION['barcode']."' AND status ='B' ORDER BY booking_id DESC";
$result = $conn->query($sql);  //new sql
	
	
while($row = $result->fetch_assoc()) {
$date_1=$row["date_1"];
$date_2=$row["date_2"];	
	//count 2b
//$row = pg_fetch_array($result);	
	
$date_1a=$date_1;
$date_1_exp=explode(".",$date_1a);
$date_1_string=mktime(0, 0, 0, "".$date_1_exp[1]."", "".$date_1_exp[2]."", "".$date_1_exp[0]."");

$date_2a=$date_2;
$date_2_exp=explode(".",$date_2a);
$date_2_string=mktime(0, 0, 0, "".$date_2_exp[1]."", "".$date_2_exp[2]."", "".$date_2_exp[0]."");	
	

//loop ZZ  -   check if it's booked that day
if (  
($date_1_string<$_SESSION['start_date_string']&&$date_2_string>$_SESSION['start_date_string'])  // ---|---
||
($date_1_string==$_SESSION['start_date_string']) //   |----
||
($date_2_string==$_SESSION['start_date_string']) //   ----|

)  
                                                                    
{//loop zz

$start_date_exp=explode(".",$_SESSION['start_date']);
$start_date_reverse=$start_date_exp[2]."-".$start_date_exp[1]."-".$start_date_exp[0];



$sql3="SELECT * FROM store_items WHERE barcode='".$_SESSION['barcode']."'";
$result3 = $conn->query($sql3);  //new sql
while($row3 = $result3->fetch_assoc()) {
$item3=$row3['item'];
$description3=$row3['description'];	
}


$_SESSION['start_date_status'][]="Your booking not done for <strong>".$start_date_reverse."</strong>. Item ".$item3." (".$description3.") is already booked all day.";
//setcookie("start_date_status][]","Your booking not done for <strong>".$start_date_reverse."</strong>. Item is already booked all day.");
//$_SESSION["start_date_status"][]=$start_date_status;

$_SESSION['next_day']=$_SESSION['next_day']+7;
$_SESSION['start_date_string']=mktime(0, 0, 0, $_SESSION['n']  , $_SESSION['next_day'], $_SESSION['Y']);
$_SESSION['start_date']=date("Y.m.d", $_SESSION['start_date_string']);
$_SESSION['skip']=yes;



$denied='hour_bookings_recurring_do.php';
header('Location: '. $denied, false);
exit;
}//loop zz
                                                                    }//count 2B	
#####################################################################################################################################	
	
	
/*	
//echo $sql;
//echo "<p>nrows=".$nrows;
//exit;

// loop z  - if not	booked that day, book it
if (!$nrows)                            { // loop z
///////////////////////////////////////////////////
$sql="INSERT INTO store_bookings (barcode, status, date_1, date_2, booking_date, hourly_booking, hourly_status, time_1, time_2, fan, internet, ext_cord, powerboard, setup, setup_location, comments, p_up, ret) VALUES ('".$_SESSION['barcode']."', 'P', '".$_SESSION['start_date']."', '".$_SESSION['start_date']."', '".date("Y.m.d")."', '".$_SESSION['start_date']."', 'B', '".$_SESSION['time_A']."', '".$_SESSION['time_B']."', '$auth_user', '".$_POST['internet']."', '".$_POST['ext_cord']."', '".$_POST['powerboard']."', '".$_POST['setup']."', '".$_POST['setup_location']."', '".$_POST['comments']."','0','0')";

//echo $item;
$result = pg_query($dbcon, $sql);
//$start_day=start_day+7;
pg_close;


 ////////////////////////////////////////////////

$_SESSION['next_day']=$_SESSION['next_day']+7;
$_SESSION['start_date_string']=mktime(0, 0, 0, $_SESSION['n']  , $_SESSION['next_day'], $_SESSION['Y']);
$_SESSION['start_date']=date("Y.m.d", $_SESSION['start_date_string']);
$_SESSION['skip']=yes;

$refresh='hour_bookings_recurring_do.php';
header('Location: '. $refresh, false);
exit;
                                     }  // loop z  - book it





*/
###############





## select all part bookings for start_date ///////////////////////////////////////////
$sql="SELECT * FROM store_bookings WHERE barcode='".$_SESSION['barcode']."' AND hourly_booking='".$_SESSION['start_date']."'";
$result = $conn->query($sql);  //new sql;

// loop y  - if not	booked that day, book it
if (!$result)                            { 

$sql="INSERT INTO store_bookings (barcode, status, date_1, date_2, booking_date, hourly_booking, hourly_status, time_1, time_2, fan, internet, ext_cord, powerboard, setup, setup_location, store_location, comments, p_up, ret) VALUES ('".$_SESSION['barcode']."', 'P', '".$_SESSION['start_date']."', '".$_SESSION['start_date']."', '".date("Y.m.d")."', '".$_SESSION['start_date']."', 'B', '".$_SESSION['time_A']."', '".$_SESSION['time_B']."', '".$_SERVER["REMOTE_USER"]."', '".$_SESSION['internet']."', '".$_SESSION['ext_cord']."', '".$_POST['powerboard']."', '".$_POST['setup']."', '".$_SESSION['setup_location']."', '".$_SESSION['store_location']."', '".$_SESSION['comments']."','0','0')";
$result = $conn->query($sql);  //new sql;
//echo $item;
//$result = pg_query($dbcon, $sql);
//$start_day=start_day+7;
pg_close;



$_SESSION['next_day']=$_SESSION['next_day']+7;
$_SESSION['start_date_string']=mktime(0, 0, 0, $_SESSION['n']  , $_SESSION['next_day'], $_SESSION['Y']);
$_SESSION['start_date']=date("Y.m.d", $_SESSION['start_date_string']);
$_SESSION['skip']=yes;

$refresh='hour_bookings_recurring_do.php';
header('Location: '. $refresh, false);
exit;
                                     }  // loop y  - book it

////////////////////////////////////////////////////////////////////////////////////


## if hour bookings that day, check all hour bookings ------------------------------------------------------------------
$sql="SELECT * FROM store_bookings WHERE barcode='".$_SESSION['barcode']."' AND hourly_booking='".$_SESSION['start_date']."'";
$result = $conn->query($sql);  //new sql 
	
while($row = $result->fetch_assoc()) {
//{ //count 2a
//$row = pg_fetch_array($result);	
$time_1=$row['time_1'];	
$time_2=$row['time_2'];

//loop B  -   check if it's booked at that time period
if (  
($_SESSION['time_A']<$time_1&&$_SESSION['time_B']>$time_2)  // ---|---|---
||
($_SESSION['time_A']>$time_1&&$_SESSION['time_A']<$time_2&&$_SESSION['time_B']>$time_1&&$_SESSION['time_B']<$time_2) //   | - |
||
($_SESSION['time_A']>=$time_1&&$_SESSION['time_A']<=$time_2) // | -|---  this line not working
||
($_SESSION['time_B']>=$time_1&&$_SESSION['time_B']<=$time_2) // ---|- |  this line not working
||
($_SESSION['time_A']==$time_1||$_SESSION['time_B']==$time_2) // |---|  etc

)  
                                                                    
																	{//loop B
// make this bit a function
$start_date_exp=explode(".",$_SESSION['start_date']);
$start_date_reverse=$start_date_exp[2]."-".$start_date_exp[1]."-".$start_date_exp[0];

$sql2="SELECT * FROM store_items WHERE barcode='".$_SESSION['barcode']."'";
$result2 = $conn->query($sql2);  //new sql 
while($row2 = $result2->fetch_assoc()) {
$item=$row2['item'];
$description=$row2['description'];	
}


$_SESSION['start_date_status'][]="Your booking not done for <strong>".$start_date_reverse."</strong>. Item ".$item2." (".$description2.") is already booked in that time period on that day.";
//setcookie("start_date_status][]","Your booking not done for <strong>".$start_date_reverse."</strong>. Item is already booked in that time period on that day.");
//$_SESSION["start_date_status"][]=$start_date_status;

$_SESSION['next_day']=$_SESSION['next_day']+7;
$_SESSION['start_date_string']=mktime(0, 0, 0, $_SESSION['n']  , $_SESSION['next_day'], $_SESSION['Y']);
$_SESSION['start_date']=date("Y.m.d", $_SESSION['start_date_string']);
$_SESSION['skip']=yes;



$denied='hour_bookings_recurring_do.php';
header('Location: '. $denied, false);
exit;

                                                                    }//loop B
}//count 2a
                                                                    
#------------------------------------------------------------------------------------------------------------------------
//echo $_SESSION['time_A'];
//echo $_SESSION['time_B'];
//exit;																				
// -   if not booked that time period, book it /////////////////////////////////////////////////////////////////////////

$sql="INSERT INTO store_bookings (barcode, status, date_1, date_2, booking_date, hourly_booking, hourly_status, time_1, time_2, fan, internet, ext_cord, powerboard, setup, setup_location, store_location, comments, p_up, ret) VALUES ('".$_SESSION['barcode']."', 'P', '".$_SESSION['start_date']."', '".$_SESSION['start_date']."', '".date("Y.m.d")."', '".$_SESSION['start_date']."', 'B', '".$_SESSION['time_A']."', '".$_SESSION['time_B']."', '".$_SERVER["REMOTE_USER"]."', '".$_SESSION['internet']."', '".$_POST['ext_cord']."', '".$_POST['powerboard']."', '".$_POST['setup']."', '".$_SESSION['setup_location']."', '".$_SESSION['store_location']."', '".$_SESSION['comments']."','0','0')";
$result = $conn->query($sql);  //new sql;

//echo $item;
//$result = pg_query($dbcon, $sql);
//$start_day=start_day+7;
pg_close;


$_SESSION['next_day']=$_SESSION['next_day']+7;
$_SESSION['start_date_string']=mktime(0, 0, 0, $_SESSION['n']  , $_SESSION['next_day'], $_SESSION['Y']);
$_SESSION['start_date']=date("Y.m.d", $_SESSION['start_date_string']);
$_SESSION['skip']=yes;
	
$denied='hour_bookings_recurring_do.php';
header('Location: '. $denied, false);	
exit;                                                                                            }//loop A
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//exit;																							 
$refresh="hour_bookings.php?barcode=".$_SESSION['barcode']."&Y=".$_SESSION['Y']."&n=".$_SESSION['n']."&day=".$_SESSION['day']."&booked=yes";
header('Location: '. $refresh, false);
//session_destroy();
$_SESSION['skip']=NULL;
exit;																							 
																							 
?>

</BODY>
</HTML>
