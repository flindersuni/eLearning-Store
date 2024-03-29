
 
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 
include('pdo.php');	 
?>
<title>Staff locations</title>
	
<script type="text/javascript">


<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);

}
//-->

//-->
</script>   	
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
 <div class="col-md-4">
<!--  body begins GF -->
<?php $day = date('w');
$week_start = date('l d M Y', strtotime('-'.(1-$day).' days'));//was +
$week_end = date('l d M Y', strtotime('+'.(5-$day).' days')); ?>
 
<h4>OLT staff locations and leave (<?php echo $week_start." - ".$week_end ?>)</h4>

<?php


echo "<a class='btn btn-success btn-xs'  href='edit_staff_locations.php' role='button'>Edit staff locations and workdays</a> <a class='btn btn-danger btn-xs'  href='edit_staff_leave.php' role='button'>Mark staff on leave or WFH</a>";
?>
<a href='#' data-toggle='modal' data-target='#myModal'>
<span style="font-size: 15px" class='glyphicon glyphicon-question-sign' aria-hidden='true'></span></a>
 

<!-- Modal -->

<?php include('locations_help.php'); ?>  
  
<!-- end modal  -->
<?php	 

if	(filter_input(INPUT_GET, 'search')) {	
$search=filter_input(INPUT_GET, 'search');
$orderby=filter_input(INPUT_GET, 'orderby');	
}
else {
$search=filter_input(INPUT_POST, 'search');	
$orderby="college,role DESC,last_name";

}

$stmt = $conn->prepare('SELECT * FROM store_admin_staff WHERE role =1 OR role =2 OR role =3 ORDER BY college,role DESC,last_name');
$stmt->execute();	 

 if($stmt)
	{

echo "<table class = 'table table-hover'>";
echo "<thead><tr><th><a href=admin_staff_locations.php?search=fan&order=college>College</a></th>";	 
echo "<th><a href=admin_staff_locations.php?search=fan&order=last_name>Name</a></th>";

echo "<th><a href=admin_staff_locations.php?search=fan&order=role>Role</a></th>";
echo "<th><span style='color:#ffffff';>Leave</span></th>";		 
echo "<th colspan=5>Workdays</th>";	 
echo "</tr></thead>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 

	
switch ($row['college']) {
case 'b':  
	$store_location  = "BGL";
	$colour="#FF8A33";	
   break; 		
case 'e':  
	$store_location  = "EPSW";
	$colour="#555555";
   break;
case 'h':  
	$store_location  = "HASS";
	$colour="#CA33FF";	
   break;		
 case 'm':  
	$store_location  = "MPH";
	$colour="#356534";
   break;
 case 'n':  
	$store_location  = "NHS";
	$colour="#66BB66";	
   break;
case 's':  
	$store_location  = "SE";
	$colour="#3349FF";	
   break;
case 'z':  
	$store_location  = "Central";
	$colour="#d9534f";	
   break;		
   }
	
if ($location==$store_location) {
$store_location=NULL;		
}else{	
$location=$store_location;	
}
echo "<td><span style='color:".$colour."';>".$store_location."</span></td>";
	
echo "<td><span style='color:".$colour."';>".$row['first_name']." ".$row['last_name']."</span></td>";


switch ($row['role']) {
case '1':  
	$role  = "ELMO";
   break; 
case '2':  
	$role  = "<strong>LD</strong>";	
   break;
case '3':  
	$role  = "other";	
   break;
case '4':  
	$role  = NULL;	
   break;		
   }
echo "<td>".$role."</td>";

	
/////////////////////////////// workdays	
switch ($row['m']) {
case '1':  
	$m  = "Mon ";
	$colour1="#000000";	
	$cell_colour1="success";	
   break; 
case '0':  
	$m  = "Mon ";
	$colour1="#ffffff";
	$cell_colour1="default";	
   break;		
   }
switch ($row['t']) {
case '1':  
   $t  = "Tue ";
   $colour2="#000000";
   $cell_colour2="success";		
   break; 
case '0':  
	$t  = "Tue ";
	$colour2="#ffffff";
	$cell_colour2="default";	
   break;		
   }
switch ($row['w']) {
case '1':  
	$w  = "Wed ";
	$colour3="#000000";
	$cell_colour3="success";		
   break; 
case '0':  
	$w  = "Wed ";
	$colour3="#ffffff";	
	$cell_colour3="default";	
   break;		
   }
switch ($row['th']) {
case '1':  
	$th  = "Thu ";
	$colour4="#000000";
	$cell_colour4="success";		
   break; 
case '0':  
	$th  = "Thu ";	
	$colour4="#ffffff";
	$cell_colour4="default";	
   break;		
   }
switch ($row['f']) {
case '1':  
	$f  = "Fri ";
	$colour5="#000000";	
	$cell_colour5="success";		
   break; 
case '0':  
	$f  = "Fri ";
	$colour5="#ffffff";	
	$cell_colour5="default";	
   break;		
   }
	
///////////////////////////// leave		
switch ($row['ml']) {
case '1':  
	$m  = "Sick";
	$colour1="#ee0000";	
	$cell_colour1="danger";		
   break;
case '2':  
	$m  = "Rec";
	$colour1="#000000";	
	$cell_colour1="danger";	
   break;
case '3':  
	$m  = "WFH";
	$colour1="#0000ee";	
	$cell_colour1="success";	
   break;		
default:  
	$m  = "Mon ";	
   break;		
   }
switch ($row['tl']) {
case '1':  
   $t  = "Sick ";
   $colour2="#ee0000";
   $cell_colour2="danger";	
   break; 
case '2':  
	$t  = "Rec";
	$colour2="#000000";
	$cell_colour2="danger";	
   break;
case '3':  
	$t  = "WFH";
	$colour2="#0000ee";	
	$cell_colour2="success";	
   break;		
default:  
	$t  = "Tue ";
   break;		
   }	
switch ($row['wl']) {
case 1:  
	$w  = "Sick";
	$colour3="#ee0000";	
	$cell_colour3="danger";		
   break;
case '2':  
	$w  = "Rec";
	$colour3="#000000";	
	$cell_colour3="danger";	
   break;
case '3':  
	$w  = "WFH";
	$colour3="#0000ee";	
	$cell_colour3="success";
   break;		
default:  
	$w  = "Wed ";
   break;		
   }
switch ($row['thl']) {
case '1':  
	$th  = "Sick";
	$colour4="#ee0000";	
	$cell_colour4="danger";	
   break;
case '2':  
	$th  = "Rec";
	$colour4="#000000";	
	$cell_colour4="danger";	
   break;
case '3':  
	$th  = "WFH";
	$colour4="#0000ee";	
	$cell_colour4="success";
   break;		
default:  
	$th  = "Thu ";		
   break;		
   }
	
switch ($row['fl']) {
case '1':  
	$f  = "Sick";
	$colour5="#ee0000";	
	$cell_colour5="danger";	
   break;
case '2':  
	$f  = "Rec";
	$colour5="#000000";	
	$cell_colour5="danger";	
   break;
case '3':  
	$f  = "WFH";
	$colour5="#0000ee";	
	$cell_colour5="success";
   break;		
default:  
	$f  = "Fri ";	
   break;		
   }
	
if 	($row['ml']=='1'||$row['tl']=='1'||$row['wl']=='1'||$row['thl']=='1'||$row['fl']=='1'||$row['ml']=='2'||$row['tl']=='2'||$row['wl']=='2'||$row['thl']=='2'||$row['fl']=='2') {
$leave_note="Leave";	
}else {
$leave_note=NULL;		
	}
	
	
echo "<td><span style='color:#ee0000';>".$leave_note."</span></td>";
	
echo "<td class=".$cell_colour1."><span style='color:".$colour1."';>".$m."</span></td>
<td class=".$cell_colour2."><span style='color:".$colour2."';>".$t." </span></td>
<td class=".$cell_colour3."><span style='color:".$colour3."';>".$w." </span></td>
<td class=".$cell_colour4."><span style='color:".$colour4."';>".$th." </span></td>
<td class=".$cell_colour5."><span style='color:".$colour5."';>".$f."</span></td>";



echo "</tr>";	
       }

		echo "</table>\n";

}
		

if (!$stmt) {
  echo "An error occured.\n";
  exit;
}

 ?>     
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
