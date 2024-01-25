
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('pdo.php'); 
    //include('ldap_connect2.php');	
?>
<title>eLearning store bookings</title>
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
 <div class="container-fluid">
<!--  body begins GF -->
 <?php 
echo "<h4>Proxy booking</h4>";
//echo "<h4><span style='color:#FF0000';>THIS PAGE STILL TESTING. DON'T USE IT!</span></h4>";
	 
echo "<h5>Book equipment as someone else!</h5>";
echo "If they have used the store previously just pick their name from the drop down list below.<br>List is sorted by FAN, which <i>may</i> be different than first four letters of surname.<p>";
echo "<div>";
echo "<form name='proxy_booking2' id='form2' method='post' action='proxy_set.php'>";
//echo "<a class='btn btn-danger' href='#' role='button'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> FAN</a>";
//echo "<h3>Show booking history for a user (fan)</h3>";
//had to do it as HTML to work for some reason
//echo " <input name='fan' type='text' id='fan4'  placeholder='Type a FAN' size='8'>"; 
//// test FAN lookup
//echo "<br>or<br>";
include('browse_fans.php');
////
	 
//echo  " <input name='Submit user query' type='submit'  value='FAN query'>";
//echo " <a class='btn btn-danger btn-xs' href='report_bookings_user.php?fan=".$_GET['fan']."'>Submit</button>";
echo "<button type='submit' class='btn btn-danger btn-xs'>Use this FAN as proxy user</button> ";

echo "</form>";
//echo "<button type='submit' class='btn btn-default btn-xs'>Lookup FAN</button>";	 
echo "</div>";
echo "<p><p>";     
echo "<p><b>or</b><p>";
//FAN
echo "Anyone who is a staff member can use the store now, but if they <i>haven't</i> used it before <i>and</i> you need to make a booking for them, you need to add them here first.<p>";
echo "<div>";
echo "<form name='proxy_booking1' id='form1' method='post' action='proxy_set2.php'>";
echo "<input name='fan_id' type='text' id='fan_id'  placeholder='FAN' size='8'> <input name='first_name' type='text' id='first_name'  placeholder='First name' size='20'> <input name='last_name' type='text' id='last_name'  placeholder='Last name' size='20'> ";
echo "<button type='submit' class='btn btn-danger btn-xs'>Use this person as proxy user</button> ";	 
//// test FAN lookup
echo "</form>";	 
echo "</div><p>";
	 
	 

	 
//echo "Lookup FAN of staff who have used store before.";	 
echo "<p>";



echo "<p><p>";
//echo "<a href=proxy_default.php>or use the generic user 'EHL'</a>";
//echo "<a class='btn btn-primary btn-xs' href='proxy_default.php' role='button'>or use the generic user 'EHL'</a>";

//echo "<p><p>";
//echo "<a href=proxy_default.php>or use the generic user 'EHL'</a>";
echo "<p><b>or</b><p>";
echo "<a class='btn btn-success btn-xs' href='proxy_me.php' role='button'>Go back to me as the user</a>";

//echo "or use the generic user 'taps0007'";
//echo "<FORM name=generic_user action=proxy_default.php method=post><INPUT type=submit value='Generic user' name='Generic user'>"; 
//echo "</FORM>";
  

 



//pg_close;
 ?>   
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
