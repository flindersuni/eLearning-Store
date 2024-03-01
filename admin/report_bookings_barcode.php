
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('database_connect2.php'); 
    //include('ldap_connect2.php');	
?>
<title>Booking reports</title>
</head>
<body>

      <!-- Static navbar -->
<? include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? include('../bootstrap/sidebar_ehlstore.php'); ?>
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
$barcode=$_POST['barcode'];
	 if($barcode == NULL)
	{
	$barcode=$_GET['barcode'];
	//exit;
	}
	if ($_GET[search]) {
$search=$_GET[search];

$orderby=$_GET[order];
}
else {
$search = $_POST[search];
$orderby="booking_id DESC";

}
$sql="SELECT * FROM store_bookings WHERE barcode='$barcode' ORDER BY ".$orderby;
//echo $sql;
echo "<h4>Barcode ".$barcode." booking history</h4><p>";
//echo "<a href=report_bookings_item_excel.php?barcode=".$barcode.">dump to Excel</a><p>";
echo "<a href='report_bookings_item_excel.php?barcode=".$barcode."' class='btn btn-default btn-xs' id='dump-to-excel'>dump to Excel</a><p>";
//exit;
	$result = pg_query($sql);
	$nrows = pg_numrows($result);
		 if($nrows == 0)
	{
	echo	"".$barcode." has never been booked!";
	exit;
	}
	
echo "<table class = 'table table-hover'>";
echo "<thead><tr><th><a href=report_bookings_barcode.php?search=booking_id&order=date_1&barcode=$barcode>Booked from </a></th>";
echo "<th><a href=report_bookings_barcode.php?search=booking_id&order=date_2&barcode=$barcode>Booked to </a></th>";
echo "<th><a href=report_bookings_barcode.php?search=booking_id&order=booking_id&barcode=$barcode>Booking ID </a></th>";	 
echo "<th>Time out </th>";
//print "<td>Time in </td>";
echo "<th>Return </th>";
echo "<th><a href=report_bookings_barcode.php?search=booking_id&order=booking_date&barcode=$barcode>Booking date </a></th>";
//print "<td>Booking ID </td>";
//print "<td>Name </td>";

//print "<td>Booking id </td>";
echo "<th>Equipment </th>";
echo "<th> </th>";
echo "<th><a href=report_bookings_barcode.php?search=booking_id&order=fan&barcode=$barcode>Name </a></th>";

echo "</th></tr></thead>";
            //print "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
for($j=0;$j<$nrows;$j++)
       {
//print "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			$row = pg_fetch_array($result);

$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
print "<td> ".$e_date_1." </td>";//show reversed date 1
//print "<td align='center'> ".$row['date_1']." </td>";
	
$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//
echo "<td> ".$e_date_2." </td>";//show reversed date 2
//print "<td align='center'> ".$row['date_2']."</td>";
echo "<td> ".$row['booking_id']." </td>";
echo "<td> ".$row['time_1']."</td>";
//print "<td align='center'> ".$row['time_2']."</td>";
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
//print "<td align='center'> ".$row['booking_date']."</td>";
//print "<td align='center'> ".$row['booking_id']."</td>";
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];

$sql2="SELECT item,cat_id FROM store_items  WHERE barcode = '$barcode'";
//echo $sql3;
//exit;

	$result2 = pg_query($sql2);
	$nrows2 = pg_numrows($result2);	
	$row = pg_fetch_array($result2);
	
$item=$row['item'];
$cat=$row['cat_id'];
$sql3="SELECT category FROM store_category  WHERE cat_id = '$cat'";
//echo $sql3;
//exit;

	$result3 = pg_query($sql3);
	$nrows3 = pg_numrows($result3);	
	$row = pg_fetch_array($result3);
echo "<td> ".$row['category']."</td>";
echo "<td> ".$item."</td>";

$sql4="SELECT first_name,last_name FROM store_staff  WHERE fan_id = '$fan_d'";
//echo $sql3;
//exit;

	$result4 = pg_query($sql4);
	$nrows4 = pg_numrows($result4);	
	$row = pg_fetch_array($result4);
echo "<td> ".$row['first_name']." ".$row['last_name']."</td>";
echo "</tr>";
       }
echo "</table>\n";


		
$result = pg_query($dbcon, $sql);
//$result2 = pg_query($dbcon, $sql2);
$result2 = pg_query($dbcon, $sql2);
pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
  }

 ?>
<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
