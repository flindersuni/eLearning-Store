
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 
include('pdo.php');	
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

$barcode=filter_input(INPUT_GET, 'barcode');	 
$stmt = $conn->prepare('SELECT * FROM store_items WHERE barcode =:barcode');
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_STR);
$stmt->execute();		 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	

$item=$row['item'];	
$image=$row['image'];
$description=$row['description'];	
$status_comment=$row['status_comment'];	
$barcode=$row['barcode'];
$cat_id=$row['cat_id'];	
		
}
	
 if($stmt)
	{

		{





 

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
	
if (!$stmt) {
  echo "An error occured.\n";
  exit;
}

 ?>

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
