<html>
<?php 
session_start();
include('staff_check.php');
include('bootstrap/boot1_ehlstore_bookings.html');
include('pdo.php'); 

	 ?>
<head>

<style type="text/css">
<!--



#layer_19 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/09.gif);
	
}
#layer_20 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/10.gif);
	
}
#layer_21 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/11.gif);
	
}
#layer_22 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/12.gif);
	
}
#layer_23 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/13.gif);
	
}
#layer_24 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/14.gif);
	
}
#layer_25 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/15.gif);
	
}
#layer_26 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/16.gif);
	
}
#layer_27 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/17.gif);
	
}
#layer_28 {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: hidden;
	opacity: 0.9;
	background-image: url(hours/18.gif);
	
}
#layer_bg {
	position:absolute;
	width:180px;
	height:180px;
	z-index:1;
	visibility: visible;
	opacity: 1.0;
	background-image: url(hours/bg.gif);
}
#layer_book {
	position:absolute;
	width:600px;
	z-index:1;
	visibility: visible;
	
}
#layer_done {
	position:absolute;
	width:600px;
	z-index:1;
	visibility: hidden;
	
}
-->
</style>
<script type="text/javascript">



<!--
function MM_showHideLayers() { //v9.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>
<TITLE>eLearning store</TITLE>

<script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>



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
 //$barcode=$_GET['barcode'];                   /// old Nov 2023
$barcode = filter_input(INPUT_GET, 'barcode');	/// new Nov 2023	 
$stmt = $conn->prepare('SELECT * FROM store_items  WHERE barcode= :barcode');   
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);	
$stmt->execute();

//$a = filter_input(INPUT_GET, 'a');
//$b = (string)filter_input(INPUT_GET, 'b');	 
	 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
 $cat=$row['cat_id'];
 $item=$row['item'];
 //$barcode=$_GET['barcode'];                   /// old Nov 2023
 $barcode = filter_input(INPUT_GET, 'barcode');	/// new Nov 2023
 $store_location=$row['store_location'];
}

$stmt = $conn->prepare('SELECT * FROM store_category  WHERE cat_id= :cat_id');   
$stmt->bindParam(':cat_id', $cat, PDO::PARAM_INT);	
$stmt->execute();	 

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$category=$row['category'];	
}
//$date_query2 =  $_GET['day']."-".$_GET['n']."-".$_GET['Y']; /// old Nov 2023
$date_query2 = filter_input(INPUT_GET, 'day')."-".filter_input(INPUT_GET, 'n')."-".filter_input(INPUT_GET, 'Y'); /// new Nov 2023	 
echo "<h4>".$category." ".$item." hourly bookings for ".$date_query2."</h4><p>";
echo "<div>";
echo "<span class='label label-warning'>Booked (hourly)</span>";
?>
<a href='#' data-toggle='modal' data-target='#myModal' >
 <span style="font-size: 15px" class='glyphicon glyphicon-question-sign' aria-hidden='true'></span>
 </a>
 
 
<!-- Modal -->

<?php include('booking_help.php'); ?>  
  
<!-- end modal  -->
<?php
echo "</div>";


//$hourly_bg = 'FF0000';

  $time = '09';
  while ($time < '19')
  {
  //select just that day's bookings
//$date_query =  $_GET['Y'].".".$_GET['n'].".".$_GET['day'];  ///old Nov 2023
$date_query = filter_input(INPUT_GET, 'Y').".".filter_input(INPUT_GET, 'n').".".filter_input(INPUT_GET, 'day'); /// new Nov 2023
$hourly_status=NULL;
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE barcode= :barcode AND hourly_booking = :date_query AND time_1 <= :time AND time_2 >= :time ORDER BY booking_id DESC');   
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmt->bindParam(':date_query', $date_query, PDO::PARAM_STR);
$stmt->bindParam(':time', $time, PDO::PARAM_STR);	  
$stmt->execute();	  
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$hourly_status=$row['hourly_status'];	
}


switch ($hourly_status) {
case 'B':
    //$hourly_bg = "FF0000";

	$aShow[$time+10]  = 'show';

	//echo $time;
	//echo $aShow[$time];
   break;
case 'T':
    //$hourly_bg = "FFFF00";
	//$box="<br>";
	//echo "T<p>";
	//$xxx = $date_check;
    break;
case 'U':
    //$hourly_bg = "999999";
	$box="<br>";
	//echo "U<p>";	
    break;
case "":
    //$hourly_bg = "00FF00";
	//$box="<br>";
	$aShow[$time+10]  = 'hide';
	$aAvailable[]  = ($time);
	//$box="<input type='checkbox' name='$day' id='$day'></p></td>";
    break;

}


$time++;
} 
	 
//////////////
try {
$stmt = $conn->prepare('SELECT * FROM store_bookings  WHERE barcode= :barcode AND hourly_booking = :date_query AND fan= :fan ORDER BY booking_id DESC');   
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmt->bindParam(':date_query', $date_query, PDO::PARAM_STR);
$stmt->bindParam(':fan', $_SERVER["REMOTE_USER"], PDO::PARAM_STR);	                 //was $_SERVER["REMOTE_USER"]  
$stmt->execute();
}
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}	 
//$result = $conn->query($sql);  //new sql
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$booking_id=$row['booking_id'];
}
////////////////
echo "<p>";
$booked=$_GET['booked'];

switch ($booked) {
case NULL:
    $layer_book = 'show';
	$layer_done = 'hide';
	
break;	
case 'yes':
    $layer_book = 'hide';	
	$layer_done = 'show';
	
}

	 
?>


<body onLoad="MM_showHideLayers('layer_bg','','show','layer_19','','<?php echo $aShow[19] ?>', 'layer_20','','<?php echo $aShow[20] ?>', 'layer_21','','<?php echo $aShow[21] ?>', 'layer_22','','<?php echo $aShow[22] ?>', 'layer_23','','<?php echo $aShow[23] ?>', 'layer_24','','<?php echo $aShow[24] ?>', 'layer_25','','<?php echo $aShow[25] ?>', 'layer_26','','<?php echo $aShow[26] ?>', 'layer_27','','<?php echo $aShow[27] ?>', 'layer_28','','<?php echo $aShow[28] ?>', 'layer_book','','<?php echo $layer_book ?>', 'layer_done','','<?php echo $layer_done ?>')" BGCOLOR="#FFFFFF" MARGINHEIGHT="0" MARGINWIDTH="0" LEFTMARGIN="0" TOPMARGIN="0">

<table>

   <td width="200" valign="top">
<div id="layer_bg"></div>
<div id="layer_19"></div>
<div id="layer_20"></div>
<div id="layer_21"></div>
<div id="layer_22"></div>
<div id="layer_23"></div>
<div id="layer_24"></div>
<div id="layer_25"></div>
<div id="layer_26"></div>
<div id="layer_27"></div>
<div id="layer_28"></div>
<p>
</td>

<td>
<?php
echo "<div id='layer_book'>";

echo "Select the first hour and the last hour that you want the item (and fill in optional fields) then press 'Next'<p>";
echo "<form id='hour_bookings' name='hour_bookings' method='post' action='hour_bookings_do.php'>";
// add leading zero
//// hour drop down
echo "Book from     ";
echo "<select name='time_A' id='time_A'>";
echo "<option>---start time---</option>";

foreach ($aAvailable as $value1) {
#

echo "<option>"."$value1"."</option>";

}
echo "</select>";
echo "   to   ";
echo "<select name='time_B' id='time_B'>";
echo "<option>---end time---</option>";

foreach ($aAvailable as $value2) {
#

$value_p=$value2+1;
echo "<option value=".$value2.">"."$value_p"."</option>";

}
echo "</select>";
///////////////
echo "<p>";

echo "Enter the room number equipment will be used in (if applicable) <input name='setup_location' type='text' id='setup_location' placeholder='room no.' size='8'  /><p>";
echo "Comments <input name='comments' type='text' id='comments'  placeholder='optional - eg topic code' size='22'  /><p>";

//echo "<input name='barcode' type='hidden' value=".$_GET['barcode'].">" ;   /// old Nov 2023
echo "<input name='barcode' type='hidden' value=".filter_input(INPUT_GET, 'barcode').">" ;	/// new Nov 2023 	  
echo "<input name='store_location' type='hidden' value=".$store_location.">" ;
echo "<input name='item' type='hidden' value='$item'>" ;
//echo "<input name='Y' type='hidden' value=".$_GET['Y'].">" ; /// old Nov 2023
echo "<input name='Y' type='hidden' value=".filter_input(INPUT_GET, 'Y').">" ;	/// new Nov 2023   
//echo "<input name='n' type='hidden' value=".$_GET['n'].">" ; /// old Nov 2023
echo "<input name='n' type='hidden' value=".filter_input(INPUT_GET, 'n').">" ;	/// new Nov 2023 	  
//echo "<input name='day' type='hidden' value=".$_GET['day'].">" ; /// old Nov 2023
echo "<input name='day' type='hidden' value=".filter_input(INPUT_GET, 'day').">" ;	/// new Nov 2023 	

//$_SESSION['barcode']=$_GET['barcode']; /// old Nov 2023
$_SESSION['barcode']=filter_input(INPUT_GET, 'barcode'); /// new Nov 2023	  
//$_SESSION['Y']=$_GET['Y']; /// old Nov 2023
$_SESSION['Y']=filter_input(INPUT_GET, 'Y'); /// new Nov 2023
//$_SESSION['n']=$_GET['n']; /// old Nov 2023
$_SESSION['n']=filter_input(INPUT_GET, 'n'); /// new Nov 2023	  
//$_SESSION['day']=$_GET['day']; /// old Nov 2023
$_SESSION['day']=filter_input(INPUT_GET, 'day'); /// new Nov 2023
echo "<table border='0' cellspacing='0' cellpadding='3'>
<td><input name='internet' type='checkbox' id='internet' value='e'> Pre 9am pickup in store room</td>
<tr>
<td><input name='ext cord' type='checkbox' id='ext cord' value='l'> After 5pm drop off in store room</td>
</tr>
</table><p>";
echo "<p>";

?>
<div class="has-error">
  <div class="checkbox">
    <label>
      <input type="checkbox" name="recurring" id="recurring" value="yes">
      Make this booking recur weekly (I'll pick the end date on the next page)
    </label>
  </div>
</div>
<?php



echo "<p>";

echo "<button type='submit' class='btn btn-primary btn-xs'>Next</button>";
echo"</form>";

	
echo "</div>";



echo "<div id='layer_done'>";
echo "<h4>Item ".$item." booked</h4>";
echo"<p>";


echo "</form>";


echo "<table><tr><td>";
echo "<form name='1' method='post' action='categories.php'>";     
echo "<button type='submit' class='btn btn-primary btn-xs'>Book something else</button> ";
echo "</form>";
echo "</td>";

echo "<td><form name='3' method='post' action='change_booking_request.php'>"; 
echo "<input name='booking_id' type='hidden' value=".$booking_id.">" ;
echo "<input name='store_location' type='hidden' value=".$store_location.">" ;
//echo "<input name='barcode' type='hidden' value=".$_GET['barcode'].">" ;  ///old Nov 2023
echo "<input name='barcode' type='hidden' value=".filter_input(INPUT_GET, 'barcode').">" ;	/// new Nov 2023 	
echo "<input name='item' type='hidden' value='$item'>" ;
//echo "<input name='Y' type='hidden' value=".$_GET['Y'].">" ; /// old Nov 2023 
echo "<input name='Y' type='hidden' value=".filter_input(INPUT_GET, 'Y').">" ;	/// new Nov 2023   	
//echo "<input name='n' type='hidden' value=".$_GET['n'].">" ; ///old Nov 2023
echo "<input name='n' type='hidden' value=".filter_input(INPUT_GET, 'n').">" ;	/// new Nov 2023
//echo "<input name='day' type='hidden' value=".$_GET['day'].">" ; /// old Nov 2023
echo "<input name='day' type='hidden' value=".filter_input(INPUT_GET, 'day').">" ;	/// new Nov 2023 
	
echo "<button type='submit' class='btn btn-danger btn-xs'>Oops, undo this booking</button>";
echo "</form>";
echo "</td></tr><tr><td>";

echo "<form name='2' method='post' action='checkout.php'>"; 

echo "<div class='form-group'>";    
echo "</div>"; 
echo "<input name='booked_day' type='hidden' value=".$booked_day.">" ;   
echo "<button type='submit' class='btn btn-success btn-xs'>Proceed to checkout</button>";
echo "</form>";
echo "</td></tr></table>";

echo "</div>";


?>
</td> 
</table>
  <!--  body ends GF -->


<?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
