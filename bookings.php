<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
include("calendar.php"); 
include('pdo.php');

	 ?>
<head>
<!--
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->
<script type="text/javascript">


<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);

}
//-->
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

<style type="text/css">
<!--
.calendar {  font-size: smaller; color: #00F;  } 
.calendar-month {  font-size: large; color: #FF0000; text-align: center; } 
.style4 {color: #000000}
.style5 {font-family: Arial, Helvetica, sans-serif; font-size: smaller;}
.style6 {color: #000000; font-family: Arial, Helvetica, sans-serif; }
.style8 {color: #FF0000}


A:link {text-decoration: none}
A:visited {text-decoration: none}
A:active {text-decoration: none}

#layer_book {
    position:absolute; top: 320px;
	width:600px;
	z-index:1;
	visibility: show;	
}
#layer_done {
	position:absolute; top: 300px;
	z-index:1;
	visibility: hidden;	
}
#layer_span {
	position:absolute; top: 300px;
	z-index:1;
	visibility: hidden;
	
}

	
}


-->

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

<TITLE>eLearning store</TITLE>

<script src="../../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body >
	
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



$barcode=filter_input(INPUT_GET, 'barcode');	// new Nov 2023		 
$stmt1 = $conn->prepare('SELECT * FROM store_items WHERE barcode= :barcode');
$stmt1->bindParam(':barcode', $barcode, PDO::PARAM_INT);	
$stmt1->execute(); 	

while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {	
 $cat=$row1['cat_id'];
 $item=$row1['item'];
$barcode=filter_input(INPUT_GET, 'barcode');	// new Nov 2023		
 $image=$row1['image'];
 $store_location=$row1['store_location'];
}
	 

	 
$cat_id=$cat;	
try {	 
$stmt2 = $conn->prepare('SELECT * FROM store_category WHERE cat_id= :cat_id');
$stmt2->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);	
$stmt2->execute();
}
catch (Exception $e) {
echo 'Message: ' .$e->getMessage('An error occured'), "\n";	
}	
while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {	
$category=$row2['category'];	
  }

	 

echo "<div><h4>Bookings for ".$category." ".$item."</h4></div>";


echo "<div>";
echo "<span class='label label-default'>Past</span>";	 
echo "<span class='label label-success'>Available</span>";
echo "<span class='label label-danger'>Booked all day</span>";
echo "<span class='label label-warning'>Booked (hourly)</span>";
	 
?>

 
 
<!-- Modal -->
<a href='#' data-toggle='modal' data-target='#myModal' >
 <span style="font-size: 15px" class='glyphicon glyphicon-question-sign' aria-hidden='true'></span>
 </a>
<? include('booking_help.php'); ?>
  
<!-- end modal  -->
<?php

echo "</div>";

$time = time();
$today = date('d',$time);

$n=filter_input(INPUT_GET, 'n');	// new Nov 2023		 
$n = substr("0$n",-2); //if month is less than 10 then add leading 0 --- added 16 Feb 09 to fix today date--seems to work

$Y=filter_input(INPUT_GET, 'Y');	// new Nov 2023	 
$Y_next=$Y;
$Y_prev=$Y;
$barcode=filter_input(INPUT_GET, 'barcode');	// new Nov 2023	

$prev=($n-1); //if month is less than 1 (January) then go back to previous year's December
if ($prev<1) {
$prev=$prev+12;
$Y_prev=$Y-1;
}
$next=($n+1); //if month is greater than 12 (December) then go to next year's january
if ($next>12) {
$next=$next-12;
$Y_next=$Y+1;
}

	 
$days = array(    
$today=>array("hour_bookings.php?barcode=".$barcode."&Y=".$Y."&n=".$n."&day=".$today."$day",NULL,'<span class="css3-blink" style=" color: red; font-weight: bold;">'.$today.'</span>'),
	
	 );
	 
$pn = array('&laquo;'=>'bookings.php?barcode='.$barcode.'&n='.$prev.'&Y='.$Y_prev, '&raquo;'=>'bookings.php?barcode='.$barcode.'&n='.$next.'&Y='.$Y_next);
$current_m=date('m', $time);

echo "<table>";
echo "<tr>";

echo "<td>";

if ($n==$current_m) {
echo generate_calendar(date($Y, $time), $n, $days, 3, NULL, 1, $pn);

}
else {
	
echo generate_calendar(date($Y, $time), $n, NULL, 3, NULL, 1, $pn);
	 }

echo "</div>";


echo "</td>";
echo "<td><img src='images/".$image.".png' width=300 height=200></td>";//show bigger pic to right

echo "<tr>";
echo "<td colspan='2'>";


$booked=filter_input(INPUT_GET, 'booked');	// new Nov 2023		 
switch ($booked) {
case 'NULL':
    $layer_book = 'show';
	$layer_done = 'hide';
    $layer_book2 = 'show';	
break;	
case 'yes':
    $layer_book = 'hide';	
	$layer_done = 'show';
	$layer_book2 = 'hide';
break;	
}





?> <body onLoad="MM_showHideLayers('layer_book','','<?php echo $layer_book ?>','layer_done','','<?php echo $layer_done ?>')" BGCOLOR="#FFFFFF" MARGINHEIGHT="0" MARGINWIDTH="0" LEFTMARGIN="0" TOPMARGIN="0">
<?php





echo "<div id='layer_book'>";

echo "</div>";

echo "<div id='layer_done'>";
echo "</div>";
echo "<div id='layer_span'>";
echo "</div>";
echo "</td>";//EXTRA

echo "</tr>";//EXTRA
echo "</table>";
	 
?>

<!--  body ends GF -->


<?php include('bootstrap/footer_js_bookings.html'); ?>
  </body>
</html>
