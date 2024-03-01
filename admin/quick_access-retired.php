
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	include('database_connect.php'); 
    include('ldap_connect2.php');	
?>
<title>eLearning store quick access</title>

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

 
<div class="col-md-5">
<a class="btn btn-danger btn-block"  href="quick_access_pre_book.php" role="button"><h1>Equipment going out <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></h1></a>
</div>

<div class="col-md-5">
<a class="btn btn-success btn-block" href="quick_access_pre_return.php" role="button"><h1>Equipment coming back <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></h1></a> 
</div>



<div class="col-md-10">
<h1></h1>
</div>


<div class="col-md-12">
<div class="col-md-2">
  <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Make a booking
  </button>
  <ul class="dropdown-menu">
    <li><a href="https://ehlt.flinders.edu.au/login/store/ehl-test/admin/proxy_booking.php">Proxy booking</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="../bookings_history.php">"My" booking history</a></li>
    <li><a href="#">Delete/change my bookings</a></li>    
    <li><a href="#">Browse all items</a></li>
  </ul>
</div>

<div class="col-md-2">
<button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Bookings and returns
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Today's bookings</a></li>
    <li><a href="#">Today's returns</a></li>
    <li><a href="#">Late items</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">What's out?</a></li>
     <li><a href="#">What's in?</a></li>
  </ul> 
 </div>
  <div class="col-md-2">
<button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Equipment admin</button>
  <ul class="dropdown-menu">
    <li><a href="https://ehlt.flinders.edu.au/login/store/ehl-test/admin/category.php">Admin categories</a></li>
    <li><a href="https://ehlt.flinders.edu.au/login/store/ehl-test/admin/items.php">Admin items</a></li>
    <li><a href="#">Delete a booking</a></li>
    <li><a href="#">Booking reports</a></li>
    <li><a href="https://ehlt.flinders.edu.au/login/store/ehl-test/admin/item_availability.php">Item availability</a></li>
  </ul>
</div>
<div class="col-md-2">
<button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Store administration
  </button>
  <ul class="dropdown-menu">
    <li><a href="https://ehlt.flinders.edu.au/login/store/ehl-test/admin/staff_list.php">Give staff access</a></li>
    <li><a href="#">Latest store changes</a></li>
    <li><a href="#">Help</a></li>
  </ul>
 </div>
  <div class="col-md-2">
<button type="button" class="btn btn-default btn-lg btn-block">Other stuff</button>
</div>
</div>
 
<div class="container">
<style>
div 
.element {
  display: inline-block;
  background-image: url('images/ehl_truck.png');

  background-color: #0074d9;
  height: 159px;
  width: 317px;
  font-size: 1px;
  padding: 1px;
  color: white;
  margin-right: 5px;
  margin-left: 5px;
  animation: skew 15s infinite;
  transform: translate(1100px);
  animation-direction: alternate;
  opacity: .7;
}
@keyframes skew {
  0% {
    transform: translate(0);
  }
  100% {
    transform: translate(1100);
  }

</style>
</div>


<div class="element">
</div>




<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
