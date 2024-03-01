
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	//require('staff_admin_check.php'); 
	//include('database_connect.php'); 
    //include('ldap_connect2.php');	
?>
<title>eLearning store bookings</title>
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
 <div class="col-md-8">
<!--  body begins GF -->

<?php 

///////// 

//$sql3="SELECT * FROM store_items WHERE barcode=".$_POST['barcode'];
//$result3 = $conn->query($sql3);  //new sql

//if ($result3) {
  //echo "<strong>That barcode is already in the store.</strong><br> Use back button then refresh page to generate another random barcode";
  //exit;
//}
////////////

$sql="INSERT INTO store_items (item, image, barcode, cat_id, description, store_location, store_status) VALUES ('".$_POST['item']."', '".$_POST['image']."', '".$_POST['barcode']."', '".$_POST['cat_id']."', '".$_POST['description']."', '".$_POST['store_location']."', '1')" ;

$result = $conn->query($sql);  //new sql
//echo $sql;

pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
}

?>
 
<h4>Store item added.</h4>

<?php

//Send HTML email to someone 
$sql2="SELECT category FROM store_category  WHERE cat_id= '".$_POST['cat_id']."'";
$result2 = $conn->query($sql2);  //new sql
while($row2 = $result2->fetch_assoc()) {
$category=$row2['category'];	
}
$store_location=$_POST['store_location'];
switch ($store_location) {
case 'b':  
	$store_location  = "BGL";
   break; 
case 'c':  
	$store_location  = "CILT";	
   break;
case 'e':  
	$store_location  = "EPSW";	
   break;
case 'h':  
	$store_location  = "HASS";
   break;		
 case 'm':  
	$store_location  = "MPH";
   break;
 case 'n':  
	$store_location  = "NHS";
   break;
case 's':  
	$store_location  = "SE";	
   break;		
   } 	 
	 
	 
$to = "george.filipov@flinders.edu.au;jason.lange@flinders.edu.au";
$subject = "Store item added";
$body = "
<body bgcolor='#FFFF99'>
<h4>A new item has been added to the store database</h4>

Item: <strong>".$_POST['item']."</strong><br>
Barcode: <strong>".$_POST['barcode']."</strong><br>
Image: <strong>".$_POST['image']."</strong><br>
Category: <strong>".$category."</strong><br>
Store location: <strong>".$store_location."</strong><br>
  </tr>
 </table> 



";


$body .= "</ul>\n";
$_POST['email'];
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= 'From:   ' . "$email\r\n";
//$headers .= 'Reply-To: ' . "$email . \r\n" ;
mail($to, $subject, $body, $headers);


?>
  
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
