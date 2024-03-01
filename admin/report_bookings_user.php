
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	include('pdo.php'); 
    //include('ldap_connect2.php');	
?>
<title>Booking reports</title>
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




$fan_q=filter_input(INPUT_POST, 'fan'); 		 
 if($fan_q == NULL)
	{
	$fan_q=filter_input(INPUT_GET, 'fan'); 
	//exit;
	}
	 
//$sql4="SELECT * FROM store_staff WHERE fan_id = '$fan_q' ";
//echo $sql4;
//$result4 = $conn->query($sql4);  //new sql
	 
$fan_id=$fan_q;	
$stmt4 = $conn->prepare('SELECT * FROM store_staff WHERE fan_id = :fan_id');
$stmt4->bindParam(':fan_id', $fan_id, PDO::PARAM_STR);		
$stmt4->execute();	 
	 
	 
	 
	 
	 
	 if(!$stmt4)
	{
	echo	"<h2><span class='style1'>User hasn't ever visited the eLearning store</span></h2>";
	exit;
	}
echo "<h4>".$row['first_name']." " .$row['last_name']."'s booking history</h4>";
$name="".$row['first_name']." " .$row['last_name'];

if ($_GET['search']) {
$search=$_GET['search'];

$orderby=$_GET['order'];
}
else {
$search = $_POST['search'];
$orderby="booking_date DESC";

}
//$sql="SELECT * FROM store_bookings WHERE fan = '$fan_q' ORDER BY ".$orderby;
//$result = $conn->query($sql);  //new sql
	 
$fan=$fan_q;		
$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE fan = :fan ORDER by booking_id');
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);
//$stmt->bindParam(':p_up', $p_up, PDO::PARAM_INT);	
//$stmt->bindParam(':ret', $ret, PDO::PARAM_INT);		
$stmt->execute(); 
	 
	 
	 
	 
	 
		 if(!$stmt)
	{
	echo	"".$name." hasn't booked anything yet!";
	exit;
	}
	
echo "<table class = 'table table-hover'>";
echo "<thead><tr><th><a href=report_bookings_user.php?search=booking_id&order=date_1&fan=$fan_q>Booked from </a></th>";
echo "<th><a href=report_bookings_user.php?search=booking_id&order=date_2&fan=$fan_q>Booked to </a></th>";
echo "<th>Time out </th>";
//print "<td>Time in </td>";
echo "<th>Return </th>";
echo "<th><a href=report_bookings_user.php?search=booking_id&order=booking_date&fan=$fan_q>Booking date </a></th>";
//print "<td>Booking ID </td>";
//print "<td>Name </td>";

//print "<td>Booking id </td>";
echo "<th>Equipment </th>";
//print "<td>In store? </td>";

echo "</th></tr></thead>";
           // print "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
//while($row = $result->fetch_assoc()) {
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {		
//print "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row = pg_fetch_array($result);

$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
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
$booking_date_exp=explode(".",$row['booking_date']);//reverse date 2
$e_booking_date=$booking_date_exp[2].".".$booking_date_exp[1].".".$booking_date_exp[0];//
echo "<td> ".$e_booking_date." </td>";//show reversed booking date
//print "<td align='center'> ".$row['booking_date']."</td>";
//print "<td align='center'> ".$row['booking_id']."</td>";
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];

//$sql2="SELECT item,cat_id FROM store_items  WHERE barcode = '$barcode'";
//$result2 = $conn->query($sql2);  //new sql
//while($row2 = $result2->fetch_assoc()) {	
//$item=$row2['item'];
//$cat=$row2['cat_id'];
	
$stmt2 = $conn->prepare('SELECT item,cat_id FROM store_items  WHERE barcode = :barcode');
$stmt2->bindParam(':barcode', $barcode, PDO::PARAM_INT);	
$stmt2->execute();	
while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { 			
$cat_id=$row2['cat_id'];
$item=$row2['item'];
//$image=$row2['image'];
$store_location=$row2['store_location'];	
	
	
	
                                       }
//$sql3="SELECT category FROM store_category  WHERE cat_id = '$cat'";
//$result3 = $conn->query($sql3);  //new sql
//while($row3 = $result3->fetch_assoc()) {	
//$category=$row3['category'];
                                       }

	
$stmt3 = $conn->prepare('SELECT category FROM store_category  WHERE cat_id  WHERE cat_id = :cat_id');
$stmt3->bindParam(':cat_id', $cat, PDO::PARAM_INT);	
$stmt3->execute();		
while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {	
$category=$row3['category'];
//$item=$row3['item'];
//$image=$row3['image'];
//$store_location=$row3['store_location'];
	
echo "<td> ".$category."</td>";
echo "<td> ".$item."</td>";
//echo $row['store_status'];
//exit;

	
//$fan_d = $row['fan'];

echo "</tr>";
       }
		echo "</table>\n";



//pg_close;
if (!$stmt3) {
  echo "An error occured.\n";
  exit;
  }






 ?>
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
