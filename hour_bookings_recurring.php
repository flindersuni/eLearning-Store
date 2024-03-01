<?php 
session_start();
include('staff_check.php');
include('bootstrap/boot1_ehlstore_bookings.html');
include('database_connect2.php');  

	 ?>
<HEAD>
<TITLE>eLearning store</TITLE>

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

</HEAD>



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
 <div class="col-md-8">
<!--  body begins GF -->
  <?php 
   
$sql="SELECT * FROM store_items  WHERE barcode='".$_GET['barcode']."'";
$result = $conn->query($sql);  //new sql
while($row = $result->fetch_assoc()) {
 $cat=$row['cat_id'];
 $item=$row['item'];
 $barcode=$_GET['barcode'];
 $store_location=$row['store_location'];
}

$sql="SELECT * FROM store_category  WHERE cat_id='".$cat."'";
$result = $conn->query($sql);  //new sql
while($row = $result->fetch_assoc()) {
$category=$row['category'];	
}	 
$date_query2 =  $_GET['day']."-".$_GET['n']."-".$_GET['Y']; 
echo "<h4>".$category." ".$item." hourly bookings starting ".$date_query2." (recurring weekly bookings)</h4><p>";
echo "<div>";
//echo "<span class='label label-default'>Available</span>";
echo "<span class='label label-warning'>Booked (hourly)</span>";
?>
<a href='#' data-toggle='modal' data-target='#myModal' >
 <span class='glyphicon glyphicon-question-sign' aria-hidden='true'></span>
 </a>
 
 
<!-- Modal -->

<? include('booking_help.php'); ?>  
  
<!-- end modal  -->
<?
//echo "<span class='label label-blah'>Unavailable</span>";
echo "</div>";


//$hourly_bg = 'FF0000';

  $time = '09';
  while ($time < '17')
  {
  //select just that day's bookings
$date_query =  $_GET['Y'].".".$_GET['n'].".".$_GET['day'];


$sql="SELECT * FROM store_bookings  WHERE barcode='$barcode' AND hourly_booking = '$date_query' AND time_1 <= '$time' AND time_2 >= '$time' ORDER BY booking_id DESC";
//echo $sql;
$result = $conn->query($sql);  //new sql
while($row = $result->fetch_assoc()) {
$hourly_status=$row['hourly_status'];	
}
switch ($hourly_status) {
case B:
    $hourly_bg = "FF0000";
	$aShow[$time+10]  = show;
	//$box="<br>";
	//echo "B<p>";
    break;
case T:
    $hourly_bg = "FFFF00";
	//$box="<br>";
	//echo "T<p>";
	//$xxx = $date_check;
    break;
case U:
    $hourly_bg = "999999";
	$box="<br>";
	//echo "U<p>";	
    break;
case "":
    $hourly_bg = "00FF00";
	//$box="<br>";
	$aShow[$time+10]  = hide;
	$aAvailable[]  = ($time);
	//$box="<input type='checkbox' name='$day' id='$day'></p></td>";
    break;

}


$time++;
}

echo "<p>";
$booked=$_GET['booked'];
//$layer_done=$_GET['layer_done'];
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


<body onLoad="MM_showHideLayers('layer_bg','','show','layer_18','','<? echo $aShow[18] ?>,''layer_19','','<? echo $aShow[19] ?>', 'layer_20','','<? echo $aShow[20] ?>', 'layer_21','','<? echo $aShow[21] ?>', 'layer_22','','<? echo $aShow[22] ?>', 'layer_23','','<? echo $aShow[23] ?>', 'layer_24','','<? echo $aShow[24] ?>', 'layer_25','','<? echo $aShow[25] ?>', 'layer_26','','<? echo $aShow[26] ?>','layer_27','','<? echo $aShow[27] ?>', 'layer_book','','<? echo $layer_book ?>', 'layer_done','','<? echo $layer_done ?>')" >

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
<?
if ($booked=="yes") {//to fix calendar not appearing straight under box

echo "<div id='layer_book'>";
}

echo "<form id='hour_bookings' name='hour_bookings' method='post' action='hour_bookings_recurring_do.php'>";
// add leading zero
//// hour drop down
echo "Select the first hour and the last hour that you want the item (and fill in optional fields) then press 'Next'<p>";
echo "<p></p>";
echo "Book from     ";
echo "<select name='time_A' id='time_A'>";
echo "<option>".$_SESSION['time_A']."</option>";

foreach ($aAvailable as $value) {
#

echo "<option>"."$value"."</option>";

}
//echo "<option>$date2</option>";
echo "</select>";
echo "   to   ";
echo "<select name='time_B' id='time_B'>";
echo "<option value=".$_SESSION['time_B'].">".$_SESSION['time_B+']."</option>";

foreach ($aAvailable as $value) {
#
$value_p=$value+1;
echo "<option value=".$value.">"."$value_p"."</option>";

}
echo "</select>";
echo "<p>";

//echo "recurring weekly<p>";
echo "<div class='form-group has-warning'>";
//echo "<strong>Select an end date for your weekly bookings.</strong>";
echo "<h5><span class='label label-danger label-lg'>Select an end date for your weekly bookings.</span>";

//echo "<form style='display: inline;' name='date_bookings' method='post' action='report_bookings_today_do.php'>";
//echo "<link type='text/css' rel='stylesheet' href='CalendarControl.css' />";
echo "<script type='Text/JavaScript' src='scw.js'></script>";
echo "<input name='end_date' type='text' id='end_date' onClick='scwShow(this,event);' size='8' />";

echo "</h5><p>";
echo "</div>";






//echo  "<input type='submit' name='lookup date' value='lookup date'>";
//echo "</form>";

///////////////
//echo "Do you need internet<input name='internet' type='checkbox' id='internet' value='Y' />, extension cord<input name='ext_cord' type='checkbox' id='ext_cord' value='Y' />, powerboard<input name='powerboard' type='checkbox' id='powerboard' value='Y' />,  setup<input name='setup' type='checkbox' id='setup' value='Y'/><input name='setup_location' type='text' id='setup_location' placeholder='room no.' size='8'  /><p>";

echo "Enter the room number equipment will be used in (if applicable) <input name='setup_location' type='text' id='setup_location' placeholder='room no.' size='8' value='".$_SESSION['setup_location']."' /><p>";
echo "Comments <input name='comments' type='text' id='comments'  placeholder='optional - eg topic code' size='22' value='".$_SESSION['comments']."' /><p>";
//echo "<p >Select the first hour and the last hour that you want the item (and fill in optional fields) then press 'Next'<br>";
echo "<input name='barcode' type='hidden' value=".$_GET['barcode'].">" ;
echo "<input name='store_location' type='hidden' value=".$store_location.">" ;
echo "<input name='item' type='hidden' value='$item'>" ;
echo "<input name='Y' type='hidden' value=".$_GET['Y'].">" ;
echo "<input name='n' type='hidden' value=".$_GET['n'].">" ;
echo "<input name='day' type='hidden' value=".$_GET['day'].">" ;
	  
	  
	  
	  
//echo "".$row['barcode']."";
echo "<table border='0' cellspacing='0' cellpadding='3'>
<td><input name='internet' type='checkbox' id='internet' value='e'> Pre 9am pickup in store room</td>
<tr>
<td><input name='ext cord' type='checkbox' id='ext cord' value='l'> After 5pm drop off in store room</td>
</tr>
</table><p>";
echo "<p>";
echo "<input type='submit' name='Submit' value='Next'>";
echo"</form>";

if ($booked=="yes") { //to fix calendar not appearing straight under box	
echo "</div>";
}
echo "<div id='layer_done'>";
//$item=$_POST['item'];

echo "<h2>Item ".$item." booked</h2>";
echo"<p>";

echo "<form name='1' method='post' action='categories.php'>";
echo  "<input type='submit'  value='Do you want to book something else?'>";

echo "</form>";

echo "<form name='2' method='post' action='checkout.php'>";
echo "<input name='booked_day' type='hidden' value=".$booked_day.">" ;
echo  "<input type='submit'  value='Proceed to checkout'>";
echo "</form>";


echo "<p>";
//foreach ($_SESSION["start_date_status"] as $value) {

//echo " $value";

//}


echo "</div>";

//$_SESSION['start_date_string']=mktime(0,0,0,$_GET['n'],$_GET['day'],$_GET['Y']);
//echo $_SESSION['start_date_string'];


?>
</td> 
</table>
  <!--  body ends GF -->


<? include('bootstrap/footer_js_bookings.html'); ?>

</BODY>
</HTML>