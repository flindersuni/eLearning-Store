
    
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
include('staff_check.php'); 	
include ('pdo.php'); 	
?>

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
 <div class="col-md-8">
<!--  body begins GF -->

<h4>Browse by store location</h4>

<p>
  <?php
/*echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs active' href='items.php' role='button'>active items only</a>";
echo "<a class='btn btn-primary btn-xs' href='items_all.php' role='button'>include retired items</a>";
//echo "<a href='#menu-toggle' class='btn btn-default btn-xs' id='menu-toggle'>Toggle Menu</a><p>";
echo "<a class='btn btn-success btn-xs' href='#bottom' role='button'>add item</a>";	
echo "</div>";
*/
  
  
   
$orderby="item";
$store_location=filter_input(INPUT_GET, 'store_location');	// new Nov 2023		
 
	
try {   
if ($store_location=='b') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php' role='button'>all stores</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=s' role='button'>SE store</a>";
echo "</div><p>";


$store_location='b';
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);
$stmt->execute();	
}
else if($store_location=='c') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=s' role='button'>SE store</a>";
echo "</div><p>";


$store_location='c';
$store_status='r';
$stmt = $conn->prepare('SELECT * FROM store_items WHERE store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute();	
}	 
else if($store_location=='e') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=s' role='button'>SE store</a>";
echo "</div><p>";


$store_location='e';
$store_status='r';
$stmt = $conn->prepare('SELECT * FROM store_items WHERE store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);
$stmt->execute();		
}
else if($store_location=='h') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=s' role='button'>SE store</a>";
echo "</div><p>";
	

$store_location='h';
$store_status='r';
$stmt = $conn->prepare('SELECT * FROM store_items WHERE store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute();		
}
else if($store_location=='m') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=s' role='button'>SE store</a>";
echo "</div><p>";

$store_location='m';
$store_status='r';
$stmt = $conn->prepare('SELECT * FROM store_items WHERE store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute();		
}
else if($store_location=='n') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=s' role='button'>SE store</a>";
echo "</div><p>";

//$sql="SELECT * FROM store_items  WHERE store_location='n' AND store_status!= 'r' ORDER BY ".$orderby;
$store_location='n';
$store_status='r';
$stmt = $conn->prepare('SELECT * FROM store_items WHERE store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);
$stmt->execute();		
}
else if($store_location=='s') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>SE store</a>";
echo "</div><p>";


$store_location='s';
$store_status='r';
$stmt = $conn->prepare('SELECT * FROM store_items WHERE store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);
$stmt->execute();		
}	 
else  {	
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='browse_items_by_college.php?store_location=s' role='button'>SE store</a>";
echo "</div><p>";	
	


$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE store_status!= :store_status');
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute();	
}
	
}
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}	
//echo $sql;
 if($stmt) //was ! pre 8.2
	{
echo "<table class = 'table table-hover'>";
//echo "<th></th>";
//echo "<thead><tr><th>Category</th>";
//echo "<th>Items</th>";
//echo "<th>Barcode</th>";	
//echo "<th>Description</th>";
//echo "</tr></thead>";
//echo "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";	
//echo $result;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			//$row = pg_fetch_array($result);
$cat=$row['cat_id'];
$barcode=$row['barcode'];
$item=$row['item'];	
    
$description=$row['description'];
$store_status=$row['store_status'];




//$store_location='n';
//$store_status='r';
//$item='item';	
$stmt2 = $conn->prepare('SELECT * FROM store_category WHERE cat_id= :cat_id');
//$stmt->bindParam(':store_category', $store_category, PDO::PARAM_STR);
$stmt2->bindParam(':cat_id', $cat, PDO::PARAM_INT);
//$stmt->bindParam(':item', $item, PDO::PARAM_STR);	
$stmt2->execute();	
	


if ($store_status=='r') {

$store_style='<span class=style3>';
	
}else {
$store_style=NULL;	
}
switch ($row['store_location']) {
case 'b':  
	$store_location  = "BGL STORE<br>LWCM Rm 313";
	$colour="#FF8A33";	
   break; 
case 'c':  
	$store_location  = "CENTRAL STORE<br>Engineering Rm 470";
	$colour="#d9534f";	
   break;
case 'e':  
	$store_location  = "EPSW STORE<br>Education Rm 3.16";
	$colour="#555555";	
   break;
case 'h':  
	$store_location  = "HASS STORE<br>Humanities Rm 269";
	$colour="#CA33FF";
   break;		
 case 'm':  
	$store_location  = "MPH STORE<br>Health Sciences 5.15";
	$colour="#356534";
   break;
 case 'n':  
	$store_location  = "NHS STORE<br>Sturt South S213";
	$colour="#66BB66";
   break;
case 's':  
	$store_location  = "SE STORE<br>Engineering Rm 4.63";
	$colour="#3349FF";	
   break;		
   }	
//echo "<td><img src='../images/".$row['image'].".jpg' width='75' height='25'></td>";//new
echo "<td>".$store_style.$row2['category']."</td>";	
echo "<td>".$store_style.$item."</td>";	
//echo "<td>".$store_style.$barcode."</td>";
echo "<td><img src='images/".$row['image'].".jpg'></td>";    
echo "<td>".$store_style.$description."</td>";	
echo "<td><span style='color:".$colour."';><strong>".$store_location."</strong></span></td>";    
//echo "<td><a href=modify_item.php?barcode=$barcode>edit</a><td>";
//echo "<td><a class='btn btn-default btn-xs'  href='edit_item.php?barcode=$barcode' role='button'>edit</a></td>";		
//print "<td><a href=delete_item.php?barcode=$barcode>delete</a><td>";
$barcode=$row['barcode'];
$n=date ('m');
$Y=date ('Y');
if ($row['store_status']=='u')
{
//echo "<td class='style1'>unavailable</td>";
echo "<td><a class='btn btn-danger btn-xs'  href='#' role='button'>unavailable</a></td>";
}else{
//echo  "<td><a href=bookings.php?barcode=$barcode&n=$n&Y=$Y>bookings</a></td>";
echo "<td><a class='btn btn-success btn-xs'  href='bookings.php?barcode=$barcode&n=$n&Y=$Y' role='button'>bookings</a></td>";
}    
echo "<tr>";
       }
//echo "<tr><td colspan='5' class='success'></td>";	 
echo "</table>\n";	

}
		
//$result = pg_query($dbcon, $sql);
//pg_close;
//if (!$stmt) { //was $!result-is this working?
 // echo "An error occured.\n";
  //exit;
  //}
  

  
	?>
  

  <!-- &&& --> 

</p>
<a id="bottom"></a>




  
<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
