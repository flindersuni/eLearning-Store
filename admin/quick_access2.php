
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	include('database_connect.php'); 
    include('ldap_connect2.php');	
?>
<title>Quick access</title>
</head>
<body>

      <!-- Static navbar -->
<? include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
<div id="sidebar-wrapper">    
<? //include('../../admin/bootstrap/sidebar_ehlstore_admin.html'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
<!--  body begins GF --> 

<h1></h1>

<div class="container ">
<div class="col-md-5">
<a class="btn btn-danger btn-block" data-toggle="modal" data-target="#myModal" ><h1>Equipment out <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></h1></a></div>

<div class="col-md-5">
<a class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal" ><h1>Equipment in <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></h1></a> 
</div>

<div class="col-md-10">
<h1></h1>
</div>
</div>


<div class="container">
<table>
<tr><td valign="top">
 <div class="container2">
  <div class="btn-group-vertical">
    <button type="button" class="btn btn-warning btn-lg">Bookings</button>
    <button type="button" class="btn btn-default btn-lg">Make a booking</button>
    <button type="button" class="btn btn-default btn-lg">Proxy bookings</button>
    <button type="button" class="btn btn-default btn-lg">Booking history</button>
    <button type="button" class="btn btn-default btn-lg">Delete/change bookings</button>
    <button type="button" class="btn btn-default btn-lg">Browse all items</button>
  </div>
</td>
<td>&nbsp&nbsp</td>
<td valign="top">
 <div class="container3">
  <div class="btn-group-vertical">
    <button type="button" class="btn btn-warning btn-lg">Bookings and returns</button>
    <button type="button" class="btn btn-default btn-lg">Today's bookings</button>
    <button type="button" class="btn btn-default btn-lg">Today's returns</button>
    <button type="button" class="btn btn-default btn-lg">Late items</button>
    <button type="button" class="btn btn-default btn-lg">What's out?</button>
    <button type="button" class="btn btn-default btn-lg">What's in?</button>
  </div>
</td>
<td>&nbsp&nbsp</td>
<td valign="top">
 <div class="container4">
  <div class="btn-group-vertical">
    <button type="button" class="btn btn-warning btn-lg">Equipment admin</button>
    <button type="button" class="btn btn-default btn-lg">Admin categories</button>
    <button type="button" class="btn btn-default btn-lg">Delete a booking</button>
    <button type="button" class="btn btn-default btn-lg">Booking reports</button>
  </div>
</td>
<td>&nbsp&nbsp</td>
<td valign="top">
 <div class="container5">
  <div class="btn-group-vertical">
    <button type="button" class="btn btn-warning btn-lg">Store admin</button>
    <button type="button" class="btn btn-default btn-lg">Give staff access</button>
    <button type="button" class="btn btn-default btn-lg">Latest changes</button>
    <button type="button" class="btn btn-default btn-lg">Help</button>
  </div>
</td>
<td>&nbsp&nbsp</td>
<td valign="top">
 <div class="container6">
  <div class="btn-group-vertical">
    <button type="button" class="btn btn-warning btn-lg">Make a booking</button>
    <button type="button" class="btn btn-default btn-lg">Proxy bookings</button>
    <button type="button" class="btn btn-default btn-lg">Booking history</button>
    <button type="button" class="btn btn-default btn-lg">Delete/change bookings</button>
    <button type="button" class="btn btn-default btn-lg">Browse bookings</button>
  </div>
</td>
</tr>
</table>

</div>


 
 



<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
