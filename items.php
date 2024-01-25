
<?php 

include('bootstrap/boot1_ehlstore_bookings.html');

    include('staff_check.php'); 
    include ('pdo.php');
////////////////// if admin, you can book items in restricted categories

$fan=$_SERVER['REMOTE_USER'];
try {
$stmt = $conn->prepare('SELECT * FROM store_admin_staff WHERE fan = :fan');
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);
$stmt->execute(); 
}	 
/////////////
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}	



if ($stmt)  { //was if (!$result)
	
$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
	
$stmt = $conn->prepare('SELECT visibility FROM store_category WHERE cat_id= :cat_id');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->execute(); 	


	$admin==1;//temp addition for PHP 8 testing
	if ($row['visibility']==0&&$admin!=1){	
//$denied='hidden_items.php';                   //added for non sql1
   // header('Location: '. $denied, false);
   // exit;	
	
	} 

}else {
	

        } //end if


	
	 ?>
<head>

<TITLE>eLearning store</TITLE>

<script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script> <?php//changed-was "../../../Scripts/AC_RunActiveContent.js" ?>
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
 <?php //include($pagedetails['header']); ?>
<!-- &&& -->

<?php 
 include ('pdo.php');


//////////
//$cat_id=$_GET['cat_id']; //old Nov 2023  
$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023		
$stmt = $conn->prepare('SELECT category FROM store_category WHERE cat_id= :cat_id');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->execute(); 	
/////////	 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
$category=$row['category'];	
}
echo "<h4>".$category."</h4><p>";

$orderby="item";


$store_location=filter_input(INPUT_GET, 'store_location');	// new Nov 2023	
	 
if ($store_location=='b') { 
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."' role='button'>all stores</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=s' role='button'>SE store</a>";
echo "</div><p>";


//$cat_id=$_GET['cat_id']; //old Nov 2023  
$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
$store_location='b';		
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE cat_id= :cat_id AND store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////	
} else if($store_location=='c') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=s' role='button'>SE store</a>";
echo "</div><p>";


$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
$store_location='c';		
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE cat_id= :cat_id AND store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////	
} else if($store_location=='e') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=s' role='button'>SE store</a>";
echo "</div><p>";


$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
$store_location='e';		
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE cat_id= :cat_id AND store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////	
} else if($store_location=='h') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=s' role='button'>SE store</a>";
echo "</div><p>";

$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
$store_location='h';		
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE cat_id= :cat_id AND store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////	
} else if($store_location=='m') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=s' role='button'>SE store</a>";
echo "</div><p>";

$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
$store_location='m';		
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE cat_id= :cat_id AND store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////	
} else if($store_location=='n') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=s' role='button'>SE store</a>";
echo "</div><p>";


$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
$store_location='n';		
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE cat_id= :cat_id AND store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////	
} else if($store_location=='s') {
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>SE store</a>";
echo "</div><p>";

//////////
$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
$store_location='s';		
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE cat_id= :cat_id AND store_location=:store_location AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':store_location', $store_location, PDO::PARAM_STR);	
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////		
} else { 
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-success btn-xs' href='#' role='button'>all stores</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=b' role='button'>BGL store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=c' role='button'>Central store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=e' role='button'>EPSW store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=h' role='button'>HASS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=m' role='button'>MPH store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=n' role='button'>NHS store</a>";
echo "<a class='btn btn-primary btn-xs' href='items.php?cat_id=".$cat_id."&store_location=s' role='button'>SE store</a>";
echo "</div><p>";	
	
//////////
$cat_id=filter_input(INPUT_GET, 'cat_id');	// new Nov 2023	
$store_status='r';	
$stmt = $conn->prepare('SELECT * FROM store_items WHERE cat_id= :cat_id AND store_status!= :store_status ORDER BY item');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////	
}

 $row_count = $stmt->rowCount();
		 if(!$row_count)                            
	{
	echo "<p><b>No items in the '$category' category are available from the store at this location</b>";
	include('../bootstrap/footer_js.html');
	exit;
	}
	 
	 
echo "<table class = 'table table-hover'>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
$item=$row['item'];	

			
echo "<td>".$item."</td>";	

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


echo "<td><img src='images/".$row['image'].".jpg'></td>";
echo "<td valign='top' width='150'>".$row['description']."</td>";
echo "<td><span style='color:".$colour."';><strong>".$store_location."</strong></span></td>";
	
$barcode=$row['barcode'];
$n=date("m");
$Y=date('Y');
if ($row['store_status']=='u')
{
echo "<td><a class='btn btn-danger btn-xs'  href='#' role='button'>unavailable</a></td>";
}else{

echo "<td><a class='btn btn-success btn-xs'  href='bookings.php?barcode=$barcode&n=$n&Y=$Y' role='button'>bookings</a></td>";
//echo "<td>".$row['store_status']."</td>";	
	

	
	
}
	
echo"</tr>";
       }
echo "</table>\n";

//}
		
if (!$stmt) {                     
  echo "An error occured.\n";
  exit;
  }
	?>






<!--  body ends GF -->


  <?php //include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
