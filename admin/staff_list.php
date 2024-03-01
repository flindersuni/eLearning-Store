
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 	
?>
<title>eLearning store</title>
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
<!--  body begins GF --> 
<div class="col-md-6">

<h4>The following staff members have used the eLearning store:</h4>


  <?php


$active='1';	
$stmt = $conn->prepare('SELECT * FROM store_staff WHERE active = :active ORDER BY fan_id');
$stmt->bindParam(':active', $active, PDO::PARAM_STR);		
$stmt->execute();	


 if($stmt)
	{

echo "<table class = 'table table-hover'>";
echo "<thead><th>FAN</strong></th>";
echo "<th>First name</strong></th>";
echo "<th>Last name</strong></th>";
echo "<th>Phone</strong></th>";
echo "<th>Room</strong></th>";
echo "<th>Email</strong></th>";	 
echo "</thead>";
$count=0;	 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 


			

if ($row['blacklist']=='1') {
$row_status='active';
$text_status='<s>';
}else {
$row_status=NULL;
$text_status=NULL;	
}			
echo "<tr class=".$row_status."><td>".$text_status."". $row['fan_id'] ."</td>";
echo "<td>".$text_status."".$row['first_name']."</td>";
echo "<td>".$text_status."".$row['last_name']."</td>";
echo "<td>".$text_status."".$row['phone']."</td>";
echo "<td>".$text_status."".$row['room']."</td>";
echo "<td>".$text_status."".$row['email']."</td>";

echo "<td><a class='btn btn-black btn-xs'  href='toggle_blacklist.php?fan_id=".$row['fan_id']."' role='button'>blacklist</a></td>";
echo "</tr>";
$count++;	
       }
echo "</table>";

echo "<p><strong>".$count." staff</strong>";	 


if (!$stmt) {
  echo "An error occured.\n";
  exit;
}

}else {
echo "Sorry, you don't have access rights to this page"; 
        } //end if



 ?>



<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
