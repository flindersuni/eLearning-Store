
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 

?>
<title>Quick return</title>

</head>
<body>

      <!-- Static navbar -->
<? include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? //include('../../admin/bootstrap/sidebar_ehlstore_admin.html'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
<!--  body begins GF --> 

<?php 
// title




$date_string =mktime(0, 0, 0);
$date=date("Y.m.d", $date_string);
//$date=date(Y).".".date(n).".".date(d);

$date_exp=explode(".",$date);//reverse date 
$e_date=$date_exp[2]."-".$date_exp[1]."-".$date_exp[0];//



echo "<h2><span class='label label-success'>Returns for ".$e_date."</span></h2>";
echo "";
echo "<p>";

echo "<p>";

$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND (barcode != '046602' AND barcode != '046616' AND barcode != '046617' AND barcode != '046618' AND barcode != '00956' AND barcode != '00954' AND barcode != '00955') ORDER BY booking_id";
//echo $sql;


$result = $conn->query($sql);  //new sql;

		 if(!$result)
	{
	echo	"No equipment due back today";
	echo "<p><a href='quick_access.php'><button type='button' class='btn btn-primary btn-lg dropdown-toggle'>Back to mobile despatch</button></a>";
	exit;
	}
	
	
echo "<table class = 'table table-hover'>";


while($row = $result->fetch_assoc()) {
$barcode=$row['barcode'];
			//$row = pg_fetch_array($result);

switch ($row['ret']){
case 1:
	$class="success";
break;
case 0:
	$class=NULL;
break;
}	
	
	
$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
echo "<tr>";

$sql6="SELECT * FROM store_items  WHERE barcode = '".$barcode."'";
//echo $sql6;
$result6 = $conn->query($sql6);  //new sql	
while($row6 = $result6->fetch_assoc()) {
$image=$row6['image'];	
}

	

echo "<td class=".$class."><a href='quick_access_return.php?barcode=".$barcode."&booking_id=".$row['booking_id']."&date_string=".$date_string."'><img src='../images/".$image.".jpg'></a></td>";
//echo $sql6;
//echo "<td> ".$e_date_1." - ";//show reversed date 1
;	

$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//


echo "<td class=".$class.">Booked ".$e_date_1." </td>";//show reversed date 2


echo "<td class=".$class."> ".$row['time_1'];

if ($row['time_2']!=NULL)
{
$return_time=$row['time_2']+1;

echo " to ". $return_time."</td>";
}else{
//echo "<td > </td>";
}

$fan_d = $row['fan'];
$barcode = 	$row['barcode'];
$returned=$row['ret'];
$booking_id=$row['booking_id'];


$sql2="SELECT first_name,last_name FROM store_staff  WHERE fan_id ='$fan_d'";
$result2 = $conn->query($sql2);  //new sql
while($row2 = $result2->fetch_assoc()) {
$first_name=$row2['first_name'];
$last_name=$row2['last_name'];	
}
echo "<td class=".$class."> ".$first_name." ".$last_name."</td>";
$sql3="SELECT item,store_status,cat_id,store_location FROM store_items  WHERE barcode = '$barcode'";

$result3 = $conn->query($sql3);  //new sql
while($row3 = $result3->fetch_assoc()) {	
$cat_id=$row3['cat_id'];
$item=$row3['item'];
$store_location=$row3['store_location'];
$store_status=$row3['store_status'];	
}


switch ($returned) {
case 0:
    $status=NULL;	
break;	
case 1:
    $status="<span class='glyphicon glyphicon-ok' aria-hidden='true' style='color:#5cb85c'></span>";	
break;	
}
switch ($store_status) {
case 1:
    $stat_col='style2';	
break;	
case 0:
    $stat_col='style1';	
break;
case 2:
    $stat_col='style3';	
break;	
}

$sql4="SELECT category FROM store_category  WHERE cat_id = '$cat_id'";
//echo $sql4;
//exit;

$result4 = $conn->query($sql4);  //new sql
while($row4 = $result4->fetch_assoc()) {
$category=$row4['category'];	
}
echo "<td class=".$class."> ".$category." ".$item."</td>";

echo "<td align='center' class=".$class.">$status</td>";


echo "</tr>";
       }
echo "</table>\n";
?>
<a href="quick_access.php"><button type="button" class="btn btn-primary btn-lg dropdown-toggle">Back to mobile despatch</button></a>
<?		

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
