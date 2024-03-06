
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 
include('pdo.php');
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
	 
echo "<h5>Book equipment as someone else!</h5>";
//echo "If they have used the store previously just pick their name from the drop down list below.<br>List is sorted by FAN, which <i>may</i> be different than first four letters of surname.<p>";
echo "<div>";
//echo "<form name='proxy_booking2' id='form2' method='post' action='proxy_set.php'>";

//include('browse_fans.php');

//echo "<button type='submit' class='btn btn-danger btn-xs'>Use this FAN as proxy user</button> ";

//echo "</form>";

echo "</div>";
echo "<p><p>";     
echo "<p><b>or</b><p>";

echo "Anyone who is a staff member can use the store now, but if they <i>haven't</i> used it before <i>and</i> you need to make a booking for them, you need to add them here first.<p>";
echo "<div>";
echo "<form name='proxy_booking1' id='form1' method='post' action='proxy_set2.php'>";
echo "<input name='fan_id' type='text' id='fan_id'  placeholder='FAN' size='8'> <input name='first_name' type='text' id='first_name'  placeholder='First name' size='20'> <input name='last_name' type='text' id='last_name'  placeholder='Last name' size='20'> ";
echo "<button type='submit' class='btn btn-danger btn-xs'>Use this person as proxy user</button> ";	 

echo "</form>";	 
echo "</div><p>";
	 
	 

	 
//echo "Lookup FAN of staff who have used store before.";	 
echo "<p>";



echo "<p><p>";

echo "<p><b>or</b><p>";
echo "<a class='btn btn-success btn-xs' href='proxy_me.php' role='button'>Go back to me as the user</a>";


 ?>   
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
