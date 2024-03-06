
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
include('staff_check.php'); 	 
include('pdo.php');
 	 
 
	 ?>
<head>

<TITLE>Update your details</TITLE>






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
 

<?php //include($pagedetails['header']);

$real_data=array("'"," ");
$db_data=array("*","_");
$db_room=str_replace ($real_data,$db_data,$_POST['room']);


//$sql="UPDATE store_staff SET  first_name = '".$_POST['first_name']."', last_name = '".$_POST['last_name']."', email = '".$_POST['email']."', phone = '".$_POST['phone']."', room = '".$db_room."'  WHERE fan_id = '".$_SERVER['REMOTE_USER']."'";

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$room=$db_room;	
$fan_id='fili0008';	 //was $_SERVER['REMOTE_USER'] 

	 
	 
	 
$stmt = $conn->prepare('UPDATE store_staff SET  first_name = :first_name, last_name = :last_name, email = :email, phone = :phone, room = :room  WHERE fan_id = :fan_id');
$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
$stmt->bindParam(':room', $room, PDO::PARAM_STR);
$stmt->bindParam(':fan_id', $fan_id, PDO::PARAM_STR);	 
$stmt->execute();	 
	 
	 
//$result = $conn->query($sql);  //new sql

 if($result)                              //fix
	{

	{
//$row = pg_fetch_array($result);


}
		
	  }
	


//$result = pg_query($dbcon, $sql);

echo "Your details have been updated<p><br>";
//echo "<a href=index.php>Next</a><td>";
echo "<p><a class='btn btn-primary' href='index.php'>Continue</button>";

//if (!$result) {
 // echo "An error occured.\n";
 // exit;
	
	
//}	
?>
  

<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
</body>
</html>
