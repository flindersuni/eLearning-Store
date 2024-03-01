
    
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
$item=$_POST['item'];
	 if($item == NULL)
	{
	$item=$_GET['item'];
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
$sql="SELECT * FROM store_items WHERE item='$item'";
$result = $conn->query($sql);  //new sql
	 
while($row = $result->fetch_assoc()) {

			//$row = pg_fetch_array($result);
$cat=$row['cat_id'];
$barcode=$row['barcode'];
$item=$row['item'];		
$description=$row['description'];
$store_status=$row['store_status'];	 
	 
}
echo $sql;
 if(!$result)
	{
	echo	"<h4><span class='style1'>Sorry, there is no item with that number</span></h4>";
	exit;
	}
//$row = pg_fetch_array($result);
//echo $nrows;
	 //exit;
/* ///////////// fix this bit
if ($nrows > 1)
{
echo "<h4>Item ".$item." booking history</h4><p>";	
echo "<strong>That item number appears in the database more than once</strong><p>";
echo "That probably means the original item has been replaced by a newer item<br>";
echo "Pick a specific item to view it's history.<p>";

echo  "<span style='color:#5cb85c'>&#9632</span> = in store  |  <span style='color:#d9534f'>&#9632</span> = out <span class='style4'> | </span>  &#9633 = unavailable  |  <span class='style5'>&#9632</span> = retired<p> ";
//////// 
$sql="SELECT * FROM store_items WHERE item='$item'";
$result = $conn->query($sql);  //new sql

 if($result)
	{
echo "<table class = 'table table-hover'>";
echo "<thead><tr><th>Category</span></th>";
echo "<th>Item</span></th>";
echo "<th>Barcode</span></th>";	
echo "<th>Description</span></th>";
echo "<th>Store status</span></th>";
echo "</th></tr></thead>";
//echo "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";	

while($row = $result->fetch_assoc()) {

			//$row = pg_fetch_array($result);
$cat=$row['cat_id'];
$barcode=$row['barcode'];
$item=$row['item'];		
$description=$row['description'];
$store_status=$row['store_status'];

//echo $barcode;
//exit;

$sql2="SELECT * FROM store_category  WHERE cat_id= ".$cat;
$result2 = $conn->query($sql2);  //new sql
while($row2 = $result2->fetch_assoc()) {
$category=$row2['category'];	
}
if ($store_status=='r') {

$store_style='<span class=style3>';
	
}else {
$store_style=NULL;	
}
	
echo "<td>".$category."</td>";	
echo "<td>".$item."</td>";	
echo "<td><a href='report_bookings_barcode.php?barcode=".$barcode."'>".$barcode."</a></td>";
echo "<td>".$description."</td>";

if ($row['store_status'] == 1)
{$stat_col='color:#5cb85c';
} else if ($store_status == 'r'){
$stat_col='style5';
} else if ($store_status == 'u'){
$stat_col='style4';
} else if ($store_status == '2'){
$stat_col='style3';
} else {
$stat_col='style1';
}
print "<td span style='$stat_col'>&#9632;</span></td>";
//echo "<td>".$status."</td>";		
//print "<td><a href=delete_item.php?barcode=$barcode>delete</a><td>";		
echo "<tr>";
       }
echo "</table>\n";	

}
		
//$result = pg_query($dbcon, $sql);
pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
  }



exit;	
//}
//////////////////
//$barcode=$row['barcode'];
*/
$sql="SELECT * FROM store_bookings WHERE barcode='$barcode' ORDER BY ".$orderby;
//echo $barcode;
//exit;
echo "<h4>Item ".$item." booking history</h4><p>";
//echo "<a href=report_bookings_item_excel.php?barcode=".$barcode.">dump to Excel</a><p>";
echo "<a href='report_bookings_item_excel.php?barcode=".$barcode."' class='btn btn-default btn-xs' id='dump-to-excel'>dump to Excel</a><p>";
//exit;
$result = $conn->query($sql);  //new sql
		 if(!$result)
	{
	echo "<h4>Item ".$item." booking history</h4><p>";	
	echo	"Item ".$item." has never been booked!";
	exit;
	}
	
echo "<table class = 'table table-hover'>";
echo "<thead><tr><th>Booking ID </th>";
echo "<th><a href=report_bookings_item.php?search=booking_id&order=date_1&&item=$item>Booked from </a></th>";
echo "<th><a href=report_bookings_item.php?search=booking_id&order=date_2&item=$item>Booked to </a></th>";
echo "<th>Time out </th>";
//print "<td>Time in </td>";
echo "<th>Return </th>";
echo "<th><a href=report_bookings_item.php?search=booking_id&order=booking_date&item=$item>Booking date </a></th>";
//print "<td>Booking ID </td>";
//print "<td>Name </td>";

//print "<td>Booking id </td>";
echo "<th>Equipment </th>";
echo "<th> </th>";
echo "<th><a href=report_bookings_item.php?search=booking_id&order=fan&item=$item>Name </a></th>";
echo "<th>Comments </th>";
echo "</th></tr></thead>";
            //print "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
while($row = $result->fetch_assoc()) {
//print "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row = pg_fetch_array($result);

echo "<td>".$row['booking_id']."</td>";		   
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
print "<td> ".$e_booking_date." </td>";//show reversed booking date
//print "<td align='center'> ".$row['booking_date']."</td>";
//print "<td align='center'> ".$row['booking_id']."</td>";
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];
$comments=$row['comments'];
//print $row['fan'];
//exit;
//print "<td align='center'> ".$row['fan']."</td>";	
//print "<td align='center'> ".$row['booking_id']."</td>";
//$sql2="SELECT first_name,last_name FROM store_staff  WHERE fan_id ='$fan_d'";
//echo $sql2;

//exit;
	//$result2 = pg_query($sql2);
	//$nrows2 = pg_numrows($result2);	
	//$row = pg_fetch_array($result2);
//print "<td align='center'> ".$row['first_name']." ".$row['last_name']."</td>";
$sql2="SELECT item,cat_id FROM store_items  WHERE barcode = '$barcode'";
$result2 = $conn->query($sql2);  //new sql
while($row2 = $result2->fetch_assoc()) {
$item=$row2['item'];
$cat=$row2['cat_id'];
                                       }	

	
$sql3="SELECT category FROM store_category  WHERE cat_id = '$cat'";
$result3 = $conn->query($sql3);  //new sql3);
while($row3 = $result3->fetch_assoc()) {
$category=$row3['category'];	
                                       }
echo "<td> ".$category."</td>";
echo "<td> ".$item."</td>";

$sql4="SELECT first_name,last_name FROM store_staff  WHERE fan_id = '$fan_d'";
$result4 = $conn->query($sql4);  //new sql
while($row4 = $result4->fetch_assoc()) {
$first_name=$row4['first_name'];
$last_name=$row4['last_name'];	
                                       }
echo "<td> ".$first_name." ".$last_name."</td>";
echo "<td> ".$comments."</td>";
echo"</tr>";
       }
		echo "</table>\n";


		
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
