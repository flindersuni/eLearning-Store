
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
?>
<title>Browse historical</title>
<?php
$date_request=$_POST['date_1'];
if ($date_request==NULL) {
$date_request=date("Y-m-d");

}
$cat_id=$_GET['cat_id'];
//echo $date_request;
$date_request_exp=explode("-",$date_request);//reverse date 
$inMonth=$date_request_exp[1];//

$inYear=$date_request_exp[0];//

?>
</head>
<body>

      <!-- Static navbar -->
<?php include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <?php include('../bootstrap/sidebar_ehlstore.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
<div class="col-md-8">
<!--  body begins GF -->
 

<?php 

$sql4="SELECT category FROM store_category  WHERE cat_id = '$cat_id'";
$result4 = $conn->query($sql4);  //new sql
while($row4 = $result4->fetch_assoc()) {		
$category=$row4['category'];
}
echo "<h4>".$category." bookings for ".date ('M Y', mktime(0, 0, 0, date($inMonth)  , date("d"), date($inYear)))."</h4>" ;
//echo $date_request;
if ($_GET['search']) {
$search=$_GET['search'];

$orderby=$_GET['order'];
}
else {
$search = $_POST['search'];
$orderby="date_1";

}
$today=date("Y.m.d");

?>
 <FORM action="browse_items_historical.php?cat_id=<? echo $cat_id ?>" method="POST" name="form1" id="form1"> 
	  <script type='Text/JavaScript' src='scw.js'></script>     
        <input name="date_1" type="text" id="date_1" onClick="scwShow(this,event);" size="10" />
<input name="SUBMIT" type="SUBMIT" value="Choose date then click here">
</form

><?php
echo  "<span class='style2'>&#9632</span> = available <span class='style4'>|</span> <span class='style1'>&#9632</span> = booked all day <span class='style4'>|</span> <span class='style3'>&#9632</span> = hourly booking ";
echo "<p>";

$number_of_days=date("j",mktime(0,0,0,$inMonth+1,0, $inYear));



echo "<table border=1 cellpadding=0>\n";
echo "<td><strong>Item</strong></td>";
echo "<td><strong>Store</strong></td>";
echo "<td><strong>Description</strong></td>";
for($a=1;$a<$number_of_days+1;$a++)

{

$the_day=date("N", mktime(0, 0, 0, $inMonth,$a,$inYear));



if ($the_day=='6'){

$date_style='#BBBBBB';
}else if ($the_day=='7'){

$date_style='#BBBBBB';
}else{
$date_style='';
}

if (date("".$inYear.".".$inMonth.".".$a."")==$today) { //blink today
echo "<td width ='15' align='center' style='background-color:".$date_style.";text-decoration: blink'>$a</td>";
}
else {
echo "<td width ='15' align='center' style='background-color:".$date_style."'>$a</td>";
}

}
echo "</tr>\n";



$sql2="SELECT * FROM store_items WHERE cat_id='".$_GET['cat_id']."' ORDER BY item";
$result2 = $conn->query($sql2);  //new sql
	
while($row2 = $result2->fetch_assoc()) { //fan count
//print "<tr bgcolor=#999999><td colspan=14></td></tr>\n";
			//$row2 = pg_fetch_array($result2);	



  $day = '01';

  //$day = substr("0$day",-2); //if day is less than 10 then add leading 0	
  while ($day < $number_of_days+1)
 
  {
  

$date =  $inYear.".".$inMonth.".".$day;
//echo $date;
$status=NULL;
$sql="SELECT * FROM store_bookings  WHERE barcode= '".$row2['barcode']."'  AND date_1 <= '$date' AND date_2 >= '$date' ORDER BY barcode";
//echo $sql;
//exit;
$result = $conn->query($sql);  //new sql;			
while($row = $result->fetch_assoc()) { //fan count
$status=$row['status'];	
$store_location=$row2['store_location'];	
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
 case 'e':   
	$store_color=NULL;
   break;
 case 'h':  
	$store_color='#0000FF';
   break;
   } 


if ($count_fan!='yes') {
echo "<td <a href=../bookings.php?barcode=".$row2['barcode']."&n=$inMonth&Y=$inYear>".$row2['item']."</a></td>";
echo "<td align='center' style='color:".$store_color."'>".$row2['store_location']."</td>";
echo "<td>".$row2['description']."</td>";
$count_fan='yes';
}



echo "<td width ='15' style='background-color:".$date_style."'>$Day</td>";


       
$day++;	
 if ($day<10){
  $day="0".$day;
  }  

	   }
   
echo "</tr>";
		
//$result = pg_query($dbcon, $sql);

$count_fan='no';
}//fan count
print "</table>\n";


pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
}


pg_close;
 ?>
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
