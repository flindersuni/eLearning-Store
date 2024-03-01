
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('database_connect.php'); 
    //include('ldap_connect2.php');	
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
 <div class="col-md-8">
<!--  body begins GF -->
 
<?php
echo "<h4>Modify this item</h4>";

$sql="SELECT * FROM store_items WHERE barcode = '".$_GET['barcode']."'";
$result = $conn->query($sql);  //new sql
while($row = $result->fetch_assoc()) {

$item=$row['item'];	
$image=$row['image'];
$description=$row['description'];	
$status_comment=$row['status_comment'];	
$barcode=$row['barcode'];
$cat_id=$row['cat_id'];	
		
}
	
 if($result)
	{

		{
//$row = pg_fetch_array($result);





 

echo "<table width=200  border=0 cellspacing=0 cellpadding=0>\n";
echo "</table>";

?>
<form name="modify" method="post" action="edit_item_do.php">
  <table  border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td valign="top">
        <table  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Item</td>
      <td><input name="item" type="text" id="item" value="<?php echo "".$item."" ?>"></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><input name="image" type="text" id="image" value="<?php echo "".$image."" ?>"></td>
    </tr>
    
    <tr>
      <td>Description</td>
      <td><textarea name="description" id="description"><?php echo "".$description."" ?></textarea></td>
    </tr>
    <tr>
      <td>Comment on availability</td>
      <td><input name="status_comment" type="text" id="status_comment" value="<?php echo "".$status_comment."" ?>"></td>
    </tr>
  </table>
  
  </td>
  <td valign="top"><image src="../images/<?php echo $image ?>.png"></td>
  </tr>
  </table>
  
  <input name="barcode" type="hidden" value="<?php echo "". $barcode ."" ?>" size="4">
  <input name="cat_id" type="hidden" value="<?php echo "". $cat_id ."" ?>" size="4">
  <p>
    <input type="submit" name="Submit" value="Modify?">
  </p>
</form>
<?php 
}
		
				
	}
	

//$result = pg_query($dbcon, $sql);
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
