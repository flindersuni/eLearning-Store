
    
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

 
<h4>Edit OLT staff locations and workdays</h4>

<?php


//echo "The following staff members have access to the 'admin only' section of the eLearning store:<p>";
//echo "<p>";
//echo "<a href=add.php?fan=".$row['fan'].">add new staff member</a><p>";
//echo "<a class='btn btn-success btn-xs'  href='edit_staff_loaction.php' role='button'>Edit staff location</a>";

//new bit
if ($_GET['search']) {
$search=$_GET['search'];

$orderby=$_GET['order'];
}
else {
$search = $_POST['search'];
$orderby="college,role DESC,last_name";

}
$sql="SELECT * FROM store_admin_staff ORDER BY ".$orderby;
$result = $conn->query($sql);  //new sql

 if($result)
	{

echo "<table class = 'table table-hover'>";
echo "<thead><tr><th>College</th>";	 
//echo "<thead><tr><th><a href=admin_staff_list.php?search=fan&order=fan>FAN</a></th>";
echo "<th>Name</th>";
//echo "<th><a href=admin_staff_list.php?search=fan&order=last_name>Last name</a></th>";

echo "<th>Role</th>";
echo "<th  colspan=5>Workdays</th>";	 
echo "</tr></thead>";
            //echo "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";
while($row = $result->fetch_assoc()) {
//echo "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row = pg_fetch_array($result);
	
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
	

//echo "<td>".$store_location."</td>";

////
echo "<td valign='top'>";	
echo "<FORM action='edit_staff_locations_do.php' method='POST' name='edit_staff_locations_do' id='edit_staff_locations_do'>";	
?>	

<select name="college"  id="college" class="form-control input-sm">
<option value="<?php echo $row['college'] ?>" selected="selected"><?php echo $store_location ?></option>
<option value='b'>BGL</option>
<option value='e'>EPSW</option>
<option value='h'>HASS</option>
<option value='m'>MPH</option>
<option value='n'>NHS</option>
<option value='s'>SE</option>
<option value='z'>CILT</option>	
</select>	
<?php	
/////
	
echo "</td>";	
	
//echo "<td>".$row['fan']."</td>";
echo "<td><span style='color:".$colour."';>".$row['first_name']." ".$row['last_name']."</span></td>";
//echo "<td></td>";

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
case '4':  
	$role  = "N/A ";	
   break;		
   }

	
//echo "<td>".$role."</td>";
	
	
echo "<td valign='top'>";	
?>	


<select name="role" id="role" class="form-control input-sm">
<option value="<?php echo $row['role'] ?>" selected="selected"><?php echo $role ?></option>
<option  value="2">LD</option>
<option  value="1">ELMO</option>
<option  value="3">other</option>
<option  value="4">N/A</option>	
</select>
		
<?php	
/////	
echo "</td>";	

//echo "<td><span style='color:".$colour1."';>".$m."</span> <span style='color:".$colour2."';>".$t." </span><span style='color:".$colour3."';>".$w." </span><span style='color:".$colour4."';>".$th." </span><span style='color:".$colour5."';>".$f."</span></td>";
///////////////////////////////	
echo "<td>M ";
switch ($row['m']) {
case '1':
	$checkedm="checked='checked'";;
break;	
case '0':
	$checkedm=NULL;		
break;
}
//echo "$name1=".$name1;
//echo "$school_a14_value";
echo "<input type='hidden' name='m' value='0' />";		
echo "<input type='checkbox' name='m' id='m' value='1' ".$checkedm." /></td>";
	
echo "<td>T ";
switch ($row['t']) {
case '1':
	$checkedt="checked='checked'";
break;	
case '0':
	$checkedt=NULL;		
break;
}
echo "<input type='hidden' name='t' value='0' />";		
echo "<input type='checkbox' name='t' id='t' value='1' ".$checkedt." /></td>";	

echo "<td>W ";
switch ($row['w']) {
case '1':
	$checkedw="checked='checked'";
break;	
case '0':
	$checkedw=NULL;	
break;
}
echo "<input type='hidden' name='w' value='0' />";		
echo "<input type='checkbox' name='w' id='w' value='1' ".$checkedw." /></td>";
	

echo "<td>T ";
switch ($row['th']) {
case '1':
	$checkedth="checked='checked'";
break;	
case '0':
	$checkedth=NULL;		
break;
}
echo "<input type='hidden' name='th' value='0' />";	
echo "<input type='checkbox' name='th' id='th' value='1' ".$checkedth." /></td>";
	
	
echo "<td>F ";
switch ($row['f']) {
case '1':
	$checkedf="checked='checked'";
break;	
case '0':
	$checkedf=NULL;	
break;
}
echo "<input type='hidden' name='f' value='0' />";		
echo "<input type='checkbox' name='f' id='f' value='1' ".$checkedf." /></td>";
			
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
