<?php include('staff_check.php'); 
include ('pdo.php');
//error_reporting(E_ALL);?>

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
<style type="text/css">
<!--


input.yellow {background-color: #FFFF00; font-weight: bold;}

option.yellow {background-color: #FFFF00; font-weight: bold;}

-->
.collapse {
    border-collapse: collapse;
}
.separate {
    border-collapse: separate;
}
table {
    display: inline-table;
    margin: 1em;
    border: solid 1px;
    border-width: 1px;
	border-color: white;
}
table table td {
    border: solid 1px;
	border-color: white;
}
.xx { border-color: white;
      color: black;
	  font-size: 12px;  }



</style>

<script language="JavaScript" type="text/JavaScript">
<!--
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
  


}
//-->
//-->
</script>
<?php
function generate_calendar($year, $month, $days = array(), $day_name_length = 2, $month_href = NULL, $first_day = 1, $pn = array()){
	$first_of_month = gmmktime(0,0,0,$month,1,$year);
	#remember that mktime will automatically correct if invalid dates are entered
	# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
	# this provides a built in "rounding" feature to generate_calendar()
	$day_names = array(); #generate all the day names according to the current locale
	for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday
		$day_names[$n] = ucfirst(gmdate('D',$t)); #%D means full textual day name

	list($month, $year, $month_name, $weekday) = explode(',',gmdate('m,Y,F,w',$first_of_month));
	//$weekday = (14) % 7; #adjust for $first_day
	$weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day

	$title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names
	
	#Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
	@list($p, $pl) = array(key($pn), current($pn)); next($pn); @list($n, $nl) = array(key($pn), current($pn)); next($pn); #previous and next links, if applicable
	if($p) $p = '<span class="calendar-prev">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;';
	if($n) $n = '&nbsp;<span class="calendar-next">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>';
	$calendar = '<table class="calendar" class="collapse" >'."\n".
		'<caption class="calendar-month">'.$p.($month_href ? '<a href="'.htmlspecialchars($month_href).'">'.$title.'</a>' : $title).$n."</caption>\n<tr>";

	if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
		#if day_name_length is >3, the full name of the day will be printed
		foreach($day_names as $d)
			$calendar .= '<th abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>';
		$calendar .= "</tr>\n<tr>";
	}
$n=$_GET['n']; 
$Y=$_GET['Y'];


	if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days
	for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
		if($weekday == 7){
			$weekday   = 0; #start a new week
			$calendar .= "</tr>\n<tr>";
		}	
// start coloured days -------------------------------------------------------------------------
echo "<form id='bookings' name='bookings' method='post' action='bookings_do.php'>";		
// add leading zero
$day_yest=$day+1;
$day = substr("0$day",-2); //if day is less than 10 then add leading 0
$n = substr("0$n",-2); //if month is less than 10 then add leading 0

$date_check=$Y.".".$n.".".$day;	

include('pdo.php'); 

$status=NULL;

/////////
$barcode=$_GET['barcode'];	
$stmta = $conn->prepare('SELECT * FROM store_bookings WHERE barcode= :barcode AND date_1 <= :date_check AND date_2 >= :date_check ORDER BY booking_id DESC');
$stmta->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmta->bindParam(':date_check', $date_check, PDO::PARAM_STR);		
$stmta->execute(); 	
/////////		
while ($rowa = $stmta->fetch(PDO::FETCH_ASSOC)) {
$status=$rowa['status'];

}
 //make days earlier than today grey
if  (date("U")>date("U", mktime(0,0,0,$n,$day_yest,$Y)))
{
 $weekday_bg = "#aaaaaa"; 
 $part_link=$day;

	
}	
	
else {
	

	
switch ($status) {
case 'B':
    $weekday_bg = "#d9534f";
	$part_link=$day;
	$days=NULL;//added this line to make no link to red day, but it's not blinking

    break;
case 'P':
    $weekday_bg = "#FF9900";
	$part_link="<a href=hour_bookings.php?barcode=".$_GET['barcode']."&Y=".$Y."&n=".$n."&day=".$day.">$day</a>";
	//echo "T<p>";
    break;
case 'U':
    $weekday_bg = "#999999";
	$part_link=NULL;
	echo "<br>";	
    break;
case "":
    $weekday_bg = "#5cb85c";
	$part_link="<a href=hour_bookings.php?barcode=".$_GET['barcode']."&Y=".$Y."&n=".$n."&day=".$day.">$day</a>";
	$aAvailable[]  = ($date_check);
	//$box="<input type='checkbox' name='$day' id='$day'></p></td>";
    break;
	
	} //end cycle thru db
			
	               }//end first else

	
// end coloured days --------------------------------------------------------------------------------------- ?*/

		if(isset($days[$day]) and is_array($days[$day])){
			@list($link, $classes, $content) = $days[$day];
			if(is_null($content))  $content  = $day;
			$calendar .= "<td width='30' align='center'   class='xx' bgcolor=#aaaaaa " .($classes ? ' class="'.htmlspecialchars($classes).'">' : '>').
				($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content)."<p>";
		}
		
		else 
		
		$calendar .= "<td width='30' align='center' class='xx' bgcolor=$weekday_bg>$part_link<p></td>";
	}
	if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days

	$booked=$_GET['booked'];
switch ($booked) {
case NULL:
    $layer_book = 'show';
	$layer_done = 'hide';
    $layer_book2 = 'show';
	
break;	
case 'yes':
    $layer_book = 'hide';	
	$layer_done = 'show';
	$layer_book2 = 'hide';
	
}
	
echo "<div id='layer_book'>";
echo "For <strong>hourly bookings</strong>, click on the date you want to book. <p>";


echo "<p>For <strong>full day bookings</strong> select days from     ";

if ($_GET['span']=='yes') {
$date_A=$_GET['date_A'];

$date_A_exp=explode(".",$date_A); //rev date A
$e_date_A=$date_A_exp[2].".".$date_A_exp[1].".".$date_A_exp[0];


echo "<option><strong>".$e_date_A."</strong></option>";//display date A normally
echo "<input name='date_A' type='hidden' value=".$date_A.">" ;
}else{
echo "<select name='date_A' id='date_A'>";
echo "<option>---start date---</option>";

foreach ($aAvailable as $value) {


$value_exp=explode(".",$value);
$e_value=$value_exp[2].".".$value_exp[1].".".$value_exp[0];

echo "<option value=".$value.">".$e_value."</option>";

}

echo "</select>";
}
echo "   to   ";
echo "<select name='date_B' id='date_B'>";
echo "<option >---end date---</option>";

foreach ($aAvailable as $value) {
#

$value_exp=explode(".",$value);
$e_value=$value_exp[2].".".$value_exp[1].".".$value_exp[0];

echo "<option value=".$value.">".$e_value."</option>";

}
echo "<option class='yellow'>"."- NEXT MONTH -"."</option>"; // makes it yellow
echo "</select>";


echo "<p>";	

echo "<input name='barcode' type='hidden' value=".$_GET['barcode'].">" ;

$booked=$_GET['booked'];

echo "<strong>If your booking goes from one month to the next, choose 'next month' as the end date then click 'next' </strong>";

echo "Enter the room number equipment will be used in (if applicable) <input name='setup_location' type='text' id='setup_location' placeholder='room no.' size='8'  /><p>";
echo "Comments <input name='comments' type='text' id='comments'  size='20'  />";
echo "<p>";

$barcode=$_GET['barcode'];	
$stmt10 = $conn->prepare('SELECT * FROM store_items WHERE barcode= :barcode');
$stmt10->bindParam(':barcode', $barcode, PDO::PARAM_INT);	
$stmt10->execute(); 	
/////////	
while ($row10 = $stmt10->fetch(PDO::FETCH_ASSOC)) {
$store_location=$row10['store_location'];
/////
}
	
echo "<input name='barcode' type='hidden' value=".$_GET['barcode'].">" ;
echo "<input name='store_location' type='hidden' value=".$store_location.">" ;
echo "<input name='Y' type='hidden' value=".$Y.">" ;
echo "<input name='n' type='hidden' value=".$n.">" ;
//echo "<p><input type='submit' name='Submit' value='Next'>";
echo "<button type='submit' class='btn btn-primary btn-xs'>Next</button>";
echo"</form>";


	
//include('staff_check.php'); new for php 8.2
echo "</div>";

//////////////
include('pdo.php');

/////////
$barcode=$_GET['barcode'];
$fan='fili0008'; //	was $_SERVER["REMOTE_USER"]
$stmt = $conn->prepare('SELECT * FROM store_bookings WHERE barcode= :barcode AND fan= :fan ORDER BY booking_id DESC');
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_INT);
$stmt->bindParam(':fan', $fan, PDO::PARAM_STR);	
$stmt->execute(); 	
/////////	
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

$booking_id=$row['booking_id'];

}
////////////////
echo "<div id='layer_done'>";
echo "<h4>Item booked</h4>";


echo "<table><tr><td>";
echo "<form name='1' method='post' action='categories.php'>";     
echo "<button type='submit' class='btn btn-primary btn-xs'>Book something else</button>";
echo "</form>";
echo "</td><td>";

echo "<form name='3' method='post' action='change_booking_request.php'>"; //action='oops_do.php'>
echo "<input name='booking_id' type='hidden' value=".$booking_id.">" ;
echo "<input name='barcode' type='hidden' value=".$_GET['barcode'].">" ;
echo "<input name='store_location' type='hidden' value=".$store_location.">" ;
echo "<input name='item' type='hidden' value='$item'>" ;
echo "<input name='Y' type='hidden' value=".$Y.">" ;
echo "<input name='n' type='hidden' value=".$n.">" ;   
echo "<button type='submit' class='btn btn-danger btn-xs'>Oops, undo this booking</button>";
echo "</form>";
echo "</td></tr><tr><td>";

echo "<form name='2' method='post' action='checkout.php'>"; 
echo "<div class='form-group'>";    
echo "</div>";

echo "<input name='booked_day' type='hidden' value=".$booked_day.">" ;
echo "<input name='store_location' type='hidden' value=".$store_location.">" ;   
echo "<button type='submit' class='btn btn-primary btn-xs'>Proceed to checkout</button>";
echo "</form>";	
	
	
echo "</td></tr></table>";
echo "<p></div>";
return $calendar."</tr>\n</table>\n";
}
?>