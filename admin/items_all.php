<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 
//include('database_connect2.php'); //PHP 8.2 temp
include('pdo.php');
    //include('ldap_connect2.php');	
	function rand_string( $length ) {
$chars = "0123456789";
return substr(str_shuffle($chars),0,$length);
                                }	
?>

<title>eLearning store bookings</title>
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
 <div class="col-md-12">
<!--  body begins GF -->
 <?php //include($pagedetails['header']); ?>
  <style type="text/css">
<!--
.style2 {color: #FF0000}
.style1 {color:#0000CC}
.style3 {text-decoration: line-through;}
-->
  </style>
<h4>Admin - items </h4>

<p>
  <?php 
echo "<div class='btn-toolbar' role='toolbar'>";
echo "<a class='btn btn-primary btn-xs ' href='items.php' role='button'>active items only</a>";
echo "<a class='btn btn-primary btn-xs active' href='items_all.php' role='button'>include retired items</a>";
echo "<a href='#menu-toggle' class='btn btn-default btn-xs' id='menu-toggle'>Toggle Menu</a><p>";
echo "</div>";
  
//$orderby="item";   

//$sql="SELECT * FROM store_items ORDER BY ".$orderby;	
//$result = $conn->query($sql);  //new sql;
$item = 'item';	
	
$stmt = $conn->prepare('SELECT * FROM store_items ORDER by item');
$stmt->execute();	
//$result = $conn->query('SELECT * FROM store_items ORDER BY item');		
	

 if($stmt)
	{
echo "<table class = 'table table-hover'>";
echo "<thead><th>Category</span></th>";
echo "<th>Items</span></th>";
echo "<th>Barcode</span></th>";	
echo "<th>Description</span></th>";
echo "<th>Store</th>";
echo "<th>In?</th>";	 
echo "</tr></thead>";
	

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	

//$row = pg_fetch_array($result);
$cat=$row['cat_id'];
$barcode=$row['barcode'];
$item=$row['item'];		
$description=$row['description'];
$store_status=$row['store_status'];

$status_comment=$row['status_comment'];
$store_location=$row['store_location'];	

	//////////	
if ($store_status == '1')
{$stat_col='#5cb85c';
  $glyph='stop';
} else if ($store_status == 'r'){
$stat_col='#000';
$glyph='stop';
} else if ($store_status == 'u'){
$stat_col='000';
$glyph='unchecked';
} else if ($store_status == '2'){
$stat_col='style3';
$glyph='stop';
} else {
$stat_col='#d9534f';
$glyph='stop';
}
	
////////

//$sql2="SELECT * FROM store_category  WHERE cat_id= '$cat'";
//echo $sql2;
//$result2 = $conn->query($sql2);  //new sql;
$stmt2 = $conn->query("SELECT category FROM store_category  WHERE cat_id= ".$cat);	
while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
$category=$row2['category'];	
}
if ($store_status=='r') {

$store_style='<span class=style3>';
	
}else {
$store_style=NULL;	
}
	
echo "<td>".$store_style.$category."</td>";	
echo "<td>".$store_style.$item."</td>";	
echo "<td>".$store_style.$barcode."</td>";
echo "<td>".$store_style.$description."</td>";
switch ($row['store_location']) {
case 'b':  
	$store_location  = "BGL";
	$colour="#FF8A33";	
   break; 
case 'c':  
	$store_location  = "CILT";
	$colour="#d9534f";	
   break;
case 'e':  
	$store_location  = "EPSW";
	$colour="#555555";	
   break;
case 'h':  
	$store_location  = "HASS";
	$colour="#CA33FF";
   break;		
 case 'm':  
	$store_location  = "MPH";
	$colour="#356534";
   break;
 case 'n':  
	$store_location  = "NHS";
	$colour="#66BB66";
   break;
case 's':  
	$store_location  = "SE";
	$colour="#3349FF";	
   break;		
   } 
 echo "<td><span style='color:".$colour."';><strong>".$store_location."</strong></span></td>"; 
echo "<td> <span class='glyphicon glyphicon-".$glyph."' aria-hidden='true' style='color:".$stat_col."'></span></td>";	
echo "<td><a class='btn btn-warning btn-xs'  href='check_bookings_item.php?barcode=".$barcode."' role='button'>check bookings</a></td>";
echo "<td><a class='btn btn-default btn-xs'  href='#' role='button'>in store?</a></td>";
echo "<td><a class='btn btn-danger btn-xs'  href='toggle_item_unavailability.php?barcode=".$barcode."' role='button'>unavailable</a></td>";
echo "<td><a class='btn btn-black btn-xs'  href='toggle_item_retirement.php?barcode=".$barcode."' role='button'>retired</a></td>";
echo "<td>".$status_comment."<td>";	
echo "<td><a class='btn btn-default btn-xs'  href='edit_item.php?barcode=$barcode' role='button'>edit</a></td>";		
//print "<td><a href=delete_item.php?barcode=$barcode>delete</a><td>";		
echo "<tr>";
       }
echo "</table>\n";	

}
		
//$result = pg_query($dbcon, $sql);
//pg_close;
if (!$stmt) {
  echo "An error occured.\n";
  exit;
  }
  
  
  
	?>
  
  
  <!-- &&& -->
</p>
<FORM ACTION="add_item_do.php" METHOD="POST" enctype="multipart/form-data">
  <h4>Add item </h4>
  <table border="0">
    <tr>
      <td align="right"><div align="left">item no.
          <input name="item" type="text" id="item" size="35"> 
          image
          <?php include('browse_images.php'); ?>
</div></td>
    </tr>
    
    <tr>
      <td align="right" valign="top"><div align="left">
        <p>barcode
          <input name="barcode" type="text" id="barcode" value="<? echo rand_string(5) ?>"size="05">
          Categories 
          <?php include('browse_categories.php'); ?>
</p>
        <p>store location 
          <label>
          <select name="store_location" id="store_location">
            <option value="e" selected>---pick---</option>
			<option value="c">CILT</option>
            <option value="e">Education</option>
            <option value="h">Humanities</option>
			<option value="n">NHS</option>
          </select>
          </label>
        </p>
        <p>description         
          <textarea name="description" cols="20" id="description"></textarea>
        </p>
        <p align="left">        </p>
    </div></td>
    </tr>
  </table>
  <input name="SUBMIT" TYPE="SUBMIT" VALUE="Submit">
</form>
<p>&nbsp;</p>
<p>
  
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
