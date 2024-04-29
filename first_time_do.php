<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
	include('pdo.php');
	
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



$result=$conn->prepare("INSERT INTO store_staff (fan_id, first_name, last_name, email, phone, room) VALUES (:fan,:firstname,:lastname,:email,:phone,:room)");
$result->bindParam(':fan',$_POST["fan"]);
$result->bindParam(':firstname',$_POST["first_name"]);
$result->bindParam(':lastname',$_POST["last_name"]);
$result->bindParam(':email',$_POST["email"]);
$result->bindParam(':phone',$_POST["phone"]);
$result->bindParam(':room',$_POST["room"]);
$result->execute();

//echo $sql;
//$result = pg_query($dbcon, $sql);
//new sql	

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
