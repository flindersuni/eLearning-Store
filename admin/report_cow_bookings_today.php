
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 

include('pdo.php');	
?>
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
echo "<a class='btn btn-primary btn-xs' href='report_returns_today.php' role='button'>Returns</a>";
echo "<a class='btn btn-primary btn-xs' href='report_late_all.php' role='button'>Late</a>";
echo "<a class='btn btn-primary btn-xs' href='report_whats_out.php' role='button'>What's out?</a>";
echo "<a class='btn btn-success btn-xs active' href='report_cow_bookings_today.php' role='button'>COWs etc</a>";
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


echo "<h4>Bookings/returns for ".date("l", $date_string)." ".$e_date2."</h4>";
echo "<br>";


$tomorrow_string=($date_string)+86400;
$yesterday_string=($date_string)-86400;



echo "<a class='btn btn-default btn-xs' href='report_cow_bookings_today2_do.php?date_string=".$yesterday_string."' role='button'>Prev day</a>";
echo "<a class='btn btn-default btn-xs' href='report_cow_bookings_today2_do.php?date_string=".$tomorrow_string."' role='button'>Next day</a>";

echo " or choose another date ";
echo "<form style='display: inline;' name='date_bookings' method='post' action='report_cow_bookings_today_do.php'>";
echo "<link type='text/css' rel='stylesheet' href='CalendarControl.css' />";
echo "<script type='Text/JavaScript' src='scw.js'></script>";
echo "<input name='date' type='text' id='date' onClick='scwShow(this,event);' size='10' />";
echo  "<input type='submit' name='lookup date' value='lookup date'>";
echo "</form>";

echo "<br>";

echo "<div>";

$date_1=$date;
$date_2=$date;	 
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE (date_1 = :date_1  OR date_2 = :date_2) AND (barcode = 046602 OR barcode = 046616 OR barcode = 046617 OR barcode = 046618 OR barcode = 00956 OR barcode = 00954 OR barcode = 00955) ORDER BY booking_id');
$stmt->bindParam(':date_1', $date_1, PDO::PARAM_STR);
$stmt->bindParam(':date_2', $date_2, PDO::PARAM_STR);	 
$stmt->execute();



		 $row_count = $stmt->rowCount();
		 if(!$row_count)  
	{
	echo "<p><p>No COWs or iPads due out today";
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
echo "<th>Returned?</th>";
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
//$powerboard=$row['powerboard'];
$setup_location=$row['setup_location'];
$fan_d = $row['fan'];
$barcode = $row['barcode'];
$comments=$row['comments'];
$picked_up=$row['p_up'];
$returned=$row['ret'];
$booking_id=$row['booking_id'];
	
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

switch ($returned) {
case '0':
    $status2=NULL;	
break;	
case '1':
    $status2="<span class='glyphicon glyphicon-ok' aria-hidden='true' style='color:#5cb85c'></span>";		
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
echo "<td class='$style2' > ".$start."</td>";
echo "<td class='$style3' > ".$end."</td>";
echo "<td> ".$setup_location."</td>";
echo "<td> ".$comments."</td>";
switch ($store_location) {
 case 'e':  
	$style  = NULL;
   break;
 case 'h':  
	$style = style5;
   break;
   }
echo "<td align='center' class='$style'> ".$store_location."</td>";
echo "<td align='center'>$status</td>";
echo "<td align='center'>$status2</td>";
echo "<td span style='$stat_col'>&#9632;</span></td>";
echo "<td><a class='btn btn-default btn-xs' href='toggle_pickup_status_cows.php?barcode=".$barcode."&booking_id=".$booking_id."&date_string=".$date_string."' role='button'>Picked up</a><a class='btn btn-default btn-xs' href='toggle_return_status_cows.php?barcode=".$barcode."&booking_id=".$booking_id."&date_string=".$date_string."' role='button'>Returned</a></td>";		


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
