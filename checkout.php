
    
<?php
session_start();
include('staff_check.php'); 
include('bootstrap/boot1_ehlstore_bookings.html');


?>
<title>Checkout</title>

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
$todays_date2=date('d')."-".date('m')."-".date('Y');

$fan=$_SERVER["REMOTE_USER"];
$booking_date=$todays_date; 		
$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE fan= :fan AND booking_date= :booking_date ORDER BY booking_id DESC');
$stmt->bindParam('fan', $fan, PDO::PARAM_STR);
$stmt->bindParam('booking_date', $booking_date, PDO::PARAM_STR);		
$stmt->execute(); 	
/////////		
echo "<h4> Your bookings for ".$todays_date2."</h4><p>";
		

$row_count = $stmt->rowCount();
		
	 if(!$row_count)
	{
	echo	"No bookings today";
	include('bootstrap/footer_js.html'); 
	exit;
	}
	
echo "<table class = 'table table-hover'>";

echo "<thead><tr><th>Booked from </th>";
echo "<th>Booked to </th>";
echo "<th>Time out </th>";

echo "<th>Return </th>";

echo "<th>Equipment </th>";
echo "<th></th>";
//echo "<td>In store? </td>";

echo "</tr></th></thead>";
            //echo "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
//echo "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row = pg_fetch_array($result);
$booking_id=$row['booking_id'];

$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
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
echo "<td> </td>";

}

$barcode = 	$row['barcode'];

 		
$stmt2 = $conn->prepare('SELECT item,cat_id,image FROM store_items  WHERE barcode = :barcode');
$stmt2->bindParam('barcode', $barcode, PDO::PARAM_INT);	
$stmt2->execute(); 	
	

 while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {	
$image=$row2['image'];
$item=$row2['item'];
$cat=$row2['cat_id'];	 
 }
echo "<td><img src='images/".$image.".jpg'>";	

		
$stmt3 = $conn->prepare('SELECT category FROM store_category  WHERE cat_id = :cat');
$stmt3->bindParam('cat', $cat, PDO::PARAM_INT);	
$stmt3->execute(); 	
	
  while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {	
$category=$row['category'];	 
 }
echo $category." "."$item"."</td>";
echo "<td><a class='btn btn-danger btn-xs'  href='delete_bookings.php?booking_id=".$booking_id."' role='button'>delete?</a></td>";		


echo "</tr>";
       }
	      
		echo "</table>\n";



echo "<form name='finalise' method='post' action='checkout_done.php'>";
echo  "<input type='submit' name='Finalise booking(s)' value='Finalise booking(s)'>";
echo "</form>";

if ($_SESSION["start_date_status"]==NULL) {
}
else{

foreach ($_SESSION["start_date_status"] as $value) {
#

echo "$value";
echo"<br>";

}
//unset($_SESSION["start_date_status"]);
}
$_SESSION["start_date_status"]=NULL;
 ?> 




<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
