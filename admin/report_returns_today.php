
 
<?php
//error_reporting(0);
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
 
// title
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='report_bookings_today.php' role='button'>Bookings</a>";
echo "<a class='btn btn-success btn-xs active' href='report_returns_today.php' role='button'>Returns</a>";
echo "<a class='btn btn-primary btn-xs' href='report_late_all.php' role='button'>Late</a>";
echo "<a class='btn btn-primary btn-xs' href='report_whats_out.php' role='button'>What's out?</a>";
echo "<a class='btn btn-default btn-xs' href='report_cow_bookings_today.php' role='button'>COWs etc</a>";
//echo "<a href='#menu-toggle' class='btn btn-default btn-xs' id='menu-toggle'>Toggle Menu</a><p>";
echo "</div>";

//$date_string=$_GET['date_string'];
$date_string=filter_input(INPUT_GET, 'date_string'); /// new Nov 2023	 
//$date=date("Y.m.d", $date_string);
if ($date_string==NULL) {
$date_string =mktime(0, 0, 0);
//$date=date("Y.m.d", $date_string);	 
///
}
$date=date("Y.m.d", $date_string);	 
$date_exp=explode(".",$date);//reverse date 
$e_date=$date_exp[2]."-".$date_exp[1]."-".$date_exp[0];//

$date2=date("Y.F.j", $date_string);	 	 
$date_exp2=explode(".",$date2);//reverse date 
$e_date2=$date_exp2[2]." ".$date_exp2[1]." ".$date_exp2[0];//	 
	 

echo "<h4>Returns for ".date("l", $date_string)." ".$e_date2."</h4>";
//echo  "<span class='style2'>&#9632</span> = in store <span class='style4'>|</span> <span class='style1'>&#9632</span> = out";
//echo  "<span class='style11'>&#9632;</span>";

//$date_today_string=strtotime("$date");


$tomorrow_string=($date_string)+86400;
$yesterday_string=($date_string)-86400;
//echo "<div style='display: inline;'>";
//echo "<form style='display: inline;' name='prev' method='post' action='report_returns_today2_do.php?date_string=".$yesterday_string."'>";
//echo  "<button type='submit' name='date_string' value='$yesterday_string'>< prev day</button>";
//echo "</form>";
//echo "<form style='display: inline;' name='next' method='post' action='report_returns_today2_do.php?date_string=".$tomorrow_string."'>";
//echo  "<button type='submit' name='date_string' value='$tomorrow_string'>next day ></button>";
//echo "</form>";

echo "<a class='btn btn-default btn-xs' href='report_returns_today2_do.php?date_string=".$yesterday_string."' role='button'>Prev day</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today2_do.php?date_string=".$tomorrow_string."' role='button'>Next day</a>";

echo " or choose another date ";
echo "<form style='display: inline;' name='date_bookings' method='post' action='report_returns_today_do.php'>";
echo "<link type='text/css' rel='stylesheet' href='CalendarControl.css' />";
echo "<script type='Text/JavaScript' src='scw.js'></script>";
echo "<input name='date' type='text' id='date' onClick='scwShow(this,event);' size='10' />";
echo  "<input type='submit' name='lookup date' value='lookup date'>";
echo "</form>";
echo "<p>";
//echo "<br>";
echo "<div>";
//// added filter 2-11-19	
$store_location=filter_input(INPUT_GET, 'store_location');	// new Nov 2023		 
if ($store_location=='b') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";

//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND store_location='b' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
$date_2=$date;
$booking_id='booking_id';
$store_location='b';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 = :date_2  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
//$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
}
else if($store_location=='c') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";

//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND store_location='c' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
$date_2=$date;
$booking_id='booking_id';
$store_location='c';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 = :date_2  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
//$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
}	 
else if($store_location=='e') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";

//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND store_location='e' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
$date_2=$date;
$booking_id='booking_id';
$store_location='e';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 = :date_2  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
//$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
}
else if($store_location=='h') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";
//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND store_location='h' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
$date_2=$date;
$booking_id='booking_id';
$store_location='h';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 = :date_2  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
//$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
}
else if($store_location=='m') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";
//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND store_location='m' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
$date_2=$date;
$booking_id='booking_id';
$store_location='m';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 = :date_2  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
//$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
}
else if($store_location=='n') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=h role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";

//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND store_location='n' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
$date_2=$date;
$booking_id='booking_id';
$store_location='n';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 = :date_2  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
//$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
}
else if($store_location=='s') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>SE</a>";
echo "</div><p>";

//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND store_location='s' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
$date_2=$date;
$booking_id='booking_id';
$store_location='s';	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 = :date_2  AND store_location= :store_location AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
//$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
}	 
else  {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>all stores</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=b' role='button'>BGL</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=c' role='button'>Central</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=e' role='button'>EPSW</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=h' role='button'>HASS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=m' role='button'>MPH</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=n' role='button'>NHS</a>";
echo "<a class='btn btn-default btn-xs' href='report_returns_today.php?date_string=".$_GET['date_string']."&store_location=s' role='button'>SE</a>";
echo "</div><p>";	
	

//$sql="SELECT * FROM store_items  WHERE cat_id='".$_GET['cat_id']."' AND store_status!= 'r' ORDER BY ".$orderby;
//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
$date_2=$date;	
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE date_2 = :date_2 AND (barcode != "046602" AND barcode != "046616" AND barcode != "046617" AND barcode != "046618" AND barcode != "00956" AND barcode != "00954" AND barcode != "00955") ORDER BY booking_id');
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);	
//$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);	
$stmt->execute();	
//
	
	
//$sql = $dbh->prepare("SELECT * FROM store_bookings where '$date' = ? AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id");
//$sql->execute([$_GET['date']]);	
	
	
}	 
//echo $sql;	 
////



//$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
//echo $sql;
//echo $sql2;
//$result = $conn->query($sql);  //new sql

		// if(!$result)                            //fix
	//{
	//echo	"<p>No equipment due in today";
	//include('../bootstrap/footer_js.html');
	//exit;
	//}
	
		 $row_count = $stmt->rowCount();
		 if(!$row_count)                            
	{
	echo "<p><b>No equipment due back today</b>";
	include('../bootstrap/footer_js.html');
	exit;
	}
echo "<table class = 'table table-hover'>";

echo "<thead><tr><th>Booked from </th>";
echo "<th>Booked to </th>";
echo "<th>Out </th>";
echo "<th>In </th>";
echo "<th>Name </th>";
echo "<th>Category </th>";
echo "<th>Item no. </th>";
echo "<th></th>";
echo "<th>Early pickup</th>";
echo "<th>Late dropoff </th>";
//echo "<td>Pwrbrd </td>";
//echo "<td>Setup </td>";
echo "<th>Room </th>";
echo "<th>Comments </th>";
echo "<th>Store </th>";
echo "<th>Returned? </th>";
echo "<th>In? </th>";
echo "</tr></thead>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			//$row = pg_fetch_array($result);

$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
echo "<tr>";
echo "<td> ".$e_date_1." </td>";//show reversed date 1
//print "<td align='center'> ".$row['date_1']." </td>";
	
$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//
echo "<td> ".$e_date_2." </td>";//show reversed date 2
//print "<td align='center'> ".$row['date_2']."</td>";

echo "<td> ".$row['time_1']."</td>";
//print "<td align='center'> ".$row['time_2']."</td>";
if ($row['time_2']!=NULL)
{
$return_time=$row['time_2']+1;

echo "<td> ".$return_time."</td>";
}else{
echo "<td> </td>";
}	
$internet=$row['internet'];
$ext_cord=$row['ext_cord'];
//$powerboard=$row['powerboard'];
$setup=$row['setup'];
$setup_location=$row['setup_location'];
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];
$comments=$row['comments'];
$returned=$row['ret'];
$booking_id=$row['booking_id'];





//$sql2="SELECT first_name,last_name FROM store_staff  WHERE fan_id ='$fan_d'";
//echo $sql2;
/////////////////////////	
$fan_id=$fan_d;	
$stmt2 = $conn->prepare('SELECT first_name,last_name FROM store_staff  WHERE fan_id =:fan_d');
$stmt2->bindParam(':fan_d', $fan_d, PDO::PARAM_STR);	
$stmt2->execute();
////////////////////////
//exit;
//$result2 = $conn->query($sql2);  //new sql
while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
$first_name=$row2['first_name'];
$last_name=$row2['last_name'];	
}
echo "<td> ".$first_name." ".$last_name."</td>";
//$sql3="SELECT item,store_status,cat_id,store_location,image FROM store_items  WHERE barcode = '$barcode'";
//echo $sql3;
//exit;
/////////////////////////		
$stmt3 = $conn->prepare('SELECT item,store_status,cat_id,store_location,image FROM store_items  WHERE barcode = :barcode');
$stmt3->bindParam(':barcode', $barcode, PDO::PARAM_STR);	
$stmt3->execute();
////////////////////////	
while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
$cat_id=$row3['cat_id'];
//echo $cat_id;
//exit;
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
	$store_location  = "NHS STORE<br>Sturt Sout S213";
	$colour="#66BB66";
   break;
case 's':  
	$store_location  = "SE STORE<br>Engineering Rm 4.63";
	$colour="#3349FF";	
   break;		
   }
//print "<td align='center'> ".$row['item']."</td>";
//echo $row['store_status'];
//exit;

switch ($returned) {
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

//$sql4="SELECT category FROM store_category  WHERE cat_id = '$cat_id'";
//echo $sql4;
/////////////////////////		
$stmt4 = $conn->prepare('SELECT category FROM store_category  WHERE cat_id = :cat_id');
$stmt4->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);	
$stmt4->execute();
////////////////////////	
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
	//$style2  = style1;
   break;
   }
switch ($ext_cord) {
 case 'l':
 $end="Late";  
	$style3 = style5;
   break;
 default:  
	$end=NULL;
	//$style2  = style1;
   break;
   }
echo "<td> ".$start."</td>";
echo "<td> ".$end."</td>";
//echo "<td align='center'> ".$powerboard."</td>";
//echo "<td align='center'> ".$setup."</td>";
echo "<td> ".$setup_location."</td>";
echo "<td> ".$comments."</td>";
echo "<td><span style='color:".$colour."';><strong>".$store_location."</strong></span></td>";	
echo "<td align='center'>$status</td>";
echo "<td span style='$stat_col'>&#9632;</span></td>";
//echo "<td><a href=toggle_return_status.php?barcode=".$barcode."&booking_id=".$booking_id."&date_string=".$date_string.">Returned</a><td>";
echo "<td><a class='btn btn-default btn-xs' href='toggle_return_status.php?barcode=".$barcode."&booking_id=".$booking_id."&date_string=".$date_string."' role='button'>Returned</a></td>";		
//$fan_d = $row['fan'];

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
