
    
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');

require('staff_check.php'); 
include ('pdo.php'); 
	
?>
<head>
<title>eLearning store bookings</title>
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

	 
	 
	 

$todays_date=date('Y').".".date('n').".".date('d');



$fan_id=$_SERVER["REMOTE_USER"];	//was  'fili0008'
$stmt2 = $conn->prepare('SELECT * FROM store_staff WHERE fan_id = :fan_id');
$stmt2->bindParam(':fan_id', $fan_id, PDO::PARAM_STR);
$stmt2->execute();	 

	 
while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {	
$first_name=$row2['first_name'];
$last_name=$row2['last_name'];	
}
	 
	 
echo "<h4>".$first_name." ".$last_name."'s booking history</h4><p>";

$fan=$_SERVER["REMOTE_USER"]; 
$booking_date=$row['booking_date'];	 
$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE fan = :fan ORDER BY booking_date DESC');
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);
	 
$stmt->execute();	 
	 
		 if(!$stmt)
	{
	echo	"You haven't booked anything yet!";
	exit;
	}
	
echo "<table class = 'table table-hover'>";
echo "<tr><thead><th>Booked from </th>
<th>Booked to </th>
<th>Time out </th>
<th>Return </th>
<th>Booking date </th>
<th>Equipment </th>
<th></th><th>Picked up? </th>
<th>Returned? </th>
</thead></tr>";
            
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
	
echo "<tr></tr>\n";
			


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


$booking_date_exp=explode(".",$row['booking_date']);//reverse date 2
$e_booking_date=$booking_date_exp[2].".".$booking_date_exp[1].".".$booking_date_exp[0];//
echo "<td> ".$e_booking_date." </td>";//show reversed booking date



$fan_d = $row['fan'];
$barcode = 	$row['barcode'];

switch ($row['p_up']) {
case '0':
    $status_p_up='<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color:#d9534f"></span>';	
break;	
case '1':
    $status_p_up='<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:#5cb85c"></span>';	
break;	
}
switch ($row['ret']) {
case '0':
    $status_ret='<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color:#d9534f"></span>';	
break;	
case '1':
    $status_ret='<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:#5cb85c"></span>';	
break;	
}



$stmt4 = $conn->prepare('SELECT item, cat_id FROM store_items  WHERE barcode = :barcode');
$stmt4->bindParam(':barcode', $barcode, PDO::PARAM_STR);
$stmt4->execute();	 
	

while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {		

$item=$row4['item'];
$cat=$row4['cat_id'];
}

	
$stmt3 = $conn->prepare('SELECT category FROM store_category  WHERE cat_id = :cat_id');
$stmt3->bindParam(':cat_id', $cat, PDO::PARAM_INT);
$stmt3->execute();	 
	
while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {	
$category=$row3['category'];
	
}
	
echo "<td> ".$category."</td>";
echo "<td> ".$item."</td>";


echo "<td> ".$status_p_up."</td>";
echo "<td> ".$status_ret."</td>";

echo "</tr>";
       }
echo "</table>\n";



if (!$stmt) {
  echo "An error occured.\n";
  exit;
  }


?>
<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
