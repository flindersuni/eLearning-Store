
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('database_connect.php'); 
    //include('ldap_connect2.php');	
?>
<title>Item availability</title>
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
// title

echo "<h4>Item availability</h4>";


echo "<div class='btn-toolbar' role='toolbar'>";

if ($_GET['retired']==y) {
	
//echo "<a class='btn btn-success btn-xs' href='item_availability.php' role='button'>all items</a>";
//echo "<a class='btn btn-primary btn-xs  href='item_availability.php?retired=y' role='button'>don't include retired items</a>";


echo "<a href=item_availability.php>all items</a> | hide retired items";
$sql="SELECT * FROM store_items WHERE store_status!='r' ORDER BY item";
}

else  {
//echo "<a class='btn btn-primary btn-xs' href='item_availability.php' role='button'>all items</a>";
//echo "<a class='btn btn-success btn-xs  href='item_availability.php?retired=y' role='button'>don't include retired items</a>";


echo "all items | <a href=item_availability.php?retired=y>hide retired items</a>";
$sql="SELECT * FROM store_items ORDER BY item";
}



echo "</div>";




echo "<p>";


//$sql="SELECT * FROM store_items ORDER BY item";
//$sql="SELECT * FROM store_items WHERE store_status!='r' ORDER BY item";
$result = $conn->query($sql);  //new sql

		 if(!$result)
	{
	echo	"No bookings";
	exit;
	}
echo "<table class = 'table table-hover'>";
echo "<thead><th>Category </th>";
echo "<th>Item no. </th>";
echo "<th>Barcode </th>";
echo "<th>In store? <a href='../../pers/help-tick_status.php'>
 <span style='font-size: 15px' class='glyphicon glyphicon-question-sign' aria-hidden='true'></span>
 </a></th>";
echo "<th>Store</th>"; 	 

echo "</thead>";

while($row = $result->fetch_assoc()) {

			//$row = pg_fetch_array($result);


$fan_d = $row['fan'];
$barcode = 	$row['barcode'];
//echo $row['fan'];
//exit;
//echo "<td align='center'> ".$row['fan']."</td>";	
//echo "<td align='center'> ".$row['booking_id']."</td>";


//echo $sql2;

//exit;


$sql3="SELECT item,store_status,cat_id,barcode,status_comment,store_location FROM store_items  WHERE barcode = '$barcode'";
//echo $sql3;
//exit;
$result3 = $conn->query($sql3);  //new sql
while($row3 = $result3->fetch_assoc()) {
	
                                       
$cat_id=$row3['cat_id'];
$store_status=$row3['store_status'];
//exit;
$item=$row3['item'];
$barcode=$row3['barcode'];
$status_comment=$row3['status_comment'];
$store_location=$row3['store_location'];
//echo "<td align='center'> ".$row['item']."</td>";
//echo $row['store_status'];
//exit;
}
if ($store_status == 1)
{$stat_col='#5cb85c';
  $glyph='stop';
} else if ($store_status == 'r'){
$stat_col='#000';
$glyph='stop';
} else if ($store_status == 'u'){
$stat_col='000';
$glyph='unchecked';
} else if ($store_status == '2'){
$stat_col='style3';
$glyph='stop';
} else {
$stat_col='#d9534f';
$glyph='stop';
}


$sql4="SELECT category FROM store_category  WHERE cat_id = '$cat_id'";
$result4 = $conn->query($sql4);  //new sql
while($row4 = $result4->fetch_assoc()) {
$category=$row4['category'];	
                                       }
echo "<tr><td> ".$category."</td>";
echo "<td> ".$item."</td>";
echo "<td ><a href=edit_item.php?barcode=".$barcode.">".$barcode."</a></td>";
echo "<td> <span class='glyphicon glyphicon-".$glyph."' aria-hidden='true' style='color:".$stat_col."'></span></td>";
switch ($store_location) {
case b:  
	$store_location  = "BGL";
	$colour="#FF8A33";	
   break; 
case c:  
	$store_location  = "CILT";
	$colour="#d9534f";	
   break;
case e:  
	$store_location  = "EPSW";
	$colour="#555555";	
   break;
case h:  
	$store_location  = "HASS";
	$colour="#CA33FF";
   break;		
 case m:  
	$store_location  = "MPH";
	$colour="#356534";
   break;
 case n:  
	$store_location  = "NHS";
	$colour="#66BB66";
   break;
case s:  
	$store_location  = "SE";
	$colour="#3349FF";	
   break;		
   } 
 echo "<td><span style='color:".$colour."';><strong>".$store_location."</strong></span></td>"; 	
//echo "<td><a href=check_bookings_item.php?barcode=".$barcode.">check bookings</a></td>";
echo "<td><a class='btn btn-warning btn-xs'  href='check_bookings_item.php?barcode=".$barcode."' role='button'>check bookings</a></td>";
//echo "<td><a href=toggle_item_availablity.php?barcode=".$barcode.">in store?</a></td>";
echo "<td><a class='btn btn-default btn-xs'  href='#' role='button'>in store?</a></td>";
//echo "<td><a href=toggle_item_unavailablity.php?barcode=".$barcode.">unavailable</a></td>";
echo "<td><a class='btn btn-danger btn-xs'  href='toggle_item_unavailability.php?barcode=".$barcode."' role='button'>unavailable</a></td>";
//echo "<td><a href=toggle_item_retirement.php?barcode=".$barcode.">retired</a><td>";
echo "<td><a class='btn btn-black btn-xs'  href='toggle_item_retirement.php?barcode=".$barcode."' role='button'>retired</a></td>";
//echo "<td>$stat_col</td>";		
//$fan_d = $row['fan'];
echo "<td>".$status_comment."<td>";
echo"</tr>";
       }
		echo "</table>\n";


		
//$result = pg_query($dbcon, $sql);
//$result3 = pg_query($dbcon, $sql3);
//$result4 = pg_query($dbcon, $sql4);
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
