
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 

include('pdo.php');	
?>
<title>Late returns</title>
<style>
.boldStmt {
font-weight:bold;	
}
</style>
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
echo "<a class='btn btn-primary btn-xs ' href='report_bookings_today.php' role='button'>Bookings</a>";
echo "<a class='btn btn-primary btn-xs ' href='report_returns_today.php' role='button'>Returns</a>";
echo "<a class='btn btn-danger btn-xs' active href='report_late_all.php' role='button'>Late</a>";
echo "<a class='btn btn-primary btn-xs' href='report_whats_out.php' role='button'>What's out?</a>";
echo "<a class='btn btn-default btn-xs' href='report_cow_bookings_today.php' role='button'>COWs etc</a>";
echo "</div>";


	
if ($date_string==NULL) {
$date_string =mktime(0, 0, 0);
	
}else{
$date_string=filter_input(INPUT_POST, 'date_string'); /// new Nov 2023	
	
}
$date=date("Y.m.d", $date_string);		 
$date_exp=explode(".",$date);//reverse date 
$e_date=$date_exp['2']."-".$date_exp['1']."-".$date_exp['0'];//

$date2=date("Y.F.j", $date_string);	 	 
$date_exp2=explode(".",$date2);//reverse date 
$e_date2=$date_exp2[2]." ".$date_exp2[1]." ".$date_exp2[0];//	 
	 


echo "<h4>Late returns as of ".date("l", $date_string)." ".$e_date2."</h4>";



$tomorrow_string=($date_string)+86400;
$yesterday_string=($date_string)-86400;


echo "<a class='btn btn-default btn-xs' href='report_late_today2_do.php?date_string=".$yesterday_string."' role='button'>Prev day</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_today2_do.php?date_string=".$tomorrow_string."' role='button'>Next day</a>";

echo " or choose another date ";
echo "<form style='display: inline;' name='date_bookings' method='post' action='report_late_today_do.php'>";
echo "<link type='text/css' rel='stylesheet' href='CalendarControl.css' />";
echo "<script type='Text/JavaScript' src='scw.js'></script>";
echo "<input name='date' type='text' id='date' onClick='scwShow(this,event);' size='10' />";
echo  "<input type='submit' name='lookup date' value='lookup date'>";
echo "</form>";
echo "<p>";
echo "<div>";
$y_date=date("Y.m.d", $yesterday_string);
$store_location=filter_input(INPUT_GET, 'store_location');	// new Nov 2023		 
if ($store_location=='b') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."' role='button'>all stores</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=s' role='button'>SE</a>";
echo "<span style='color:#ff5555';> Filter only applies to bookings made since Nov 1, 2019. To definitely see all bookings use 'all stores' button</span>";	
echo "</div><p>";


$p_up='1';	
$ret='0';
$store_location='b';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 < :date AND p_up= :p_up AND ret= :ret AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);	
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}
else if($_GET['store_location']=='c') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "<span style='color:#ff5555';> Filter only applies to bookings made since Nov 1, 2019. To definitely see all bookings use 'all stores' button</span>";	
echo "</div><p>";


$p_up='1';	
$ret='0';
$store_location='c';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 < :date AND p_up= :p_up AND ret= :ret AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);	
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}	 
else if($store_location=='e') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=s' role='button'>SE</a>";
echo "<span style='color:#ff5555';> Filter only applies to bookings made since Nov 1, 2019. To definitely see all bookings use 'all stores' button</span>";	
echo "</div><p>";


$p_up='1';	
$ret='0';
$store_location='e';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 < :date AND p_up= :p_up AND ret= :ret AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);	
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}
else if($store_location=='h') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=s' role='button'>SE</a>";
echo "<span style='color:#ff5555';> Filter only applies to bookings made since Nov 1, 2019. To definitely see all bookings use 'all stores' button</span>";	
echo "</div><p>";
	

$p_up='1';	
$ret='0';
$store_location='h';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 < :date AND p_up= :p_up AND ret= :ret AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);	
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}
else if($store_location=='m') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=s' role='button'>SE</a>";
echo "<span style='color:#ff5555';> Filter only applies to bookings made since Nov 1, 2019. To definitely see all bookings use 'all stores' button</span>";	
echo "</div><p>";
	

$p_up='1';	
$ret='0';
$store_location='m';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 < :date AND p_up= :p_up AND ret= :ret AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);	
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}
else if($store_location=='n') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=h role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=s' role='button'>SE</a>";
echo "<span style='color:#ff5555';> Filter only applies to bookings made since Nov 1, 2019. To definitely see all bookings use 'all stores' button</span>";	
echo "</div><p>";


$p_up='1';	
$ret='0';
$store_location='n';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 < :date AND p_up= :p_up AND ret= :ret AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);	
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}
else if($store_location=='s') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>SE</a>";
echo "<span style='color:#ff5555';> Filter only applies to bookings made since Nov 1, 2019. To definitely see all bookings use 'all stores' button</span>";	
echo "</div><p>";


$p_up='1';	
$ret='0';
$store_location='s';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 < :date AND p_up= :p_up AND ret= :ret AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);	
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->execute();	
}	 
else  {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_late_all.php?date_string=".$date_string."&store_location=s' role='button'>SE</a>";
echo "</div><p>";	
	

$p_up='1';	
$ret='0';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 < :date AND p_up= :p_up AND ret= :ret AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date', $date, PDO::PARAM_STR);
$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);		
$stmt->execute();		
}	 
$row_count = $stmt->rowCount();	 


echo "<table class = 'table table-hover'>";
echo "<thead><tr><th>Booked from </th>";
echo "<th>Booked to </th>";
echo "<th>Out </th>";
echo "<th>In </th>";
echo "<th>Name </th>";
echo "<th>Phone </th>";
echo "<th>Category </th>";
echo "<th>Item no. </th>";
echo "<th></th>";
echo "<th>Location </th>";
echo "<th>Comments </th>";
echo "<th>Store </th>";
echo "<th>Return? </th>";
echo "<td></td><td></td>";
echo "<th>Reminded? </th>";
echo "<th></th>";
echo "</tr></thead>";
            
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	   
	   
			
$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp['2'].".".$date_1_exp['1'].".".$date_1_exp['0'];//
echo "<tr>";
echo "<td> ".$e_date_1." </td>";//show reversed date 1	

$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp['2'].".".$date_2_exp['1'].".".$date_2_exp['0'];//
echo "<td> ".$e_date_2." </td>";//show reversed date 2

echo "<td> ".$row['time_1']."</td>";
if ($row['time_2']!=NULL)
{
$return_time=$row['time_2']; 

echo "<td> ".$return_time."</td>";
}else{
echo "<td> </td>";
}
$internet=$row['internet'];
$ext_cord=$row['ext_cord'];
$reminded=$row['powerboard'];
$count=$row['setup'];
$setup_location=$row['setup_location'];
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];
$comments=$row['comments'];
$returned=$row['ret'];
$booking_id=$row['booking_id'];
$ret=$row['ret'];// return status
$fan_id=$fan_d;	
$stmt2 = $conn->prepare('SELECT first_name,last_name,phone FROM store_staff  WHERE fan_id = :fan_id');
$stmt2->bindParam(':fan_id', $fan_id, PDO::PARAM_STR);	
$stmt2->execute();	
while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { 

	$first_name=$row2['first_name'];
	$last_name=$row2['last_name'];
	$phone=$row2['phone'];
}
echo "<td> ".$first_name." ".$last_name."</td>";
echo "<td>$phone</td>";


$stmt3 = $conn->prepare('SELECT item,store_status,cat_id,store_location,image FROM store_items  WHERE barcode = :barcode');
$stmt3->bindParam(':barcode', $barcode, PDO::PARAM_INT);	
$stmt3->execute();	
while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) { 			
$cat_id=$row3['cat_id'];
$item=$row3['item'];
$image=$row3['image'];
$store_location=$row3['store_location'];	
}
switch ($store_location) {
case 'b':  
	$store_location  = "BGL STORE<br>LWCM Rm 313";
	$colour="#FF8A33";	
   break; 
case 'c':  
	$store_location  = "CENTRAL STORE<br>Engineering Rm 4.63";
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

switch ($returned) {
case '0':
    $status=NULL;	
break;	
case '1':
    $status='&#10004;';	
break;	
}
switch ($row['store_status']) {
case '1':
    $stat_col='style2';	
break;	
case '0':
    $stat_col='style1';	
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
echo "<td> ".$setup_location."</td>";
echo "<td > ".$comments."</td>";

echo "<td><span style='color:".$colour."';><strong>".$store_location."</strong></span></td>";		
echo "<td><a class='btn btn-success btn-xs' href='set_late_return_status.php?barcode=".$barcode."&booking_id=".$booking_id."&date_string=".$date_string."' role='button'>yes</a></td>";
echo "<td><a class='btn btn-default btn-xs' href='check_bookings_item.php?barcode=".$barcode."' role='button'>check bookings</a></td>";
echo "<td><a class='btn btn-danger btn-xs' href='reminder_email.php?fan=".$fan_d."&booking_id=".$booking_id."&first_name=".$first_name."&category=".$category."&item=".$item."&date1=".$e_date_1."&date2=".$e_date_2."&barcode=".$barcode."&image=".$image."' role='button'>reminder email</a></td>";




echo "<td align='center'> ".$reminded."</td>";
echo "<td align='center'> (".$count.")</td>";

echo "</tr>";
       }
		echo "</table>\n";

echo "<b>". $row_count. " items are late</b>";
		



if (!$stmt) {
  echo "An error occured.\n";
  exit;
  }

 ?>     
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
