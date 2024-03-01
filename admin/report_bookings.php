<html>
 <head>   
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 
include('pdo.php');	 

?>
<title>Booking reports</title>
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
 <div class="col-md-8">
<!--  body begins GF -->
 
<style type="text/css">
<!--
.calendar {  font-size: smaller; color: #00BBAA; } 
.calendar-month {  font-size: large; color: #FF0000; } 
.style8 {color: #FF0000}
.style11 {color: #009900}
-->
src="calendar3.js"
</style>


<?php 


$date=date('Y').".".date('n').".".date('d');
echo "<h4>Show booking history for...</h4>";



echo "<div>";
echo "<form name='item_bookings' method='post' action='report_bookings_item.php'>";

echo "<a class='btn btn-primary' href='#' role='button'><span class='glyphicon glyphicon-search' aria-hidden='true'></span> Item number</a>";
echo " <input name='item' type='text' id='item' placeholder='Item number' size='20'>";

echo "<button type='submit' class='btn btn-primary btn-xs'>Submit</button>";
echo "</form>";
echo "</div>";
echo "<p>";


echo "<div>";
echo "<form name='report_bookings_user' method='post' action='report_bookings_user.php'>";
echo "<a class='btn btn-danger' href='#' role='button'><span class='glyphicon glyphicon-user' aria-hidden='true'></span> FAN</a>";

echo " <input name='fan' type='text' id='fan4'  placeholder='FAN' size='8'>"; 

echo "<button type='submit' class='btn btn-primary btn-xs'>Submit</button>";
echo "</form>";
echo "</div>";
echo "<p>";
 
 

echo "<div>";
echo "<form name='delete_bookings_date' method='post' action='show_bookings_date-range.php'>";

echo "<a class='btn btn-success' href='#' role='button'><span class='glyphicon glyphicon-calendar' aria-hidden='true'></span> Date range</a>";

echo "<link type='text/css' rel='stylesheet' href='CalendarControl.css' />";
echo "<script type='Text/JavaScript' src='scw.js'></script>";
echo "Between <input name='date_a' type='text' id='date_a' onClick='scwShow(this,event);' size='10' />";

echo " and <input name='date_b' type='text' id='date_b' onClick='scwShow(this,event);' size='10' />";

echo "<button type='submit' class='btn btn-success btn-xs'>Submit</button>"; 
echo "</form>";
echo "</div>";
echo "<p>";



echo "<p><a class='btn btn-success' href='browse_historical.php' role='button'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> All categories by month</a>";



?>
<!--  body ends GF -->


  </body>

  <?php include('../bootstrap/footer_js.html'); ?>	 
</html>
