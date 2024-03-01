
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');

    //include('staff_check.php'); 
    //include('database_connect2.php');	 

	 ?>
<head>
<title>eLearning store</title>
</head>
<body>

      <!-- Static navbar -->
<? include('bootstrap/nav_ehlstore_bookings.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? //include('bootstrap/sidebar_ehlstore_bookings.php'); ?>
  </div>
   <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="container-fluid">
<!--  body begins GF -->
<?
echo "Sorry, you have been <u>blacklisted</u><p>"; 
echo "If you think you <i>should</i> have access to these pages please email <a href='mailto:epsw.elearning@flinders.edu.au?subject=Blacklisted%20from%20eLearning%20store'>epsw.elearning@flinders.edu.au</a><p>";

?>
<img src="images/blacklist.PNG" width="292" height="191" align="left" alt=""/>
<!--  body ends GF -->


  <? include('bootstrap/footer_js_bookings.html'); ?>
</body>
</html>
