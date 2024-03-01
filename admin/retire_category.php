
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	//require('staff_admin_check.php'); 
	include('database_connect2.php'); 
    //include('ldap_connect2.php');	
?>
<title>Item unavailability</title>
</head>
<body>

      
<!--  body begins GF -->
 <?php




//$sql="UPDATE store_category SET visibility = 'r' WHERE cat_id = '".$_GET['cat_id']."'";
/////////////
$cat_id = $_GET['cat_id'];	
$stmt = $conn->prepare('UPDATE store_category SET visibility = "r" WHERE cat_id = :cat_id');
//$sql = $pdo->prepare("INSERT INTO store_category (category,visibility) VALUES (:category, :visibility)");	 
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->execute();	
////////////	
	
//print $fan;
//print $sql;
//exit;

//$result = $conn->query($sql);  //new sql

 if($result)
	{

		{
//$row = pg_fetch_array($result);


}
		
	  }
//$result = pg_query($dbcon, $sql);

 


//}else {
//echo "Sorry, you're not authorised for administrator rights"; 
       // } //end if
$denied='category-admin.php';
header('Location: '. $denied, false);
exit;

 ?>     
<!--  body ends GF -->


  <? //include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
