
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('database_connect.php'); 
    //include('ldap_connect2.php');	
?>
<title>Item availability</title>
</head>
<body>

      
<!--  body begins GF -->
 <?php

$sql="SELECT store_status FROM store_items  WHERE barcode='".$_GET['barcode']."'";


$result = $conn->query($sql);  //new sql
while($row = $result->fetch_assoc()) {
$store_status=$row['store_status'];	 
 }	
	//echo $row['store_status'];
	//exit;
	if ($store_status=='1')
	{
	$new_store_status='0';
	}
	else
	{ 
	$new_store_status='1';
	}

/*		
switch ($row['store_status']) {
case 1:
$new_store_status='u';
break;
case 0:
 $new_store_status='u'
break;
case 2:
 $new_store_status='u'
break;
case 'u':
 $new_store_status='1'
break;
}
*/
$sql="UPDATE store_items SET store_status = '$new_store_status' WHERE barcode = '".$_GET['barcode']."'";
//print $fan;
//print $sql;
//exit;

$result = $conn->query($sql);  //new sql

 if($result)
	{

		{
//$row = pg_fetch_array($result);


}
		
	  }
//$result = pg_query($dbcon, $sql);


if (!$result) {
  echo "An error occured.\n";
 exit;
}

 


//}else {
//echo "Sorry, you're not authorised for administrator rights"; 
       // } //end if
$denied='item_availability.php';
header('Location: '. $denied, false);
exit;

 ?>     
<!--  body ends GF -->


  <? //include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
