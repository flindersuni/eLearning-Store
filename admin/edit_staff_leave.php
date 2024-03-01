
    
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

 
<h4>Edit OLT staff leave</h4>

<?php


//new bit
if ($_GET['search']) {
$search=$_GET['search'];

$orderby=$_GET['order'];
}
else {
$search = $_POST['search'];
$orderby="college,role DESC,last_name";

}
$sql="SELECT * FROM store_admin_staff WHERE role ='1' OR role ='2' OR role ='3' ORDER BY ".$orderby;
$result = $conn->query($sql);  //new sql

 if($result)
	{

echo "<table class = 'table table-hover'>";	 
//echo "<thead><tr><th><a href=admin_staff_list.php?search=fan&order=fan>FAN</a></th>";
echo "<thead><tr><th>Name</th>";
//echo "<th><a href=admin_staff_list.php?search=fan&order=last_name>Last name</a></th>";

//echo "<th>Leave type</th>";
echo "<th colspan=5>Leave days</th>";	 
echo "</tr></thead>";
            //echo "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
while($row = $result->fetch_assoc()) {
//echo "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row = pg_fetch_array($result);
//$ml=$row['ml'];
echo "<FORM action='edit_staff_leave_do.php' method='POST' name='edit_staff_leave_do' id='edit_staff_leave_do'>";	
	
switch ($row['ml']) {
case '0':  
	$ml  = "Normal";	
   break;
case '1':  
	$ml  = "Sick";
   break; 
case '2':  
	$ml  = "Annual";	
   break;
case '3':  
	$ml  = "WFH";	
   break;		
   }
	
switch ($row['tl']) {
case '0':  
	$tl  = "Normal";	
   break;
case '1':  
	$tl  = "Sick";
   break; 
case '2':  
	$tl  = "Annual";	
   break;
case '3':  
	$tl  = "WFH";	
   break;		
   }	

switch ($row['wl']) {
case '0':  
	$wl  = "Normal";	
   break;
case '1':  
	$wl  = "Sick";
   break; 
case '2':  
	$wl  = "Annual";	
   break;
case '3':  
	$wl  = "WFH";	
   break;		
   }
	
switch ($row['thl']) {
case '0':  
	$thl  = "Normal";	
   break;
case '1':  
	$thl  = "Sick";
   break; 
case '2':  
	$thl  = "Annual";	
   break;
case '3':  
	$thl  = "WFH";	
   break;		
   }
	
switch ($row['fl']) {
case '0':  
	$fl  = "Normal";	
   break;
case '1':  
	$fl  = "Sick";
   break; 
case '2':  
	$fl  = "Annual";	
   break;
case '3':  
	$fl  = "WFH";	
   break;		
   }	
//echo "<td>".$store_location."</td>";

////
	
	
	
/////
	
	
	
//echo "<td>".$row['fan']."</td>";
echo "<td valign='top'><span style='color:".$colour."';>".$row['first_name']." ".$row['last_name']."</span></td>";
//echo "<td></td>";
	
	

//echo "<td><span style='color:".$colour1."';>".$m."</span> <span style='color:".$colour2."';>".$t." </span><span style='color:".$colour3."';>".$w." </span><span style='color:".$colour4."';>".$th." </span><span style='color:".$colour5."';>".$f."</span></td>";
///////////////////////////////	
echo "<td>M ";
?><select name="ml" id="ml" class="form-control input-sm">
<option  value="<?php echo $row['ml'] ?>" selected="selected"><?php echo $ml ?></option>
<option  value='0'>Normal</option>	
<option  value='1'>Sick leave</option>
<option  value='2'>Annual leave</option>
<option  value='3'>WFH</option>
</select></td><?php

	
echo "<td>T ";
?><select name="tl" id="tl" class="form-control input-sm">
<option  value="<?php echo $row['tl'] ?>" selected="selected"><?php echo $tl ?></option>
<option  value='0'>Normal</option>	
<option  value='1'>Sick leave</option>
<option  value='2'>Annual leave</option>
<option  value='3'>WFH</option>
</select></td><?php
	
echo "<td>W ";
?><select name="wl" id="wl" class="form-control input-sm">
<option  value="<?php echo $row['wl'] ?>" selected="selected"><?php echo $wl ?></option>
<option  value='0'>Normal</option>	
<option  value='1'>Sick leave</option>
<option  value='2'>Annual leave</option>
<option  value='3'>WFH</option>	
</select></td><?php
	

	
echo "<td>Th ";
?><select name="thl" id="thl" class="form-control input-sm">
<option  value="<?php echo $row['thl'] ?>" selected="selected"><?php echo $thl ?></option>
<option  value='0'>Normal</option>	
<option  value='1'>Sick leave</option>
<option  value='2'>Annual leave</option>
<option  value='3'>WFH</option>
</select></td><?php

	
	
echo "<td>F ";
?><select name="fl" id="fl" class="form-control input-sm">
<option  value="<?php echo $row['fl'] ?>" selected="selected"><?php echo $fl ?></option>
<option  value='0'>Normal</option>	
<option  value='1'>Sick leave</option>
<option  value='2'>Annual leave</option>
<option  value='3'>WFH</option>	
</select></td><?php
			
///////////////////////	
	
	
//echo "<td><a href=modify.php?fan=".$row['fan'].">edit</a><td>";
//echo "<td><a href=delete_admin.php?fan=".$row['fan'].">delete</a><td>";
//echo "<td><a class='btn btn-danger btn-xs'  href='edit_admin.php?fan=".$row['fan']."' role='button'>Edit</a></td>";
echo "<input name='fan' type='hidden' value='".$row['fan']."'>";	
echo "<td><input name='SUBMIT' type='SUBMIT' value='Update'></form></td>";
echo "</tr>";
	
       }

		echo "</table>\n";

}
		
//$result = pg_query($dbcon, $sql);

if (!$result) {
  echo "An error occured.\n";
  exit;
}

pg_close;
 ?>     
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
