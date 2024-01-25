
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
 
<h4>Browse all items</h4>
<p>See what items are available now or in the future and book them if you wish</p>
<?php 
echo "<a class='btn btn-danger btn-xs'  role='button'>Restricted categories are highlighted in light red - you can browse them <em>but only eLearning staff can book them for you</em> (booking link will become an email link)</a><p>";

$cat_id='54';
$visibility='r';	 
$stmt = $conn->prepare('SELECT * FROM store_category WHERE (cat_id!= :cat_id AND visibility != :visibility) ORDER BY category');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->bindParam(':visibility', $visibility, PDO::PARAM_STR);	
$stmt->execute();	 
//////	 

if($stmt) 
	{
echo "<table class = 'table table-bordered'>";

	 $columns=1;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
//$row = pg_fetch_array($result);
switch ($row['visibility']){
case '1':
	$class=NULL;
break;
case '0':
	$class="danger";
break;
}

$category_image_exp=explode(" ",$row['category']);
$category_image=$category_image_exp[0]."".$category_image_exp[1]."".$category_image_exp[2];//	

?>
<td align="center" valign="top" class=<?php echo $class ?>>
<div id="<? echo $category_image ?>" class="slideshow">
<img src="images/category-<?php echo $category_image ?>-1.png" width="150" height="50">
<img src="images/category-<?php echo $category_image ?>-2.png" width="150" height="50">
<img src="images/category-<?php echo $category_image ?>-3.png" width="150" height="50">
</div>
<a href=browse_items.php?cat_id=<?php echo $row['cat_id'] ?>><br><?php echo $row['category'] ?></a></td>	
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


  <? //include('bootstrap/footer_js.html'); ?>
</body>
</html>
