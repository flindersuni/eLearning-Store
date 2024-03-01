<?php 
error_reporting(0);
	//$section = "store_admin";
	include('../staff_admin_check.php'); 
	//include("http://ehlt.flinders.edu.au/templates/setup.inc");
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML><HEAD>
<TITLE>elearning store COW returns</TITLE>

<style type="text/css">

.button {
	display: inline-block;
	outline: none;
	width: 10px;
	height: 30px;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	font: 20px/100% Arial, Helvetica, sans-serif;
	padding: 0em 2em 0em;
	text-shadow: 0 1px 1px rgba(0,0,0,.3);
	-webkit-border-radius: .5em; 
	-moz-border-radius: .5em;
	border-radius: .5em;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	box-shadow: 0 1px 2px rgba(0,0,0,.2);
}
.button:hover {
	text-decoration: none;
}
.button:active {
	position: relative;	
	top: 1px;
}


.green {
	color: #000000;
	border: solid 1px #BBFFBB;
	background: #BBFFBB;
	background: -webkit-gradient(linear, left top, left bottom, from(#BBFFBB), to(#BBFFBB));
	background: -moz-linear-gradient(top,  BBFFBB,  #BBFFBB);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#BBFFBB', endColorstr='#BBFFBB');
}
.green:hover {
	background: #99FF99;
	background: -webkit-gradient(linear, left top, left bottom, from(#99FF99), to(#99FF99));
	background: -moz-linear-gradient(top,  #99FF99,  #99FF99);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#99FF99', endColorstr='#99FF99');
}
.green:active {
	color: #000000;
	background: -webkit-gradient(linear, left top, left bottom, from(#DDFFDD), to(#DDFFDD));
	background: -moz-linear-gradient(top,  #DDFFDD,  #DDFFDD);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#DDFFDD', endColorstr='#DDFFDD');
}
.rosy {
	color: #000000;
	border: solid 1px #FFBBBB;
	background: #FFBBBB;
	background: -webkit-gradient(linear, left top, left bottom, from(#FFBBBB), to(#FFBBBB));
	background: -moz-linear-gradient(top,  #FFBBBB,  #FFBBBB);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFBBBB', endColorstr='#FFBBBB');
}
.rosy:hover {
	background: #FFaaaa;
	background: -webkit-gradient(linear, left top, left bottom, from(#FFaaaa), to(#FFaaaa));
	background: -moz-linear-gradient(top,  #FFaaaa,  #FFaaaa);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFaaaa', endColorstr='#FFaaaa');
}
.rosy:active {
	color: #000000;
	background: -webkit-gradient(linear, left top, left bottom, from(#FFDDDD), to(#FFDDDD));
	background: -moz-linear-gradient(top,  #FFDDDD,  #FFDDDD);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFDDDD', endColorstr='#FFDDDD');
}

.style1 {
	font: 60px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;}
.style2 {
	font: 40px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #bda976;
	}
.style2A {
	font: 40px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #548ef8;
	}
.style3 {
	font: 30px/100% Arial, Helvetica, sans-serif;
	color: #FF0000;
	font-weight: bold;
}
.style4 {
	font: 22px/100% Arial, Helvetica, sans-serif;	
}
</style>
</HEAD>
<BODY BGCOLOR="#FFFFFF" MARGINHEIGHT="10" MARGINWIDTH="20" LEFTMARGIN="10" TOPMARGIN="0">
<?php //include($pagedetails['header']);
//echo "<span class='style1'>EHL store bulk computer bookings self-service kiosk</span><p>";



/////////////////////////////////////////////////////////////////////// return
//echo "<a href=report_bookings_today.php>Bookings</a> | Returns | <a href=report_late_all.php>Late</a>";
$date_string=$_GET['date_string'];
$date=date("Y.m.d", $date_string);
if ($date_string==NULL) {
$date_string  = mktime(0, 0, 0);
$date=date("Y.m.d", $date_string);
//$date=date(Y).".".date(n).".".date(d);
}
$date_exp=explode(".",$date);//reverse date 
$e_date=$date_exp[2]."-".$date_exp[1]."-".$date_exp[0];//

echo "<p>";
echo "<span class='style2A'>Returns for ".$e_date."</span>";
//echo  "<span class='style2'>&#9632</span> = in store <span class='style4'>|</span> <span class='style1'>&#9632</span> = out";
//echo  "<span class='style11'>&#9632;</span>";
echo "<p>";
//$date_today_string=strtotime("$date");






$sql="SELECT * FROM store_bookings  WHERE date_2 = '$date' AND (barcode = '046616' OR barcode = '046617' OR barcode = '046618' OR barcode = '046602' OR barcode = '00956' OR barcode = '00954' OR barcode = '00955') ORDER BY booking_id";
//echo $sql2;

	$result = pg_query($sql);
	$nrows = pg_numrows($result);

		 if($nrows == 0)
	{
	echo	"<span class='style4'>No COWS or iPads due back today.</span><p>";
	
	?>
	<a href="cow_bookings.php"><img src="home.png" width="100" height="100" alt="home" border="0" align="center"></a>
    <a href="cow_returns_today.php"><img src="refresh.png" width="100" height="100" alt="home" border="0" align="center"></a>
<meta http-equiv="REFRESH" content="10;url=cow_bookings.php"> 

<?
	exit;
	}
	
$bg_color="#dbe7fc";	
echo "<table border=0 cellspacing=0 cellpadding=3 bgcolor='#548ef8' span class='style4'>\n";

echo "<td>Booked from </td>";
echo "<td>Booked to </td>";
echo "<td>Out </td>";
echo "<td>In </td>";
echo "<td>Name </td>";
//echo "<td>Category </td>";
echo "<td>Item no. </td>";
//echo "<td>Early pickup</td>";
//echo "<td>Late dropoff </td>";
//echo "<td>Pwrbrd </td>";
//echo "<td>Setup </td>";
//echo "<td>Room </td>";
echo "<td>Comments </td>";
//echo "<td>Store </td>";
echo "<td>Checked in? </td>";
//echo "<td>In? </td>";
echo "</tr>\n";

for($j=0;$j<$nrows;$j++)
       {

			$row = pg_fetch_array($result);

$date_1_exp=explode(".",$row['date_1']);//reverse date 1
$e_date_1=$date_1_exp[2].".".$date_1_exp[1].".".$date_1_exp[0];//
echo "<tr bgcolor=".$bg_color.">";
print "<td> ".$e_date_1." </td>";//show reversed date 1
//print "<td align='center'> ".$row['date_1']." </td>";
	
$date_2_exp=explode(".",$row['date_2']);//reverse date 2
$e_date_2=$date_2_exp[2].".".$date_2_exp[1].".".$date_2_exp[0];//
print "<td> ".$e_date_2." </td>";//show reversed date 2
//print "<td align='center'> ".$row['date_2']."</td>";

print "<td align='center'> ".$row['time_1']."</td>";
//print "<td align='center'> ".$row['time_2']."</td>";
if ($row['time_2']!=NULL)
{
$return_time=$row['time_2']+1;

print "<td align='center'> ".$return_time."</td>";
}else{
print "<td > </td>";
}	
$internet=$row['internet'];
$ext_cord=$row['ext_cord'];
$powerboard=$row['powerboard'];
$setup=$row['setup'];
$setup_location=$row['setup_location'];
$fan_d = $row['fan'];
$barcode = 	$row['barcode'];
$comments=$row['comments'];
$returned=$row['ret'];
$booking_id=$row['booking_id'];





$sql2="SELECT first_name,last_name FROM store_staff  WHERE fan_id ='$fan_d'";
//echo $sql2;

//exit;
	$result2 = pg_query($sql2);
	$nrows2 = pg_numrows($result2);	
	$row = pg_fetch_array($result2);
print "<td> ".$row['first_name']." ".$row['last_name']."</td>";
$sql3="SELECT item,store_status,cat_id,store_location FROM store_items  WHERE barcode = '$barcode'";
//echo $sql3;
//exit;


	$result3 = pg_query($sql3);
	$nrows3 = pg_numrows($result3);	
	$row = pg_fetch_array($result3);
$cat_id=$row['cat_id'];
//echo $cat_id;
//exit;
$item=$row['item'];
$store_location=$row['store_location'];
//print "<td align='center'> ".$row['item']."</td>";
//echo $row['store_status'];
//exit;

switch ($returned) {
case 0:
    $status='-';
	$button_colour='rosy';
	$button_text='No';	
break;	
case 1:
    $status='&#10004;';
	$button_colour='green';
	$button_text='Yes';
break;	
}


$sql4="SELECT category FROM store_category  WHERE cat_id = '$cat_id'";
//echo $sql4;
//exit;

	$result4 = pg_query($sql4);
	$nrows4 = pg_numrows($result4);	
	$row = pg_fetch_array($result4);
//echo "<td> ".$row['category']."</td>";
echo "<td align='center'> ".$item."</td>";


echo "<td> ".$comments."</td>";


echo "<td>";
?>

<form name='school' method='post' action='toggle_return_status_cows.php?booking_id=<? echo $booking_id ?>'>
          
<button class="button <? echo $button_colour ?>"><? echo $status ?></button>
</form>
<?
echo "</a><td>";
		
//$fan_d = $row['fan'];
if ($bg_color=="#dbe7fc"){
$bg_color="#b9d0fb";	
}else{
$bg_color="#dbe7fc";
}
echo "</tr>";
       }
		echo "</table>\n";


		
$result = pg_query($dbcon, $sql);
$result2 = pg_query($dbcon, $sql2);
$result3 = pg_query($dbcon, $sql3);
$result4 = pg_query($dbcon, $sql4);
pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
  }
    
 echo "<p><span class='style3'>Press red button to mark equipment as returned.</span><p>";   
 ?>
 <a href="cow_bookings.php"><img src="home.png" width="100" height="100" alt="home" border="0" align="center"></a>
 <a href="cow_returns_today.php"><img src="refresh.png" width="100" height="100" alt="home" border="0" align="center"></a>
<meta http-equiv="REFRESH" content="60;url=cow_bookings.php"> 
</BODY>
</HTML>