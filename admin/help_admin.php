  <?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php');                //fix this

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
<h4>Help for Admin section</h4>
<p><strong><u>ADMIN BOOKINGS</u></strong></p>
<p><strong>Proxy booking</strong><br>
  Once logged in, you can book items as anyone else, either by typing any FAN in the top box or selecting a FAN from dropdown list of people who have used the store previously.<br>
  Green button logs off current proxy and restors you as the user.</p>
<p><strong>Bookings<br>
  </strong>Lists all items due out today. You can pick previous and next day or any other day. You can also filter by college.<br>
  Shows date out, date due back, user and booking status which can be ticked when the user has picked up the item </p>
<p><strong>Returns <br>
</strong>Lists all items due back in store today.You can pick previous and next day or any other day. You can also filter by college.<br>
Shows date out, date due back, user and return status which can be ticked when the user has returned the item. </p>
<p><strong>Late<br>
</strong>Lists all items due back in store yesterday, highlights items which have been picked up but not returned a day after the due date.You can pick previous and next day or any other day. You can also filter by college.<br>
Shows date out, date due back, user and late status.  Item disappears when item is ticked  and marked returned.</p>
<p><strong>What's out<br>
</strong>Lists all items picked up but not returned. You can also filter by college.</p>
<p><strong>COWs etc <br>
</strong>As per 'What's out' but just COWS, Calfs and iPad slab.</p>
<p><strong><u>ADMIN STORE</u></strong></p>
<p><strong>Admin categories<br>
</strong>This is where you create new categories of equipment, as well as delete and edit existing categories.</p>
<p><strong>Admin items<br>
  </strong>This is where you create new equipment items, as well as delete and edit existing items.<br>
  Item numbers can be a number or a descriptive name. Barcodes should be unique as the system uses barcodes to uniquely identify equipment while item numbers are for the end user's benefit. The sytem will generate random unique barcodes or you can type your own if using IDS barcode for example.</p>This also lists all items in store (in item number order) and their store status (ie green for in store, red for picked up, clear/white for unavailable, black for retired).<br>
Has a link to all bookings for each item.<br>
Also has a toggle for store status (if item has been returned but is marked 'out' (ie red) you can fix that here) <br>
Also has a toggle for item unavailability (ie you can make an item unavailable in the item list view due to, say, repair or damage). <br>
Also has a toggle for item retirement (if item is retired it is permanently unavailble for booking, but all previous bookings are kept)<br>
Item status comment is also displayed-eg if item is marked 'unavailable' you can add a comment that it is 'lost' or 'getting repaired' etc </p>
<p><strong>Booking reports <br>
</strong>5 ways of looking up bookings:<br>
<em>Look up by item number</em>: must type item number/name exactly as it appears in store (eg 0901 or Camera 01).<br>
<em>Look up by FAN</em>: look up bookings for any users - just type in FAN or lookup existing user's FAN. Shows all past and future bookings for that user<br>
<em>Look up by date range</em>:  Shows all bookings in a date range.<br>
<em>All categories by month</em>: Browse all bookings for a category for that month <br>
<em>Barcode</em>: look up all bookings by an itesm barcode.</p>
<p><strong>Staff access <br>
</strong>Lists all staff who have used the store.<br>
This is where you can blacklist staff as well (ie stop them being able to book anything)
</p>
<p><strong>Admin staff <br>
</strong>Lists all staff who have access to the admin section (if you can read this you have admin access)<br>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br>
</p>
<p>
  
  
  
  
  
<p> <!--  body ends GF -->
          
          
          <?php include('../bootstrap/footer_js.html'); ?>
        </p>
  </body>
</html>
