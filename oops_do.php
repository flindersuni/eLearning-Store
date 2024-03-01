
    
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');

include('staff_check.php');  

?>
<title>Undo booking</title>

</head>
<body>

      <!-- Static navbar -->
<?php include('bootstrap/nav_ehlstore_bookings.php'); 
//include('database_connect2.php');
include ('pdo.php') ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? //include('../admin/bootstrap/sidebar_ehlstore_admin.html'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
    <div class="col-md-8">
<!--  body begins GF --> 


<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
<h4 align="left">Delete this item? </h4>

  <?php 

$booking_id=$_POST['booking_id'];
//$sql="DELETE FROM store_bookings WHERE booking_id = $booking_id";
$stmt = $conn->prepare('DELETE FROM store_bookings WHERE booking_id = :booking_id');
$stmt->bindParam(':booking_id', $booking_id, PDO::PARAM_INT);
$stmt->execute();
	
//echo $booking_id;
//exit;
//$result = $conn->query($sql);  //new sql
if (!$stmt) {
  echo "An error occured.\n";
 exit;
}

$refresh="bookings.php?barcode=".$_POST['barcode']."&n=".$_POST['n']."&Y=".$_POST['Y']."";
header('Location: '. $refresh, false);
exit;

 ?> 




<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
