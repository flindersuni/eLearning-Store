
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 
include('pdo.php');

?>
<title>eLearning store store bookings</title>
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
 <div class="col-md-8">
<!--  body begins GF -->
 
<?php     

include('pdo.php');
 
//$date_query=$_POST['booked_day'];
$todays_date=date('Y').".".date('m').".".date('d');
//echo $todays_date;
//exit;
//$barcode=$_POST['barcode'];
$barcode=filter_input(INPUT_POST, 'barcode'); /// new Nov 2023		 
	 if($barcode == NULL)
	{
	$barcode=filter_input(INPUT_GET, 'barcode');
	//exit;
	}
	
$stmt5 = $conn->prepare('SELECT store_status FROM store_items WHERE barcode=:barcode');
$stmt5->bindParam(':barcode', $barcode, PDO::PARAM_INT); 
$stmt5->execute();	 
//$result5 = $conn->query($sql5);  //new sql
while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)) {	
$store_status=$row5['store_status'];
                                       }	


switch ($store_status) {
case 'u':
echo "<a class='btn btn-danger btn-xs ' href='item_availability.php' role='button'>Item is marked unavailable</a>";
break;	
case 'r':
echo "<a class='btn btn-black btn-xs ' href='item_availability.php' role='button'>Item is marked retired</a>";
break;
default:
echo "<a class='btn btn-primary btn-xs ' href='../bookings.php?barcode=".$barcode."&n=".date('n')."&Y=".date('Y')."' role='button'>Make new booking for this item</a>";	
}
	

$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE barcode=:barcode AND date_2>=:date_2 ORDER BY date_1');
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmt->bindParam(':date_2', $todays_date, PDO::PARAM_STR); 	 
$stmt->execute();		 
//echo $sql;
echo "<h4>".$barcode." upcoming bookings</h4><p>";
//echo "<a href=../ehl/bookings.php?barcode=".$barcode."&n=".date('n')."&Y=".date('Y').">make new booking for this item</a><p>";
//exit;

		 if(!$stmt)
	{
	
	echo	 "No upcoming bookings";
	exit;
	}
	
echo "<table class = 'table table-hover'>";
echo "<tr><thead><th>Booked from </th>";
echo "<th>Booked to </th>";
echo "<th>Time out </th>";
//echo "<td>Time in </td>";
echo "<th>Return </th>";
echo "<th>Booking date </th>";
//echo "<td>Booking ID </td>";


//echo "<td>Booking id </td>";
echo "<th>Equipment </th>";
echo "<th>  </th>";
echo "<th>Name </th>";
echo "</thead></tr>";
            //echo "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
//echo "<tr bgcolor=#999999><td colspan=14></td></tr>\n";


$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
echo "<td> ".$e_date_1." </td>";//show reversed date 1
//echo "<td align='center'> ".$row['date_1']." </td>";

$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//
echo "<td> ".$e_date_2." </td>";//show reversed date 2
//echo "<td align='center'> ".$row['date_2']."</td>";

echo "<td> ".$row['time_1']."</td>";
//echo "<td align='center'> ".$row['time_2']."</td>";
if ($row['time_2']!=NULL)
{
$return_time=$row['time_2']+1;

echo "<td> ".$return_time."</td>";
}else{
echo "<td > </td>";
}
$booking_date_exp=explode(".",$row['booking_date']);//reverse date 2
$e_booking_date=$booking_date_exp[2].".".$booking_date_exp[1].".".$booking_date_exp[0];//
echo "<td> ".$e_booking_date." </td>";//show reversed booking date	
//echo "<td align='center'> ".$row['booking_date']."</td>";
//echo "<td align='center'> ".$row['booking_id']."</td>";
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];


$stmt2 = $conn->prepare('SELECT item,cat_id FROM store_items WHERE barcode = :barcode');
$stmt2->bindParam(':barcode', $barcode, PDO::PARAM_INT);	 
$stmt2->execute();		 


while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {		
$item=$row2['item'];
$cat=$row2['cat_id'];
}


$stmt3 = $conn->prepare('SELECT category FROM store_category  WHERE cat_id = :cat_id');
$stmt3->bindParam(':cat_id', $cat, PDO::PARAM_INT);	 
$stmt3->execute();		
while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
$category=$row3['category'];	
}
echo "<td> ".$category."</td>";
echo "<td> ".$item."</td>";
//echo $row['store_status'];
//exit;

	
$stmt4 = $conn->prepare('SELECT * FROM store_staff  WHERE fan_id = :fan_id');
$stmt4->bindParam(':fan_id', $fan_d, PDO::PARAM_STR);	 
$stmt4->execute();	

while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
$first_name=$row4['first_name'];
$last_name=$row4['last_name'];	
}	
echo "<td> ".$first_name." ".$last_name."</td>";
//echo "<td><a href=../ehl/bookings.php?barcode=".$barcode."&n=".date('n')."&Y=".date('Y').">make new booking</a></td>";
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
