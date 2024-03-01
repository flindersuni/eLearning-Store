
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('../../admin/database_connect.php'); 
    //include('../../admin/ldap_connect2.php');	
?>
<title>Admin staff</title>
</head>
<body>

      <!-- Static navbar -->
<?php //include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <?php //include('../bootstrap/sidebar_ehlstore.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="col-md-6">
<!--  body begins GF -->

 
<?php 


 

//$sql="INSERT INTO store_admin_staff (fan,first_name,last_name,college,role) VALUES ('".$_POST['fan']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['college']."','".$_POST['role']."')" ;
$sql="UPDATE store_admin_staff SET ml = '".$_POST['ml']."', tl = '".$_POST['tl']."', wl = '".$_POST['wl']."', thl = '".$_POST['thl']."', fl = '".$_POST['fl']."' WHERE fan = '".$_POST['fan']."'";
$result = $conn->query($sql);  //new sql
//echo $result;
//exit;

if (!$result) {
  echo "An error occured.\n";
  exit;
}


?>



<?php
$denied='admin_staff_locations.php';
header('Location: '. $denied, false);
exit;





pg_close;


 ?>     
<!--  body ends GF -->


  <?php //include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
