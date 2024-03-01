
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('../../admin/database_connect.php'); 
    //include('../../admin/ldap_connect2.php');	
?>
<title>Admin staff</title>
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
 <div class="col-md-6">
<!--  body begins GF -->

 
<?php include($pagedetails['header']); ?>

<? if ($_SERVER["REMOTE_USER"]==fili0008 | $_SERVER["REMOTE_USER"]==lang0133 | $_SERVER["REMOTE_USER"]==wilk0158)  { 
?>
<h4 align="left">Add staff member to store 'admin only' site </h4>
<FORM action="add_admin_do.php" method="POST" name="form1" id="form1">
  <table border="0" cellpadding="1">
    <tr> 
      <td align="right">First name</td>
      <td><input name="first_name" type="text" id="first_name"></td>
    </tr>
    <tr> 
      <td align="right">Last name</td>
      <td><input name="last_name" type="text" id="last_name"></td>
    </tr>
    <tr> 
      <td align="right">FAN</td>
      <td><input name="fan" type="text" id="fan4" size="8"></td>
    </tr>
<tr><td align="right">College</td>
 <td>	  
<select name="college"  id="college" class="form-control input-sm">
<option value=NULL selected="selected">---Pick user's area---</option>
<option value="b">BGL</option>
<option value="e">EPSW</option>
<option value="h">HASS</option>
<option value="m">MPH</option>
<option value="n">NHS</option>
<option value="s">SE</option>
<option value="z">CILT</option>	
	 </select></td>
</tr>	  
<tr><td align="right">Role</td>
 <td>	  
<select name="role"  id="role" class="form-control input-sm">
<option value=NULL selected="selected">---Pick user's role---</option>
<option  value="2">Learning Designer</option>
<option  value="1">ELMO</option>
<option  value="3">other</option>
<option  value=NULL>N/A</option>	

	 </select></td>
</tr>	 	  
  </table>

  <p><input name="SUBMIT" type="SUBMIT" value="Submit">
</form></p>

<p></p>
<?php
//$sql="SELECT * FROM rhd_candidature";
$orderby="fan";
$sql="SELECT * FROM store_admin_staff";
$result = $conn->query($sql);  //new sql;

 if($result)
	{

		{
//$row = pg_fetch_array($result);

?>




<?php 
}
		
				
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
