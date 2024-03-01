
    
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
<? include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? include('../bootstrap/sidebar_ehlstore.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="col-md-6">
<!--  body begins GF -->

 
<?php 


 if ($_SERVER["REMOTE_USER"]==fili0008 | $_SERVER["REMOTE_USER"]==lang0133 | $_SERVER["REMOTE_USER"]==wilk0158)  {

$sql="INSERT INTO store_admin_staff (fan,first_name,last_name,college,role) VALUES ('".$_POST['fan']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['college']."','".$_POST['role']."')" ;

$result = $conn->query($sql);  //new sql



if (!$result) {
  echo "An error occured.\n";
  exit;
}

?>
<h2>Add staff member to store 'admin only' site</h2>
<p>Staff member has been added</p>


<?
echo "Back to <a href=admin_staff_list.php>Admin staff page</a><td>";




}else {
echo "Sorry, you don't have access rights to this page"; 
        } //end if
pg_close;


 ?>     
<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
