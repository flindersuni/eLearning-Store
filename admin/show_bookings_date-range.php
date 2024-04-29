
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	
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


//$date_query=$_POST['booked_day'];
$todays_date=date('Y').".".date('n').".".date('d');
//echo $todays_date;
//exit;
$date_a=$_POST['date_a'];
	 if($date_a == NULL)
	{
	$date_a=$_GET['date_a'];
	//exit;
	}
$date_b=$_POST['date_b'];
	 if($date_b == NULL)
	{
	$date_b=$_GET['date_b'];
	//exit;
	}
if ($_GET['search']) {
$search=$_GET['search'];

$orderby=$_GET['order'];
}
else {
$search = $_POST['search'];
$orderby="booking_id DESC";

}

//echo $date_1;
$date_a_exp=explode("-",$date_a);//reverse date 
$e_date_a=$date_a_exp[2]."-".$date_a_exp[1]."-".$date_a_exp[0];//
$dot_date_a=$date_a_exp[0].".".$date_a_exp[1].".".$date_a_exp[2];//	 
$date_b_exp=explode("-",$date_b);//reverse date 
$e_date_b=$date_b_exp[2]."-".$date_b_exp[1]."-".$date_b_exp[0];//
$dot_date_b=$date_b_exp[0].".".$date_b_exp[1].".".$date_b_exp[2];//	
	 
$sql="SELECT * FROM store_bookings WHERE date_1>='$dot_date_a' AND date_2<='$dot_date_b' ORDER BY ".$orderby;
//echo $sql;
	 
	 
echo "<h4> All bookings between $e_date_a and $e_date_b inclusive</h4><p>";
//exit;
$result = $conn->query($sql);  //new sql
		 if(!$result)
	{
	echo	"No bookings today";
	exit;
	}
//echo $nrows. " bookings<p>";
//echo "<a class='btn btn-primary btn-xs  href='#' role='button'>".$nrows." bookings</a><p>";	
echo "<table class = 'table table-hover'>";
//print "<td>        </td>";
echo "<thead><tr><th><a href=show_bookings_date-range.php?search=booking_id&order=date_1&date_a=$date_a&date_b=$date_b>Booked from </a></th>";
echo "<th><a href=show_bookings_date-range.php?search=booking_id&order=date_2&date_a=$date_a&date_b=$date_b>Booked to </a></th>";
echo "<th>Time out </th>";
//print "<td>Time in </td>";
echo "<th>Return </th>";
echo "<th>Booking date </th>";
echo "<th>Equipment </th>";
echo "<th>    </th>";
echo "<th><a href=show_bookings_date-range.php?search=booking_id&order=fan&date_a=$date_a&date_b=$date_b>Name </a></th>";

echo "</th></tr></thead>";
	 
//echo $date_a;           //print "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
$count=0;	 
while ($row = $result->fetch_assoc()) {
//print "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row = pg_fetch_array($result);

//print "<td><a href=delete_bookings_date-range.php?booking_id=".$row['booking_id']."&date_a=$date_a&date_b=$date_b>delete?</a></td>";	

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
$fan_d = $row['fan'];
$barcode = $row['barcode'];

$sql2="SELECT item,cat_id FROM store_items  WHERE barcode = '$barcode'";
$result2 = $conn->query($sql2);  //new sql
	
//echo $sql2;	
while($row2 = $result2->fetch_assoc()) {	
$item=$row2['item'];
$cat=$row2['cat_id'];
}
	
$sql3="SELECT category FROM store_category  WHERE cat_id = '$cat'";
$result3 = $conn->query($sql3);  //new sql	
//echo $sql3;
while($row3 = $result3->fetch_assoc()) {
$category=$row3['category'];
}
	
echo "<td> ".$category."</td>";
echo "<td align='center'> ".$item."</td>";
//echo $row['store_status'];
//exit;
$sql4="SELECT first_name, last_name FROM store_staff  WHERE fan_id = '$fan_d'";
//echo $sql3;
$result4 = $conn->query($sql4);  //new sql	
while($row4 = $result4->fetch_assoc()) {
$first_name=$row4['first_name'];
$last_name=$row4['last_name'];	
}
	

echo "<td> ".$first_name." ".$last_name."</td>";

//$fan_d = $row['fan'];

echo "</tr>";
$count++;	
       }
	      
		echo "</table>\n";
echo "<a class='btn btn-primary btn-xs  href='#' role='button'>".$count." bookings</a><p>";	

//$result = pg_query($dbcon, $sql);
//$result2 = pg_query($dbcon, $sql2);
//$result2 = pg_query($dbcon, $sql2);
pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
  }


 ?>
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
