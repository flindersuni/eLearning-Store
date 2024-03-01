
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
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

$sql="UPDATE store_items SET item = '".$_POST['item']."', image = '".$_POST['image']."', description = '".$_POST['description']."', cat_id = '".$_POST['cat_id']."', status_comment = '".$_POST['status_comment']."' WHERE barcode = '".$_POST['barcode']."'";
//echo $sql;
//exit;

$result = $conn->query($sql);  //new sql

 if($result)
	{

		{
//$row = pg_fetch_array($result);


}
		
	  }
//$result = pg_query($dbcon, $sql);

echo "The item has been modified<p><br>";
//echo "Back to <a href=items.php>Items admin</a><td>";
echo "<td><a class='btn btn-primary btn-xs'  href='items.php' role='button'>Back to items admin</a></td>";	
if (!$result) {
  echo "An error occured.\n";
 exit;
}

 



pg_close;

 ?>

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
