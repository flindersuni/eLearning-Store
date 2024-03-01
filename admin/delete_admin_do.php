
    
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
<? include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? include('../bootstrap/sidebar_ehlstore.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="col-md-8">
<!--  body begins GF -->
 
<?php


//$fan=$_POST['cat_id'];

$sql="DELETE FROM store_admin_staff WHERE fan = '".$_POST['fan']."'" ;
$result = $conn->query($sql);  //new sql
if (!$result) {
  echo "An error occured.\n";
	
 exit;
}
//echo $sql;


echo "The staff member has been deleted from admin list<p><br>";
echo "<a class='btn btn-primary btn-xs'  href='admin_staff_list.php' role='button'>Back to admin staff list</a>";	



?>

<!--  body ends GF -->


  
  </body>
</html>
