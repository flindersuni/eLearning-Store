
    
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
	 


$category=filter_input(INPUT_POST, 'category'); /// new Nov 2023	 
$visibility=filter_input(INPUT_POST, 'visibility'); /// new Nov 2023		 
$cat_id=filter_input(INPUT_POST, 'cat_id'); /// new Nov 2023		
$stmt = $conn->prepare('UPDATE store_category SET category = :category, visibility = :visibility WHERE cat_id = :cat_id');
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->bindParam(':visibility', $visibility, PDO::PARAM_STR);
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);	 
$stmt->execute();		 
	 


 if($stmt)
	{

		{



}
		
	  }


echo "The category has been modified<p><br>";
//echo "Back to <a href=category_admin.php>Category admin</a><td>";
echo "<td><a class='btn btn-primary btn-xs'  href='category-admin.php' role='button'>Back to category admin</a></td>";	
if (!$stmt) {
  echo "An error occured.\n";
 exit;
}



 ?> 
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
