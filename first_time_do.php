<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
	include('staff_check.php'); 
	include('database_connect2.php');
	
// check to see they're not already in database

?>


<HTML><HEAD>
<TITLE>First time</TITLE>

</HEAD>
<BODY >
<!-- Static navbar -->
<? include('bootstrap/nav_ehlstore_bookings.php'); ?>


<!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? include('bootstrap/sidebar_ehlstore_bookings.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="container-fluid">
<!--  body begins GF -->
<?php



$sql="INSERT INTO store_staff (fan_id, first_name, last_name, email, phone, room) VALUES ('".$_POST['fan']."', '".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['room']."')" ;
//echo $sql;
//$result = pg_query($dbcon, $sql);
$result = $conn->query($sql);  //new sql	

pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
}


 
echo "Your details have been added.<p>";
//echo "<a href=index.php>Next</a><td>";
echo "<p><a class='btn btn-primary' href='index.php'>Next</button>";

 ?>
<!--  body ends GF -->


  <? include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
