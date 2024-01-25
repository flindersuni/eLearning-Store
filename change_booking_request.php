
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
include('staff_check.php'); 
include('pdo.php');		 

	 ?>
<head>
<title>eLearning store</title>
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
 <div class="container-fluid">
<!--  body begins GF -->

<?php 
$todays_date=date('Y').".".date('m').".".date('d');
include('pdo.php');

$fan_id=$_SERVER["REMOTE_USER"];	
//$fan_id=filter_input(INPUT_SERVER, "REMOTE_USER");	// new Dec 2023		 	 
$stmt4 = $conn->prepare('SELECT * FROM store_staff WHERE fan_id= :fan_id');   
$stmt4->bindParam(':fan_id', $fan_id, PDO::PARAM_STR);	
$stmt4->execute();	 

while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) { 
$first_name=$row4['first_name'];
$last_name=$row4['last_name'];	
}
echo "<h4>Request for booking change for ".$first_name." ".$last_name."'s upcoming bookings  </h4><p>";
echo "<p>This is where you can delete bookings you no longer want or request changes to bookings.</p>";
echo "<h4>Your upcoming bookings</h4>";


if ($_GET['search']) {

$search=filter_input(INPUT_GET, 'search'); 		

$orderby=filter_input(INPUT_GET, 'order'); 		
}
else {
$search=filter_input(INPUT_POST, 'search'); 	

}

$fan=$_SERVER["REMOTE_USER"];  	

	 try {	 
$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE fan= :fan AND date_1>= :todays_date  ORDER BY booking_id DESC');
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);
$stmt->bindParam(':todays_date', $todays_date, PDO::PARAM_STR);	
$stmt->execute();	  
	} 
	catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}                 
	 if(!$stmt)
	{
echo	"You haven't got any upcoming bookings.";
include('bootstrap/footer_js.html'); 
exit;
	}

echo "<table class = 'table table-hover'>";
echo "<tr><thead><th>Booking id</th>";
echo "<th>Booked from</th>";
echo "<th>Booked to</th>";
echo "<th>Time out </th>";
echo "<th>Return </th>";
echo "<th>Booking date </th>";

echo "<th>Equipment</th>";


echo "</thead></tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
$date_1=$row['date_1'];
$date_2=$row['date_2'];	
$booking_id=$row['booking_id'];	
$booking_date=$row['booking_date'];	
$barcode = 	$row['barcode'];	
echo "<tr></tr>";
			
			
echo "<tr>";
echo "<td> ".$booking_id."</td>";
	
$date_1_exp=explode(".",$date_1);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
echo "<td>".$e_date_1."</td>";//show reversed date 1	

$date_2_exp=explode(".",$date_2);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//
echo "<td>".$e_date_2."</td>";//show reversed date 2

echo "<td>".$row['time_1']."</td>";
if ($row['time_2']!=NULL)
{
$return_time=$row['time_2']+1;

echo "<td> ".$return_time."</td>";
}else{
echo "<td > </td>";
}
echo "<td> ".$booking_date."</td>";
$booking_id=$row['booking_id'];	
$fan_d = $row['fan'];


$stmt2 = $conn->prepare('SELECT item,cat_id FROM store_items  WHERE barcode = :barcode');
$stmt2->bindParam(':barcode', $barcode, PDO::PARAM_INT);	
$stmt2->execute();	

while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { 	
$item=$row2['item'];
$cat=$row2['cat_id'];
}

$stmt3 = $conn->prepare('SELECT category FROM store_category  WHERE cat_id = :cat_id');
$stmt3->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);	
$stmt3->execute();	

while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {	
$category=$row3['category'];	
}
	
echo "<td> ".$category."</td>";
echo "<td> ".$item."</td>";

echo "<td><a class='btn btn-danger btn-xs'  href='delete_bookings2.php?booking_id=".$booking_id."' role='button'>delete?</a></td>";	


echo "</tr>";
       }
echo "</table>\n";


if (!$stmt) {
  echo "An error occured.\n";
  exit;
  }

	 
echo "<p><p><div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='categories.php'>Book something else</a>";
echo "<a class='btn btn-success btn-xs' href='checkout.php'>Proceed to checkout</a>";

echo "</div><p>";	 
	 
	 
	 
	 
?> 
 <h4>Changes you'd like to make to your booking</h4>
 <form name="changes" method="post" action="change_booking_request_do.php">
  Booking ID
  <label>
  <input name="booking_id" type="text" id="booking_id" size="6">
  </label> 
   changes to booking 
   <label>
   <input name="changes" type="text" id="changes" size="40">
  </label>
   <p>
     <label>
     <input type="submit" name="Submit" value="Submit">
     </label>
   </p>
 </form>
 <p>
   




<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
</body>
</html>
