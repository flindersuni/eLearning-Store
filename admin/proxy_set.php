
    
<?php 
include('../bootstrap/boot1_ehlstore.html');
session_start();
$_SESSION['proxy_fan'] = $_POST['fan'];

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
 <div class="container-fluid">
<!--  body begins GF -->
 <?php 
echo "<h4>Proxy set to <span class='label label-danger'>".$_POST['fan']."</span></h4>";
//echo $_SESSION [proxy_fan];
$admin='1';
echo  "<a href='../index.php'>continue</a>";

 ?> 

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
