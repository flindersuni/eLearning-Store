<div class="col-md-1 ">

<ul class="sidebar-nav">
            

            
             <li><a href="#" data-toggle="collapse" data-target="#browse">BOOKINGS</a></li>          
              <div id="browse" class="collapse out">
                 <li><a href="../index.php">&nbsp;&nbsp;&nbsp;Make a booking</a></li>
                 <li><a href="../change_booking_request.php">&nbsp;&nbsp;&nbsp;Delete/change my booking</a></li>
                 <li><a href="../bookings_history.php">&nbsp;&nbsp;&nbsp;My booking history</a></li>
                 <li><a href="../browse_all.php">&nbsp;&nbsp;&nbsp;Browse all</a></li>
                  <li><a href="../browse_items_by_college.php">&nbsp;&nbsp;&nbsp;Browse by location</a></li> 
				 <li><a href="../store_locations.php">&nbsp;&nbsp;&nbsp;Store locations</a>
                 <li><a href="#">------------------------------------</a>
				 </li>
              </div>
    <?php
     if ($admin==1){
     ?>        
             <li><a href="#" data-toggle="collapse" data-target="#search">ADMIN BOOKINGS</a></li>          
              <div id="search" class="collapse in">
                 <li><a href="proxy_booking.php">&nbsp;&nbsp;&nbsp;Proxy booking</a></li>
                 <li><a href="report_bookings_today.php">&nbsp;&nbsp;&nbsp;Bookings</a></li>
                 <li><a href="report_returns_today.php">&nbsp;&nbsp;&nbsp;Returns</a></li>
                 <li><a href="report_late_all.php">&nbsp;&nbsp;&nbsp;Late</a></li>
                 <li><a href="report_whats_out.php">&nbsp;&nbsp;&nbsp;What's out?</a></li>
                 <li><a href="report_cow_bookings_today.php">&nbsp;&nbsp;&nbsp;COWs etc</a></li>
              </div>
              
               <li><a href="#" data-toggle="collapse" data-target="#create">ADMIN STORE</a></li>          
              <div id="create" class="collapse in">
                <li><a href="category-admin.php">&nbsp;&nbsp;&nbsp;Admin categories</a></li>
                <li><a href="items.php">&nbsp;&nbsp;&nbsp;Admin items</a></li>
                <li><a href="report_bookings.php">&nbsp;&nbsp;&nbsp;Booking reports</a></li>
                <li><a href="staff_list.php">&nbsp;&nbsp;&nbsp;Staff access</a></li>
                <li><a href="admin_staff_list.php">&nbsp;&nbsp;&nbsp;Admin staff (restricted)</a></li>
				<li><a href="admin_staff_locations.php">&nbsp;&nbsp;&nbsp;OLT staff locations</a></li>   
              </div>

             
            
             
            
 <?php

     }else{
	 }
     ?>        
             
          </ul>
       
</div>