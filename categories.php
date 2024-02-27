
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
//$access_check="../ehl-test/staff_check.php";
$line_1="Restricted/hidden categories = <span class='css3-blink'>H</span>";
    include('staff_check.php'); 
    include ('pdo.php');

 
	 ?>
<head>

<TITLE>eLearning store</TITLE>


<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(function() {
    // run the code in the markup!
    $('td pre code').each(function() {
        eval($(this).text());
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, zoom,turnDown,curtainX, wipe etc...
	});
});
</script> 
<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function writeMarquee() {
document.write("<marquee scrolldelay='30' scrollamount='5'><span class='style2'>Please note that COWs, CALFs and iPads for EPSW cannot be booked through the online store - please book by emailing <a href='mailto:epsw.elearning@flinders.edu.au?Subject=Store%20booking%20for%20COW/Calf/iPad%20slab'>epsw.elearning@flinders.edu.au</a> instead</span></marquee>");
}
//  End -->

</script>
<style type="text/css">


			.trad-blink { text-decoration: blink; }
			@-webkit-keyframes blinker {  
  			  from { opacity: 1.0; }
			  to { opacity: 0.0; }
			}
			.css3-blink {
			-webkit-animation-name: blinker;  
			-webkit-animation-iteration-count: infinite;  
			-webkit-animation-timing-function: cubic-bezier(1.0,0,0,1.0);
			-webkit-animation-duration: 1s; 
			}
</style>
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
 

<h4>eLearning store</h4>
<?php 
//setlocale(LC_ALL,'Au'); //doesn't work
//auto date and time bit
$welcome_string="Welcome";
$numeric_date=date("G");

if($numeric_date>=0&&$numeric_date<=11)
$welcome_string="Good morning, ";
else if($numeric_date>=12&&$numeric_date<=17)
$welcome_string="Good afternoon, ";
else if($numeric_date>=18&&$numeric_date<=23)
$welcome_string="Good evening, ";
 


try {

$fan_id=filter_var($_SERVER['REMOTE_USER'],FILTER_UNSAFE_RAW, FILTER_NULL_ON_FAILURE);  // Jan 2024	
$stmt = $conn->prepare('SELECT * FROM store_staff WHERE fan_id = :fan_id');
$stmt->bindParam(':fan_id', $fan_id, PDO::PARAM_STR);
$stmt->execute(); 	 
}
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}
	 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
$first_name=$row['first_name'];	
}      
 echo "$welcome_string ".$first_name."<br />";



echo "Pick a category from below. ";


 
if ($admin=="1") {  //test if admin role


$visibility='r';
$stmt = $conn->prepare('SELECT * FROM store_category WHERE visibility != :visibilty ORDER BY category');
$stmt->bindParam(':visibilty', $visibility, PDO::PARAM_STR);
$stmt->execute(); 	
	
echo $line_1; 
}else{
$visibility='1';
$stmt = $conn->prepare('SELECT * FROM store_category WHERE visibility = :visibilty ORDER BY category');
$stmt->bindParam(':visibilty', $visibility, PDO::PARAM_STR);
$stmt->execute();
}
echo "<p>";

 if($stmt) 
	{
?>		
<table class = 'table table-bordered'>

<script language="JavaScript">
<!-- Begin
writeMarquee()
//  End -->
</script>
</td>
</tr>	
<?php
$columns=1;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
$visibility=$row['visibility'];

switch ($visibility){
case '1':
	$vis_status=NULL;
break;
case '0':
	$vis_status='<span class="css3-blink"> H</span>';
break;
}
$category_image_exp=explode(" ",$row['category']);
$category_image=$category_image_exp[0]."".$category_image_exp[1]."".$category_image_exp[2];//	

?>
<td align="center" valign="top" >
<div id="<?php echo $category_image ?>" class="slideshow">
<img src="images/category-<?php echo $category_image ?>-1.jpg" width="150" height="50">
<img src="images/category-<?php echo $category_image ?>-2.jpg" width="150" height="50">
<img src="images/category-<?php echo $category_image ?>-3.jpg" width="150" height="50">
</div>
<a href=items.php?cat_id=<?php echo $row['cat_id'] ?>><br><?php echo $row['category'] ?><?php echo $vis_status ?></a></td>	
<?php
	
if ($columns==4) {
$end_bit="</tr><tr>"; 
}else{
$end_bit=""; 
}

echo "$end_bit";

if ($columns==5) {
$columns=1; 
}
$columns++;	
       }
echo "</tr>";	   
echo "</table>";
}
		
if (!$stmt) {
  echo "An error occured.\n";
  exit;
  }
	
	?>



<!--  body ends GF -->


  <?php //include('bootstrap/footer_js.html'); ?>
</body>
</html>
