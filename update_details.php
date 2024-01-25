
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
 

<?php 
echo "<h4>Update your details </h4>";
//end date bit 
//$sql="SELECT * FROM store_staff  WHERE fan_id='".$_SERVER["REMOTE_USER"]."'";

$fan=$_SERVER["REMOTE_USER"];	//was 'fili0008'
//$fan=filter_input(INPUT_SERVER, 'REMOTE_USER');	// new Nov 2023		 
$stmt = $conn->prepare('SELECT * FROM store_staff  WHERE fan_id =:fan');
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);	
$stmt->execute();	 
	 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$email=$row['email'];
$phone=$row['phone'];
$room=$row['room'];	
}
	 
	 
$db_data=array("*","_");
$real_data=array("'"," ");
$real_room=str_replace($db_data,$real_data,$row['room']);




	
 ?>
<form name="update_details" method="post" action="update_details_do.php">


    
   <div class="row">
  <div class="form-group has-error col-xs-4">
    <label for="site_code">First name</label>
    <input type="hidden" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name,ENT_QUOTES) ?>"><p> <?php echo $first_name ?> 
    </div>  
    </div> 
   
      <div class="row">
  <div class="form-group has-error col-xs-4">
    <label for="site_code">Last name</label>
    <input type="hidden" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name,ENT_QUOTES) ?>"><p> <?php echo $last_name ?> 
    </div>  
    
    </div>
    
      <div class="row">
  <div class="form-group has-error col-xs-4">
    <label for="student_number">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email,ENT_QUOTES) ?>">  
  </div>
  </div>
    
    <div class="row">
  <div class="form-group has-error col-xs-2">
    <label for="student_number">Phone number (work)</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone,ENT_QUOTES) ?>">  
  </div>
  </div>
    

  
      <div class="row">
  <div class="form-group has-error col-xs-2" >
    <label for="student_number">Room</label>
    <input type="text" class="form-control" id="room" name="room" value="<?php echo htmlspecialchars($room,ENT_QUOTES) ?>"> 
  </div>
  </div>
  
   
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  

<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
</body>
</html>
