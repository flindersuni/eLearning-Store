
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('../../admin/database_connect.php'); 
    //include('../../admin/ldap_connect2.php');	
?>
<title>Staff locations</title>
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
 <div class="col-md-5">
<!--  body begins GF -->

 
<h4>OLT staff locations</h4>

<?php

if ($_SERVER["REMOTE_USER"]==fili0008| $_SERVER["REMOTE_USER"]==lang0133) { 
//echo "The following staff members have access to the 'admin only' section of the eLearning store:<p>";
//echo "<p>";
//echo "<a href=add.php?fan=".$row['fan'].">add new staff member</a><p>";
echo "<a class='btn btn-success btn-xs'  href='add_admin.php?fan=".$row['fan']."' role='button'>add new admin staff member</a>";

//new bit
if ($_GET[search]) {
$search=$_GET[search];

$orderby=$_GET[order];
}
else {
$search = $_POST[search];
$orderby="college,role DESC,last_name";

}
$sql="SELECT * FROM store_admin_staff WHERE role ='1' OR role ='2' ORDER BY ".$orderby;
$result = $conn->query($sql);  //new sql

 if($result)
	{

echo "<table class = 'table table-hover'>";
echo "<thead><tr><th><a href=admin_staff_list.php?search=fan&order=college>College</a></th>";	 
//echo "<thead><tr><th><a href=admin_staff_list.php?search=fan&order=fan>FAN</a></th>";
echo "<th><a href=admin_staff_list.php?search=fan&order=first_name>Name</a></th>";
//echo "<th><a href=admin_staff_list.php?search=fan&order=last_name>Last name</a></th>";

echo "<th><a href=admin_staff_list.php?search=fan&order=role>Role</a></th>";
echo "<th><a href=admin_staff_list.php?search=fan&order=last_name>Workdays</a></th>";	 
echo "</tr></thead>";
            //echo "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
while($row = $result->fetch_assoc()) {
//echo "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row = pg_fetch_array($result);
	
switch ($row['college']) {
case b:  
	$store_location  = "BGL";
	$colour="#FF8A33";	
   break; 
case c:  
	$store_location  = "CILT";
	$colour="#d9534f";	
   break;		
case e:  
	$store_location  = "EPSW";
	$colour="#555555";
   break;
case h:  
	$store_location  = "HASS";
	$colour="#CA33FF";	
   break;		
 case m:  
	$store_location  = "MPH";
	$colour="#356534";
   break;
 case n:  
	$store_location  = "NHS";
	$colour="#66BB66";	
   break;
case s:  
	$store_location  = "SE";
	$colour="#3349FF";	
   break;		
   }
	
if ($location==$store_location) {
$store_location=NULL;		
}else{	
$location=$store_location;	
}
echo "<td><strong><span style='color:".$colour."';>".$store_location."</span></strong></td>";

	
//echo "<td>".$row['fan']."</td>";
echo "<td><span style='color:".$colour."';>".$row['first_name']." ".$row['last_name']."</span></td>";
//echo "<td></td>";

switch ($row['role']) {
case 1:  
	$role  = "ELMO";
   break; 
case 2:  
	$role  = "LD";	
   break;
case 3:  
	$role  = "other";	
   break;
case 4:  
	$role  = "x ";	
   break;		
   }
echo "<td>".$role."</td>";
switch ($row['m']) {
case 1:  
	$m  = "M";
	$colour1="#000000";	
   break; 
case 0:  
	$m  = "X";
	$colour1="#cccccc";	
   break;		
   }
switch ($row['t']) {
case 1:  
   $t  = "T";
   $colour2="#000000";	
   break; 
case 0:  
	$t  = "X";
	$colour2="#cccccc";	
   break;		
   }
switch ($row['w']) {
case 1:  
	$w  = "W";
	$colour3="#000000";	
   break; 
case 0:  
	$w  = "X";
	$colour3="#cccccc";	
   break;		
   }
switch ($row['th']) {
case 1:  
	$th  = "T";
	$colour4="#000000";	
   break; 
case 0:  
	$th  = "X";	
	$colour4="#cccccc";	
   break;		
   }
switch ($row['f']) {
case 1:  
	$f  = "F";
	$colour5="#000000";	
   break; 
case 0:  
	$f  = "X";
	$colour5="#cccccc";	
   break;		
   }	
echo "<td><span style='color:".$colour1."';>".$m."</span> <span style='color:".$colour2."';>".$t." </span><span style='color:".$colour3."';>".$w." </span><span style='color:".$colour4."';>".$th." </span><span style='color:".$colour5."';>".$f."</span></td>";

//echo "<td><a href=modify.php?fan=".$row['fan'].">edit</a><td>";
//echo "<td><a href=delete_admin.php?fan=".$row['fan'].">delete</a><td>";
echo "<td><a class='btn btn-danger btn-xs'  href='edit_admin.php?fan=".$row['fan']."' role='button'>Edit</a></td>";

echo "</tr>";
       }

		echo "</table>\n";

}
		
//$result = pg_query($dbcon, $sql);

if (!$result) {
  echo "An error occured.\n";
  exit;
}
}else {
echo "Sorry, you don't have access rights to this page"; 
        } //end if
pg_close;
 ?>     
<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
