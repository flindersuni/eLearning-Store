
    
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
 
<h4>Delete this category? </h4>


  <?php 


$cat_id=filter_input(INPUT_GET, 'cat_id'); 		 
$stmt = $conn->prepare('SELECT * FROM store_category WHERE cat_id = :cat_id');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->execute(); 
	 
	 
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	
$category=$row['category'];
$cat_id=filter_input(INPUT_GET, 'cat_id'); 		
}
	
 if($stmt)
	{

		{


}
		
				
	}
	


?>
<p>This cannot be undone! Make sure all items have been removed from the category first!</p>
<form name="delete" method="post" action="delete_category_do.php">
  <button type="submit" class="btn btn-danger">Delete</button>
  <input name="cat_id" type="hidden" value="<?php echo $cat_id ?>" >
</form>
<?php if (!$stmt) {
  echo "An error occured.\n";
  exit;
}


 ?>

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
