<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
	include('staff_check.php'); 
	include('pdo.php');
// check to see they're not already in database
//$sql="SELECT * FROM store_staff WHERE fan_id = 'fili0008'";
///////////
$fan_id = $_SERVER["REMOTE_USER"];	//temp	

$stmt = $conn->prepare("SELECT * FROM store_staff WHERE fan_id=?");
$stmt->execute([$fanID]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

///////////
//echo $sql;
//$result = $conn->query($sql);  //new sql	
	//$nrows = pg_numrows($result);
 if($row) 
 {
 $denied='index.php';
header('Location: '. $denied, false);
//exit;
}
else
{	
?>


<HTML><HEAD>
<TITLE>First time</TITLE>

</HEAD>
<BODY >
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
 <div class="container-fluid">
<!--  body begins GF -->
<?php



}



echo "This seems to be your first visit to the eLearning store.<p>";
echo "Please fill out your personal details.<br>";
echo "You only have to do this one time (unless your details change). The system will remember your details for subsequent bookings.";


?>

<form name="details" method="post" action="first_time_do.php">


    
   

    <label for="first_name">First name</label>
    <input type="hidden" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($_SERVER['firstName'],ENT_QUOTES); ?>"><p> <?php echo $_SERVER["firstName"]; ?><p> 
   
 
   
     
  
    <label for="last_name">Last name</label>
    <input type="hidden" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($_SERVER['lastName'],ENT_QUOTES); ?>"><p> <?php echo $_SERVER["lastName"]; ?><p> 
  
    
   
    
 
  
    <label for="email">Email</label>
    <input type="hidden" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($_SERVER['email'],ENT_QUOTES); ?>"><p><?php echo $_SERVER["email"]; ?><p>  
 

    
    <div class="row">
  <div class="form-group has-error col-xs-2">
    <label for="phone">Phone number (work)</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="12345">  
  </div>
  </div>
    

  
      <div class="row">
  <div class="form-group has-error col-xs-2" >
    <label for="room">Room</label>
    <input type="text" class="form-control" id="room" name="room" placeholder="Edu 3.12"> 
  </div>
  </div>
  
<input name='fan' type='hidden' id='fan'  value='<?php echo $_SERVER["REMOTE_USER"]; ?>'></td>
  <button type="submit" class="btn btn-primary">Next</button>
</form>

<!--  body ends GF -->


  <?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
