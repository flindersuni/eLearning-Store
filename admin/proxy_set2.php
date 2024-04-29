
    
<?php 
include('../bootstrap/boot1_ehlstore.html');
session_start();
$_SESSION['proxy_fan'] = $_POST['fan_id'];

	require('staff_admin_check.php'); 
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

//echo $_SESSION [proxy_fan];
$admin=1;


$sql="INSERT INTO store_staff (fan_id, first_name, last_name) VALUES ('".$_POST['fan_id']."','".$_POST['first_name']."','".$_POST['last_name']."')" ;
$result = $conn->query($sql);  //new sql

//echo $sql;
//exit;

if (!$result) {
  echo "An error occured.\n";
  exit;
}






pg_close;

echo "<h4>Proxy set to <span class='label label-danger'>".$_POST['fan_id']." - ".$_POST['first_name']." ".$_POST['last_name']."</span></h4>";
echo  "<a href='../index.php'>continue</a>";
 ?> 

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
