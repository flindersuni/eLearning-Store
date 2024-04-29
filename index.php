
<html>
<?php
	
include('bootstrap/boot1_ehlstore_bookings.html');

include('staff_check.php'); 
include ('pdo.php');
	
?>
<head>
<link rel="icon" href="favicon.ico">
<TITLE>eLearning store</TITLE>

<script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>	
<?php 
	
try {
//$fan_id = $_SERVER['REMOTE_USER']; 	//temp 	'fili0008';
//$fan_id=filter_input(INPUT_SERVER,'REMOTE_USER');	// new Nov 2023	- doesn't work beacuse of bug?
$fan_id=filter_var($_SERVER['REMOTE_USER'],FILTER_UNSAFE_RAW, FILTER_NULL_ON_FAILURE);  // Jan 2024
//$fan_id='test000001';

$stmt = $conn->prepare("SELECT * FROM store_staff WHERE fan_id= :fan_id");
$stmt->bindParam(':fan_id', $fan_id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";
}

//echo $fan_id;
	//exit;
	  
 if (!$row) {
 $start_here='first_time.php';
header('Location: '. $start_here, false);
exit;
echo "This seems to be your first time here.";
 } else {

$first_name=$row['first_name'];
$last_name=$row['last_name'];
$email=$row['email'];
$phone=$row['phone'];
$room=$row['room'];

	 
 //  fix for php8 when on real server

      //<!-- Static navbar -->
  include('bootstrap/nav_ehlstore_bookings.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
<?php include('bootstrap/sidebar_ehlstore_bookings.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="container-fluid">
<!--  body begins GF -->
 <p>
<?php
//end date bit 
echo "<h4>eLearning store</h4>";
echo "<a class='btn btn-danger btn-xs'  role='button'>Equipment is for short term loan only - no more than 2 weeks at a time. If you require a longer loan please contact your college elearning team.</a><p>";

echo "<table border='0' cellspacing='0' cellpadding='0'>";

echo "<td valign='top'>Welcome back to the eLearning store, ".$first_name. "<p />";
//echo $_SERVER["FIRST_NAME"];
//print "<table border=0 cellspacing=1 cellpadding=1>\n";
echo "<strong>First name: </strong>".$first_name."<br>";
echo "<strong>Last name: </strong>".$last_name."<br>";
echo "<strong>Email: </strong>".$email."<br>";
echo "<strong>Phone: </strong>".$phone."<br>";

$db_data=array("*","_");
$real_data=array("'"," ");
$real_room=str_replace ($db_data,$real_data,$room);

echo "<strong>Room: </strong>".$real_room."<p><p>";
echo " <p>Are your details up to date?<p>";
  	



echo "<a class='btn btn-default' href='update_details.php'>No, I need to update my details</button>";

echo "<p><a class='btn btn-primary' href='categories.php'>Yes, my details are fine. Let me book my stuff!</button>";



	  //to be fixed

	echo"<td>";

echo "<td>";
}
 ?>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div class="item active">
      <img src="images/gopro-hero8.png" alt="...">
      <div class="carousel-caption">Go pro</div>
    </div>
      <div class="item">
      <img src="images/rechargeable-pa-speaker.png" alt="...">
      <div class="carousel-caption">Bluetooth PA speaker</div>
    </div>
	    <div class="item">
      <img src="images/gimbal.png" alt="...">
      <div class="carousel-caption">Gimbal</div>
    </div>  
    <div class="item">
      <img src="images/webchat1.png" alt="...">
      <div class="carousel-caption">webchat kit</div>
    </div>
	 <div class="item">
      <img src="images/radio_mic_rhode.png" alt="...">
      <div class="carousel-caption">wirelss microphone</div>
    </div>
	
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




<?php echo"</td>";
echo "</table>";
//pg_close;

 ?> 


<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
