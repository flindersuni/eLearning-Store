
    
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

$sql="UPDATE store_items SET item = '".$_POST['item']."', image = '".$_POST['image']."', description = '".$_POST['description']."', cat_id = '".$_POST['cat_id']."', status_comment = '".$_POST['status_comment']."' WHERE barcode = '".$_POST['barcode']."'";

$item=filter_input(INPUT_POST, 'item');	 
$image=filter_input(INPUT_POST, 'image');	 
$description=filter_input(INPUT_POST, 'description');	 
$cat_id=filter_input(INPUT_POST, 'cat_id');	 
$status_comment=filter_input(INPUT_POST, 'status_comment');	 
$barcode=filter_input(INPUT_POST, 'barcode');	 
$stmt = $conn->prepare('UPDATE store_items SET item = :item, image = :image, description = :description, cat_id = :cat_id, status_comment = :status_comment WHERE barcode = :barcode');
$stmt->bindParam(':item', $item, PDO::PARAM_STR);
$stmt->bindParam(':image', $image, PDO::PARAM_STR);
$stmt->bindParam(':description', $description, PDO::PARAM_STR);
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_STR);
$stmt->bindParam(':status_comment', $status_comment, PDO::PARAM_STR);
$stmt->bindParam(':barcode', $barcode, PDO::PARAM_STR);	 
$stmt->execute();


 if($stmt)
	{

		{



}
		
	  }


echo "The item has been modified<p><br>";
//echo "Back to <a href=items.php>Items admin</a><td>";
echo "<td><a class='btn btn-primary btn-xs'  href='items.php' role='button'>Back to items admin</a></td>";	
if (!$stmt) {
  echo "An error occured.\n";
 exit;
}

 





 ?>

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
