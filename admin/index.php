  <?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 

?>
<title>eLearning store</title>
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
  <h4>Welcome to the admin section of the eLearning store</h4>
  <p>Click on <strong>eLearning store</strong> on left side of the top banner to get back to this page at any time.<p>
     Click on <strong>Equipment loan store for staff</strong> on left side of the top banner to book equipment.<p>
     Or click on quick links below   <br>


<table border='0' cellpadding='6' cellspacing='6'>
  <tr>
        <td align='center'><a href='report_bookings_today.php'><img src='images/bookings.jpg' width='115' height='115' border='0' class="img-circle"></a><br>
    Today's bookings</td>
    
     <td align='center'>
     <a href='proxy_booking.php'><img src='images/proxy.jpg' width='115' height='115' border='0' class="img-circle"></a><br>
      Proxy bookings</td>
 

    
    <td align='center'><a href='report_bookings.php'><img src='images/report.jpg' width='115' height='115' border='0' class="img-circle"></a><br>
       Booking reports</td>
  </tr>
  <tr>
      <td align='center'><a href='quick_access.php'><img src='images/mobile.jpg' width='115' height='115' border='0' class="img-circle"></a><br>
       Mobile despatch</td>
    </tr>
</table>



 
      
        <p> <!--  body ends GF -->
          
          
          <?php include('../bootstrap/footer_js.html'); ?>
        </p>
  </body>
</html>
