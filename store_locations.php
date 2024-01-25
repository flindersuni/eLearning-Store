
    
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');

	require('staff_check.php'); //needs updating
    include ('pdo.php'); 
?>
<head>
<title>eLearning store bookings</title>
</head>
<body>

      <!-- Static navbar -->
<?php include('bootstrap/nav_ehlstore_bookings.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <?php include('bootstrap/sidebar_ehlstore_bookings.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="container-fluid">
<!--  body begins GF -->
<?php
   
$todays_date=date('Y').".".date('n').".".date('d');
include ('pdo.php'); 

$fan_id = $_SERVER['REMOTE_USER'];	//temp	

try {	 
$stmt = $conn->prepare('SELECT * FROM store_staff WHERE fan_id = :fan_id');
$stmt->bindParam(':fan_id', $fan_id, PDO::PARAM_STR);
$stmt->execute(); 	 
}
	 
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}
echo "<h4>Store locations</h4><p>";

	
echo "<table class = 'table table-hover'>";
echo "<tr><thead><th>Store  </th>
<th>Location</th>
<th>For staff in... </th>
<th></th>
</thead></tr>";
            

echo "<td>BGL</td><td>LWCM 313</td><td>Business, Government and Law</td><td><img src='images/stores/Law.gif' width='300' height='225'></td></tr>";
echo "<td>EPSW</td><td>Edu 3.15 (via 3.16)</a></td><td>Education, Psychology, Social Work</td><td><img src='images/stores/EPSW.gif' width='300' height='225'></td></tr>";
echo "<td>HASS</td><td>Hums 269</td><td>Humanities, Arts and Social Sciences</td><td><img src='images/stores/HASS.gif' width='300' height='225'></td></tr>";
echo "<td>MPH</td><td>Health Sciences 5.15</td><td>Medicine, Public Health</td><td><img src='images/stores/coming-soon.gif' width='300' height='225'></td></tr>";	 
echo "<td>NHS</td><td>Sturt South S213</td><td>Nursing, Health Sciences</td><td><img src='images/stores/coming-soon.gif' width='300' height='225'></td></tr>";	 
echo "<td>SE</td><td>Physics 1001</td><td>Science and Engineering</td><td><img src='images/stores/SE.gif' width='300' height='225'></td></tr>";
echo "<td>Central</td><td>Eng 470</td><td>Central</td><td><img src='images/stores/Central.gif' width='300' height='225'></td></tr>";
	 
echo "</table>\n";
?>

<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
