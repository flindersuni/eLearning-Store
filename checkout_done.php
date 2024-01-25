
    
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
include('staff_check.php');                        ///to fix
require('admin/staff_admin_check.php'); 

?>
<title>Booking completed</title>

</head>
<body>

      <!-- Static navbar -->
<?php include('bootstrap/nav_ehlstore_bookings.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <?php include('bootstrap/sidebar_ehlstore_bookings.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
    <div class="col-md-8">
<!--  body begins GF --> 

<?php     
include ('pdo.php');
  
//$date_query=$_POST['booked_day'];
$todays_date=date('Y').".".date('m').".".date('d');
$todays_date_exp=explode(".",$todays_date);//reverse date 
$e_todays_date=$todays_date_exp[2]."-".$todays_date_exp[1]."-".$todays_date_exp[0];//

$fan=$_SERVER["REMOTE_USER"]; 
//$fan=filter_input(INPUT_SERVER, 'REMOTE_USER');	// new Dec 2023			
$booking_date=$todays_date; 

try{		
$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE fan= :fan AND booking_date= :booking_date ORDER BY booking_id DESC');
$stmt->bindParam('fan', $fan, PDO::PARAM_STR);
$stmt->bindParam('booking_date', $booking_date, PDO::PARAM_STR);		
$stmt->execute(); 
}
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}		
/////////		
echo "<h4> Thank you for using the eLearning store.</h4>";
echo  "<p>An email has been sent to you confirming your order!</p>";


$barcode = 	$row['barcode'];

if (!$stmt) {                                       //fix
  echo "An error occured.\n";
  exit;
  }

if ($_SERVER["REMOTE_USER"]!=$real_fan){                                                //if ($_SERVER["REMOTE_USER"]!=$real_fan){
//$subject .= "(proxy booked by ".$_SERVER["email"].")"; 	
$title = "eLearning store booking (booked by ".$_SERVER["firstName"]." ".$_SERVER["lastName"].")"; 	
}else
{$title="eLearning store booking";		}
		


//Send HTML email to someone 

$fan_id=$_SERVER["REMOTE_USER"]; //$_SERVER["REMOTE_USER"]
//$fan_id=filter_input(INPUT_SERVER, 'REMOTE_USER');	// new Dec 2023				
$booking_date=$todays_date; 		
$stmt4 = $conn->prepare('SELECT * FROM store_staff WHERE fan_id= :fan_id ');
$stmt4->bindParam('fan_id', $fan_id, PDO::PARAM_STR);		
$stmt4->execute(); 	
		
		
		
while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {	
$first_name=$row4['first_name'];	 
$last_name=$row4['last_name'];
$email=$row4['email'];	
 }

$to = "".$email.";".$college_email;
$subject = "eLearning store booking (".$first_name." ".$last_name.")"; 
$body = "
<body>

<h2>".$title."</h2>
<p>Confirmation of your booking(s) for <strong>$e_todays_date</strong>:<p>
<table border=1 cellspacing=0 cellpadding=4>
<td colspan='2' align='center' bgcolor='#F1F1F1'><b>EQUIPMENT</b> </td>
<td colspan='4' align='center' bgcolor='#F1F1F1'><b>BOOKING</b>  </td>



<td align='center' bgcolor='#F1F1F1'><b>PICKUP LOCATION </b></td>

</tr>";
///new
$body.="
<td align='center' bgcolor='#E7E7E7'><b>Category</b></td><td align='center' bgcolor='#E7E7E7'><b>Item</b></td>		
<td align='center' bgcolor='#E7E7E7'><b>Date out</b></td><td align='center' bgcolor='#E7E7E7'><b>Date in</b></td><td align='center' bgcolor='#E7E7E7'><b>Time out</b></td><td align='center' bgcolor='#E7E7E7'><b>Time in</b></td>		
<td align='center' bgcolor='#E7E7E7'><b>Store</b></td></tr>
";	
///		
while($row = $result->fetch_assoc()) {
			
			
$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
//print "<td align='center'> ".$e_date_1." </td>";//show reversed date 1

$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//
//print "<td align='center'> ".$e_date_2." </td>";//show reversed date 2

if ($row['time_1']!=NULL)
{
$pickup_time=$row['time_1'].":00";
}else{
$pickup_time=NULL;
}


if ($row['time_2']!=NULL)
{
$return_time=($row['time_2']+1).":00";
}else{
$return_time=NULL;	
}

$hourly_status=$row['hourly_status'];	
	
$body.="";
$barcode = 	$row['barcode'];

$booking_date=$todays_date; 		
$stmt2 = $conn->prepare('SELECT barcode,item,cat_id,store_location FROM store_items  WHERE barcode = :barcode');
$stmt2->bindParam('barcode', $barcode, PDO::PARAM_INT);		
$stmt2->execute(); 	
/////////	
 if($barcode == '955'||$barcode == '46602'||$barcode == '46616')
 {
 $COW_stuff="<strong>If you have booked a COW, Calf or iPad slab please note:<p>

- you will need card swipe access to Edu 3.21 where the devices are stored<br>
- you will need to collect a key from Edu 3.16 to unlock the COW/Calf/iPad slab<br>
  Collect a key on the day if after 9:30am or else please collect a key the day before<br>
  Keys can be returned in the after hours key return box in Edu 3.21 after 5pm</strong>";    
     
 } else {
 
 }
    
//echo $COW_stuff;
//echo "<p>";
//exit;


while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {		
$store_location=$row2['store_location'];	
$item=$row2['item'];
$cat=$row2['cat_id'];
//$store_location=$row['store_location'];
}
switch ($store_location) {
case 'b':  
	$store_location  = "BGL STORE - LWCM 313";
	$colour="#FF8A33";
	$college_email_b="bgl.elearning@flinders.edu.au;";	
   break; 
case 'c':  
	$store_location  = "CENTRAL STORE - Eng 470";
	$colour="#d9534f";
	$college_email_c="portfolio.elearning@flinders.edu.au;";		
   break;
case 'e':  
	$store_location  = "EPSW STORE - Edu 3.16";
	$colour="#555555";
	$college_email_e="epsw.elearning@flinders.edu.au;";		
   break;
case 'h':  
	$store_location  = "HASS STORE - Hums 269";
	$colour="#CA33FF";
	$college_email_h="hass.elearning@flinders.edu.au;";		
   break;		
 case 'm':  
	$store_location  = "MPH STORE - Health Sciences 5.15";
	$colour="#356534";
	$college_email_m="hass.elearning@flinders.edu.au;";		
   break;
 case 'n':  
	$store_location  = "NHS STORE - Sturt South S213";
	$colour="#66BB66";
	$college_email_n="nhs.elearning@flinders.edu.au;";		
   break;
case 's':  
	$store_location  = "SE STORE - Eng 4.63";
	$colour="#3349FF";
	$college_email_s="scieng.elearning@flinders.edu.au;";		
   break;		
   }	
	
	
	



$cat_id=$cat; //$_SERVER["REMOTE_USER"] 		
$stmt3 = $conn->prepare('SELECT category FROM store_category  WHERE cat_id = :cat');
$stmt3->bindParam('cat_id', $cat, PDO::PARAM_STR);	
$stmt3->execute(); 	
/////////	
while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {	
$category=$row3['category'];	 
 }
$body.="<td> ".$category."</td>
<td> ".$item."</td>

<td> ".$e_date_1."</td>";	


if (($e_date_1==$e_date_2)&&($hourly_status=='B'))
{
//$e_date_2=NULL;
$body.="<td></td>";	
}else{
$body.="<td>".$e_date_2."</td>";
}









$body.="
<td> ".$pickup_time."</td>
<td> ".$return_time."</td>
<td><span style='color:".$colour."';><strong>".$store_location."</strong></span></td>
</tr>";
       }
		



//if ($count!=$nrows) {
$body.="

</table>
";
$body.="

<p>".$COW_stuff."";       
$college_email=$college_email_b.$college_email_c.$college_email_e.$college_email_h.$college_email_m.$college_email_n.$college_email_s;
$to .= $college_email;



if ($_SERVER["REMOTE_USER"]!=$real_fan){ //if ($_SERVER["REMOTE_USER"]!=$real_fan){
//$subject .= "(proxy booked by ".$_SERVER["email"].")"; 	
$subject .= "- proxy booked"; 	
}		
		
		
		
$body .= "</ul>\n";
$email="".$email."";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= 'From:   ' . ""; //made it blank
//$headers .= 'Reply-To: ' . "$email . \r\n" ;
mail($to, $subject, $body, $headers);

 ?> 




<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>

