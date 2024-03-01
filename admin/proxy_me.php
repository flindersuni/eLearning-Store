
    
<?php
session_start();
$_SESSION['proxy_fan'] = $info[0]["cn"][0]; 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('database_connect.php'); 
    //include('ldap_connect2.php');	
?>
<title>eLearning store bookings</title>
</head>
<body>


<!--  body begins GF -->
 <?php 

$denied='../index.php';
header('Location: '.$denied, false);
exit;

 ?> 
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
