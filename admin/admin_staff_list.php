<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 

include('pdo.php');	
?>
<title>Admin staff</title>
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
 <div class="col-md-6">
<!--  body begins GF -->

 
<h4>Staff only access list - admin page </h4>

<?php
echo 'Current PHP version: ' . phpversion();
echo "<p>";
echo "Store version: 3.8 (6-07-23)";
echo "<p>";
//if ($_SERVER["REMOTE_USER"]==fili0008 | $_SERVER["REMOTE_USER"]==lang0133) {                                   // hidden while testing on local server
if ($_fan==fili0008 ) {  	
echo "The following staff members have access to the 'admin only' section of the eLearning store:<p>";
echo "<p>";
//echo "<a href=add.php?fan=".$row['fan'].">add new staff member</a><p>";
echo "<a class='btn btn-success btn-xs'  href='add_admin.php?fan=".$row['fan']."' role='button'>add new admin staff member</a>";

//new bit
if ($_GET['search']) {
$search=$_GET['search'];

$orderby=$_GET['order'];
}
else {
$search = $_POST['search'];
$orderby="fan";

}
//$sql="SELECT * FROM store_admin_staff ORDER BY ".$orderby;
//$result = $conn->query($sql);  //new sql
$fan='fili0008';	
$stmt = $conn->prepare('SELECT * FROM store_admin_staff ORDER BY :fan');
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);	
$stmt->execute();
 //if($result)
	//{

echo "<table class = 'table table-hover'>";
echo "<thead><tr><th><a href=admin_staff_list.php?search=fan&order=fan>FAN</a></th>";
echo "<th><a href=admin_staff_list.php?search=fan&order=first_name>First name</a></th>";
echo "<th><a href=admin_staff_list.php?search=fan&order=last_name>Last name</a></th>";
echo "<th><a href=admin_staff_list.php?search=fan&order=college>College</a></th>";
echo "<th><a href=admin_staff_list.php?search=fan&order=role>Role</a></th>";
echo "<th><a href=admin_staff_list.php?search=fan&order=last_name>Workdays</a></th>";	 
echo "</tr></thead>";
            //echo "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
//echo "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row = pg_fetch_array($result);
echo "<td>".$row['fan']."</td>";
echo "<td>".$row['first_name']."</td>";
echo "<td>".$row['last_name']."</td>";
switch ($row['college']) {
case 'b':  
	$store_location  = "BGL";
	//$colour="#FF8A33";	
   break; 
case 'e':  
	$store_location  = "EPSW";
	//$colour="#555555";	
   break;
case 'h':  
	$store_location  = "HASS";
	//$colour="#CA33FF";
   break;		
 case 'm':  
	$store_location  = "MPH";
	//$colour="#356534";
   break;
 case 'n':  
	$store_location  = "NHS";
	//$colour="#66BB66";
   break;
case 's':  
	$store_location  = "SE";
	//$colour="#3349FF";	
   break;
case 'z':  
	$store_location  = "CILT";
	//$colour="#d9534f";	
   break;		
   }
	
echo "<td><span style='color:".$colour."';>".$store_location."</span></td>";
switch ($row['role']) {
case '1':  
	$role  = "ELMO";
   break; 
case '2':  
	$role  = "LD";	
   break;
case '3':  
	$role  = "other";	
   break;
default:  
	$role  = NULL;	
   break;		
   }
echo "<td>".$role."</td>";

//echo "<td><span style='color:".$colour1."';>".$m."</span> <span style='color:".$colour2."';>".$t." </span><span style='color:".$colour3."';>".$w." </span><span style='color:".$colour4."';>".$th." </span><span style='color:".$colour5."';>".$f."</span></td>";

//echo "<td><a href=modify.php?fan=".$row['fan'].">edit</a><td>";
//echo "<td><a href=delete_admin.php?fan=".$row['fan'].">delete</a><td>";
echo "<td><a class='btn btn-danger btn-xs'  href='delete_admin.php?fan=".$row['fan']."' role='button'>delete</a></td>";

echo "</tr>";
       }

		echo "</table>\n";

//}
echo "Version 4.0 (coming): PHP 8.2 and SQL injection protection<br>
      Version 3.7: Changed from PostGres to SQL<br>
	  Version 3.6: Changed from LDAP to active directory<br>
	  Version 3.0: Added other colleges<br>
	  Version 2: Bootstrap makeover"; 		

if (!$stmt) {
  echo "An error occured.\n";
  exit;
}
}else {
echo "Sorry, you don't have access rights to this page"; 
        } //end if

 ?>     
<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
