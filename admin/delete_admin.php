
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('database_connect.php'); 
    //include('ldap_connect2.php');	
?>
<title>eLearning store bookings</title>
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
 <div class="col-md-8">
<!--  body begins GF -->
 
<h4>Delete this admin staff member? </h4>


  <?php 

 
$sql="SELECT * FROM store_admin_staff WHERE fan = '".$_GET['fan']."'";
//print $sql;

$result = $conn->query($sql);  //new sql

 if($result)
	{

		{
//$row = pg_fetch_array($result);
//print "<tr><td width=20>FAN</td>";
echo $_GET['fan']."<p>";
//print $fan;

}
		
				
	}
	

//$result = pg_query($dbcon, $sql);
?>
<p>Are you sure you want to delete this admin staff member?</p>
<form name="delete" method="post" action="delete_admin_do.php">
  <button type="submit" class="btn btn-danger">Delete admin</button>
  <input name="fan" type="hidden" value="<?php echo $_GET["fan"] ?>" >
</form>
<?php if (!$result) {
  echo "An error occured.\n";
  exit;
}


 ?>

<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
