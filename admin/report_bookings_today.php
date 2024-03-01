<?php 

include('../bootstrap/boot1_ehlstore.html');
require('staff_admin_check.php'); 
include('pdo.php');	
?>
<head>
<title>eLearning store bookings</title>
</head>
<body>

      <!-- Static navbar -->
<?php include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <?php include('../bootstrap/sidebar_ehlstore.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="container-fluid">
<!--  body begins GF -->
 <?php 

echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-success btn-xs active' href='report_bookings_today.php' role='button'>Bookings</a>";
echo "<a class='btn btn-primary btn-xs' href='report_returns_today.php' role='button'>Returns</a>";
echo "<a class='btn btn-primary btn-xs' href='report_late_all.php' role='button'>Late</a>";
echo "<a class='btn btn-primary btn-xs' href='report_whats_out.php' role='button'>What's out?</a>";
echo "<a class='btn btn-default btn-xs' href='report_cow_bookings_today.php' role='button'>COWs etc</a>";
echo "</div>";




	
	
	
	

$date_string=filter_input(INPUT_GET, 'date_string'); /// new Nov 2023	 

if ($date_string==NULL) {
$date_string =mktime(0, 0, 0);

}
$date=date("Y.m.d", $date_string);	 
$date_exp=explode(".",$date);//reverse date 
$e_date=$date_exp[2]."-".$date_exp[1]."-".$date_exp[0];//

$date2=date("Y.F.j", $date_string);	 	 
$date_exp2=explode(".",$date2);//reverse date 
$e_date2=$date_exp2[2]." ".$date_exp2[1]." ".$date_exp2[0];//

echo "<h4>Bookings for ".date("l", $date_string)." ".$e_date2."</h4>";


$tomorrow_string=($date_string)+86400;
$yesterday_string=($date_string)-86400;

echo "<a class='btn btn-default btn-xs' href='report_bookings_today2_do.php?date_string=".$yesterday_string."' role='button'>Prev day</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today2_do.php?date_string=".$tomorrow_string."' role='button'>Next day</a>";

echo " or choose another date ";
echo "<form style='display: inline;' name='date_bookings' method='post' action='report_bookings_today_do.php'>";
echo "<link type='text/css' rel='stylesheet' href='CalendarControl.css' />";
echo "<script type='Text/JavaScript' src='scw.js'></script>";
echo "<input name='date' type='text' id='date' onClick='scwShow(this,event);' size='10' />";
echo "<input type='submit' name='lookup date' value='lookup date'>";
echo "</form>";

echo "<p>";

echo "<div>";

	
$store_location=filter_input(INPUT_GET, 'store_location'); /// new Nov 2023		 
if ($store_location=='b') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$date_string."' role='button'>all stores</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$date_string."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$date_string."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$date_string."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$date_string."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$date_string."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$date_string."&store_location=s' role='button'>SE</a>";
	
echo "</div><p>";


$date_1=$date;
$store_location='b';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_1 = :date_1  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	

}
else if($_store_location=='c') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";


$date_1=$date;
$store_location='c';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_1 = :date_1  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}	 
else if($store_location=='e') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";


$date_1=$date;
$store_location='e';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_1 = :date_1  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}
else if($store_location=='h') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";

$date_1=$date;
$store_location='h';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_1 = :date_1  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}
else if($store_location=='m') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";

$date_1=$date;
$store_location='m';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_1 = :date_1  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);		
$stmt->execute();	
}
else if($store_location=='n') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=h role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";


$date_1=$date;
$store_location='n';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_1 = :date_1  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}
else if($store_location=='s') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>SE</a>";
echo "</div><p>";


$date_1=$date;
$store_location='s';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_1 = :date_1  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}	 
else  {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_bookings_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";	
	


$date_1=$date;
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_1 = :date_1 AND (barcode != "046602" OR barcode != "046616" OR barcode != "046617" OR barcode != "046618" OR barcode != "00956" OR barcode != "00954" OR barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->execute();	
}	 
	 

	 

	 

	 $row_count = $stmt->rowCount();
		 if(!$row_count)                            
	{
	echo "<p><b>No equipment due out today</b>";
	include('../bootstrap/footer_js.html');
	exit;
	}
	
	
echo "<table class = 'table table-hover'>";

echo "<thead><tr><th>Booked from </th>";
echo "<th>Booked to</th>";
echo "<th>Out</th>";
echo "<th>In</th>";
echo "<th>Name</th>";
echo "<th>Category</th>";
echo "<th>Item no.</th>";
echo "<th></th>";	 
echo "<th>Early pickup</th>";
echo "<th>Late dropoff</th>";
echo "<th>Room</th>";
echo "<th>Comments</th>";
echo "<th>Store</th>";
echo "<th>Picked up?</th>";
echo "<th>In?</th>";
echo "</tr></thead>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
echo "<tr>";
echo "<td> ".$e_date_1." </td>";//show reversed date 1


$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//
echo "<td> ".$e_date_2." </td>";//show reversed date 2

echo "<td> ".$row['time_1']."</td>";
if ($row['time_2']!=NULL)
{
$return_time=$row['time_2']+1;

echo "<td> ".$return_time."</td>";
}else{
echo "<td > </td>";
}
$internet=$row['internet'];
$ext_cord=$row['ext_cord'];
$setup_location=$row['setup_location'];
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];
$comments=$row['comments'];
$picked_up=$row['p_up'];
$booking_id=$row['booking_id'];

$fan_id=$fan_d;	
$stmt2 = $conn->prepare('SELECT first_name,last_name FROM store_staff  WHERE fan_id =:fan_d');
$stmt2->bindParam(':fan_d', $fan_d, PDO::PARAM_STR);	
$stmt2->execute();

while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
$first_name=$row2['first_name'];
$last_name=$row2['last_name'];	
}
	
echo "<td> ".$first_name." ".$last_name."</td>";
	
$stmt3 = $conn->prepare('SELECT item,store_status,cat_id,store_location,image FROM store_items  WHERE barcode = :barcode');
$stmt3->bindParam(':barcode', $barcode, PDO::PARAM_STR);	
$stmt3->execute();
	
while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
$cat_id=$row3['cat_id'];
$item=$row3['item'];
$image=$row3['image'];
$store_location=$row3['store_location'];
$store_status=$row3['store_status'];	
}
switch ($store_location) {
case 'b':  
	$store_location  = "BGL STORE<br>LWCM Rm 313";
	$colour="#FF8A33";	
   break; 
case 'c':  
	$store_location  = "CENTRAL STORE<br>Engineering Rm 470";
	$colour="#d9534f";	
   break;
case 'e':  
	$store_location  = "EPSW STORE<br>Education Rm 3.16";
	$colour="#555555";	
   break;
case 'h':  
	$store_location  = "HASS STORE<br>Humanities Rm 269";
	$colour="#CA33FF";
   break;		
 case 'm':  
	$store_location  = "MPH STORE<br>Health Sciences 5.15";
	$colour="#356534";
   break;
 case 'n':  
	$store_location  = "NHS STORE<br>Sturt South S213";
	$colour="#66BB66";
   break;
case 's':  
	$store_location  = "SE STORE<br>Engineering Rm 4.63";
	$colour="#3349FF";	
   break;		
   }
	


switch ($picked_up) {
case '0':
    $status=NULL;	
break;	
case '1':
    $status="<span class='glyphicon glyphicon-ok' aria-hidden='true' style='color:#5cb85c'></span>";	
break;	
}
switch ($store_status) {
case '1':
    $stat_col='color:#5cb85c';	
break;	
case '0':
    $stat_col='color:#d9534f';	
break;
case '2':
    $stat_col='style3';	
break;	
}

	
$stmt4 = $conn->prepare('SELECT category FROM store_category  WHERE cat_id = :cat_id');
$stmt4->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);	
$stmt4->execute();

while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
$category=$row4['category'];	
}	
echo "<td> ".$category."</td>";
echo "<td> ".$item."</td>";
echo "<td><img src='../images/".$image.".jpg' width='75' height='25'></td>";//new

	


switch ($internet) {
 case 'e':  
	$start="Early";
	$style2  = style1;
   break;
    default:  
	$start=NULL;
   break;
   }
switch ($ext_cord) {
 case 'l':
 $end="Late";  
	$style3 = style5;
   break;
 default:  
	$end=NULL;
   break;
   }
echo "<td class='".$style2."' > ".$start."</td>";
echo "<td class='$style3' > ".$end."</td>";
echo "<td> ".$setup_location."</td>";
echo "<td> ".$comments."</td>";
echo "<td><span style='color:".$colour."';><strong>".$store_location."</strong></span></td>";	
echo "<td align='center'>$status</td>";
echo "<td span style='$stat_col'>&#9632;</span></td>";
echo "<td><a class='btn btn-default btn-xs' href='toggle_pickup_status.php?barcode=".$barcode."&booking_id=".$booking_id."&date_string=".$date_string."' role='button'>Picked up</a></td>";	

echo "</tr>";
       }
		echo "</table>\n";


if (!$stmt) {
  echo "An error occured.\n";
  exit;
  }



 ?>     
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
