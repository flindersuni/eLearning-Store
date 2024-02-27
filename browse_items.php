
<?php 
include('bootstrap/boot1_ehlstore_bookings.html');
include('staff_check.php'); 
include ('pdo.php');	 
 
	 ?>
<head>
<?php

$cat_id=filter_input(INPUT_GET, 'cat_id');	/// new Nov 2023
$inMonth=filter_input(INPUT_GET, 'inMonth');	/// new Nov 2023	
$inYear=filter_input(INPUT_GET, 'inYear');	/// new Nov 2023
	
if ($inMonth==NULL) {
$date_request=date("Y-m-d");
$date_request_exp=explode("-",$date_request);//reverse date 
$inMonth=$date_request_exp['1'];//
$inYear=$date_request_exp['0'];//

}


?>
<TITLE>eLearning store</TITLE>


<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.all.js"></script>


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
 <div class="col-md-10">
<!--  body begins GF -->
 
<?php  	

	 
$stmt4 = $conn->prepare('SELECT category,visibility FROM store_category WHERE cat_id = :cat_id');
$stmt4->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);	
$stmt4->execute(); 	

	 
	 
while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {		 
$category=$row4['category'];
$category_visibility=$row4['visibility'];
 }

echo "<h4>".$category." bookings for </h4> " ; //cut out ".date ('M Y', mktime(0, 0, 0, date($inMonth)  , date("d"+10), date($inYear)))."
	 

//if ($_GET['search']) { //added'' for php 8.2
if	(filter_input(INPUT_GET, 'search')) {

$search=filter_input(INPUT_GET, 'search');	/// new Nov 2023

$orderby=filter_input(INPUT_GET, 'orderby');	/// new Nov 2023
}
else {
$search=filter_input(INPUT_POST, 'search');	/// new Nov 2023	
$orderby="date_1";

}
$today=date("Y.m.d");

$next_month=($inMonth)+1;
$next_month = substr("0$next_month",-2); //if month is less than 10 then add leading 0
$last_month=($inMonth)-1;
$last_month = substr("0$last_month",-2); //if month is less than 10 then add leading 0
if ($last_month=='0'){
$last_month='12';
//$inYear=$inYear-1; //////////THIS NEEDS FIXING!!!!
}

echo "<div>";
echo "<span class='label label-blah'>Past dates</span>";	 
echo "<span class='label label-success'>Available</span>";
echo "<span class='label label-danger'>Booked all day</span>";
echo "<span class='label label-warning'>Booked (hourly)</span>";

echo "</div><p>";   
	 
	 
	 
echo "<div style='display: inline;'>";
echo "<form style='display: inline;' name='prev' method='post' action='browse_items2_do.php?cat_id=$cat_id&n=$last_month&Y=$inYear''>";
echo  "<button type='submit' name='last_month' value='$last_month'>< prev month</button>";
echo  "<input type='hidden' name='inYear' value='$inYear'>";
echo  "<input type='hidden' name='cat_id' value='$cat_id'>";
//echo  "<input type='submit' name='submit' value='< prev month'";
echo "</form>";
echo "<form style='display: inline;' name='next' method='post' action='browse_items2_do.php?cat_id=$cat_id&n=$last_month&Y=$inYear''>";
echo  "<button type='submit' name='next_month' value='$next_month'>next month ></button>";
echo  "<input type='hidden' name='inYear' value='$inYear'>";
echo  "<input type='hidden' name='cat_id' value='$cat_id'>";
echo "</form>";
echo "or choose another date ";

?>
<FORM action="browse_items_do.php?cat_id=<?php echo $cat_id ?>" method="POST" name="form1" id="form1" style="display: inline;"> 
	  <script type='Text/JavaScript' src='scw.js'></script>     
        <input name="date_1" type="text" id="date_1" onClick="scwShow(this,event);" size="10" />
<input name="SUBMIT" type="SUBMIT" value="Choose date then click here">
</form>
<?php
echo "<p>";
echo "<p>";

$number_of_days=date("j",mktime('0','0','0',$inMonth+1,'0', $inYear));



echo "<table border=1 cellpadding=1>\n";
echo "<td><strong>Item</strong></td>";
echo "<td><strong>Store</strong></td>";
echo "<td><strong>Description</strong></td>";
for($a=1;$a<$number_of_days+1;$a++)

{

$the_day=date("N", mktime('0', '0', '0', $inMonth,$a,$inYear));



if ($the_day=='6'){

$date_style='#BBBBBB';
}else if ($the_day=='7'){

$date_style='#BBBBBB';
}else{
$date_style='';
}
$a = substr("0$a",'-2'); //if $a is less than 10 then add leading 0
if (date("".$inYear.".".$inMonth.".".$a."")==$today) { //blink today
echo "<td width ='15' align='center' style='background-color:".$date_style."; class='css3-blink';><span class='css3-blink' >$a</span></td>";
}
else {
echo "<td width ='15' align='center' style='background-color:".$date_style."'>$a</td>";
}

}
echo "</tr>\n";


$cat_id=filter_input(INPUT_GET, 'cat_id');	
$store_status='r';	
$stmt2 = $conn->prepare('SELECT * FROM store_items WHERE cat_id = :cat_id AND store_status!= :store_status ORDER BY item');
$stmt2->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt2->bindParam(':store_status', $store_status, PDO::PARAM_STR);	
$stmt2->execute();	  
////	  

while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {		 


$day = '01';
$store_location=$row2['store_location'];
$barcode=$row2['barcode'];
$item=$row2['item'];	 
  while ($day < $number_of_days+1)
 
  {
  

$date =  $inYear.".".$inMonth.".".$day;
$status=NULL;//new

//////////
$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE barcode = :barcode AND date_1<= :date AND date_2 >= :date ORDER BY barcode');
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmt->bindParam(':date', $date, PDO::PARAM_STR);		  
$stmt->execute(); 	
/////////	  
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {		 
$status=$row['status'];	 
 }

switch ($status) {
 case 'B': //rec leave   
	$date_style='#FF0000';
	$Day=NULL;
   break;
 case 'P':  
	$date_style='#FF9900';
	$Day=NULL;
   break;
 case NULL:  
	$date_style='#00FF00';
	$Day=NULL;
   break;


   }
 switch ($store_location) {
case 'b':  
	$store_location  = "BGL-LWCM 313";
	$colour="#FF8A33";	
   break; 
case 'c':  
	$store_location  = "Central-Eng 470";
	$colour="#d9534f";	
   break;
case 'e':  
	$store_location  = "EPSW-Edu 3.16";
	$colour="#555555";	
   break;
case 'h':  
	$store_location  = "HASS-Hums 269";
	$colour="#CA33FF";
   break;		
 case 'm':  
	$store_location  = "MPH-HS 5.15";
	$colour="#356534";
   break;
 case 'n':  
	$store_location  = "NHS-Sturt W401";
	$colour="#66BB66";
   break;
case 's':  
	$store_location  = "SE-Eng 4.63";
	$colour="#3349FF";	
   break;		
   }


if ($count_fan!='yes') {
if ($category_visibility=='1' || $admin=='1') {	//lets admins book via link
echo "<td> <a href=bookings.php?barcode=".$barcode."&n=$inMonth&Y=$inYear>".$item."</a></td>";
}else{

$category_tight=explode(" ",$category);//remove spaces 
$e_category_for_email=$category_tight['0']."-".$category_tight['1']."-".$category_tight['2'];//
echo "<td> <a href=mailto:epsw.elearning@flinders.edu.au?subject=booking%20request%20for%20".$e_category_for_email."%20".$row2['item'].">".$item."</a></td>";	
}
echo "<td style='color:".$colour."'>".$store_location."</td>";
echo "<td>".$row2['description']."</td>";
$count_fan='yes';
}
////////////// this bit makes days before today grey
 if (date("U")>date("U", mktime('0','0','0',$inMonth,$day+1,$inYear))){

 $date_style='#999999'; 

}
//////////////


echo "<td width ='15' style='background-color:".$date_style."'>$Day</td>";


       
$day++;	
 if ($day<10){
  $day="0".$day;
  }  

	   }
  
echo "</tr>";
	

	



$count_fan='no';
}


echo "</table>\n";

if (!$stmt) {
  echo "An error occured.\n";
  exit;
}


include($pagedetails['footer']); ?>




<!--  body ends GF -->


  <?php //include('bootstrap/footer_js.html'); ?>
</body>
</html>
