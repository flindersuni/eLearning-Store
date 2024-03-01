
<?php 
include('bootstrap/boot1_ehlstore.html');

    include('staff_check.php'); 
    include('database_connect2.php');	 
	$sql="SELECT * FROM store_staff WHERE fan_id = '$auth_user'";

	$result = pg_query($sql);
	$nrows = pg_numrows($result);
 
	 ?>
<head>

<TITLE>EHL store</TITLE>


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
document.write("<marquee scrolldelay='30' scrollamount='10'><span class='style2'>Please note that COWs, CALFs and iPads cannot be booked through the online store - please book by emailing <a href='mailto:ehl.elearning@flinders.edu.au'>ehl.elearning@flinders.edu.au</a> instead</span></marquee>");
}
//  End -->
</script>
</head>

<body>

      <!-- Static navbar -->
<? include('bootstrap/nav_ehlstore_admin.html'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? include('bootstrap/sidebar_ehlstore_admin.html'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="container-fluid">
<!--  body begins GF -->
 

<?php
	include($pagedetails['javascript']); 
?>
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
document.write("<marquee scrolldelay='30' scrollamount='1.5'><span class='style2'>Please note that COWs, CALFs and iPads cannot be booked through the online store - please book by emailing EHl eLearning on <a href='mailto:ehl.elearning@flinders.edu.au'>ehl.elearning@flinders.edu.au</a> instead</span></marquee>");
}
//  End -->
</script>	

</HEAD>
<BODY BGCOLOR="#FFFFFF" MARGINHEIGHT="0" MARGINWIDTH="0" LEFTMARGIN="0" TOPMARGIN="0">
<?php include($pagedetails['header']); ?>
  <style type="text/css">
<!--
.style2 {color: #FF0000;}
.style1 {color:#0000CC}
-->
  </style>
<h1>EHL store</h1>
<?php 

//auto date and time bit
$welcome_string="Welcome";
$numeric_date=date("G");
if($numeric_date>=0&&$numeric_date<=11)
$welcome_string="Good morning, ";
else if($numeric_date>=12&&$numeric_date<=17)
$welcome_string="Good afternoon, ";
else if($numeric_date>=18&&$numeric_date<=23)
$welcome_string="Good evening, ";
 
$sql2="SELECT * FROM store_staff WHERE fan_id='".$auth_user."'";
//echo $sql2;
$result2 = pg_query($sql2);
$nrows2 = pg_numrows($result2); 
$row = pg_fetch_array($result2);
       
 echo "$welcome_string ".$row['first_name']."<br />";

//end date bit 

echo "Pick a category from below.<p>";


 $orderby="category";


$sql="SELECT * FROM store_category  WHERE visibility=1 ORDER BY ".$orderby;

	$result = pg_query($sql);
	$nrows = pg_numrows($result);

 if($nrows != 0)
	{
?>		
<table width="25%" border="1" cellspacing="1" cellpadding="3">
<td colspan ="4">
<script language="JavaScript">
<!-- Begin
writeMarquee()
//  End -->
</script>
</td>
</tr>	
<?
$columns=1;

for($j=0;$j<$nrows;$j++)
       {

$row = pg_fetch_array($result);
$category_image_exp=explode(" ",$row['category']);
$category_image=$category_image_exp[0]."".$category_image_exp[1]."".$category_image_exp[2];//	

?>
<td align="center" valign="top">
<div id="<? echo $category_image ?>" class="slideshow">
<img src="images/category-<? echo $category_image ?>-1.jpg" width="150" height="50">
<img src="images/category-<? echo $category_image ?>-2.jpg" width="150" height="50">
<img src="images/category-<? echo $category_image ?>-3.jpg" width="150" height="50">
</div>
<a href=items.php?cat_id=<? echo $row['cat_id'] ?>><br><? echo $row['category'] ?></a></td>	
<?
	
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
		
$result = pg_query($dbcon, $sql);
pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
  }
	?>
<?php include($pagedetails['footer']); ?>


  <? //include('bootstrap/footer_js.html'); ?>
</body>
</html>
