
    
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');

 include('staff_check.php'); 

?>
<title>Quick book</title>

</head>
<body>

      <!-- Static navbar -->
<?php include('bootstrap/nav_ehlstore_bookings.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <?php include('bootstrap/sidebar_ehlstore_bookings.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
    <div class="col-md-8">
<!--  body begins GF --> 


<style type="text/css">
<!--
.style1 {
	font-size: large;
	font-weight: bold;
	color: #FF0000;
}
.style2 {
	font-size: large;
	font-weight: bold;
	color: #000000;
}
-->
</style>


<?php 

echo "<span class='style1'>Error - you haven't picked a start date or end date<br>";
echo "Press your browser's 'back' button and pick some different dates, then try again.";
  ?>




<!--  body ends GF -->


  
<?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
