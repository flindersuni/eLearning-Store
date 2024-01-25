
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

require('staff_admin_check.php'); 
include('pdo.php');
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


//$cat_id=$_POST['cat_id'];

//$sql="DELETE FROM store_category WHERE cat_id = $cat_id" ;
//$result = $conn->query('DELETE FROM store_category WHERE cat_id = "'.$_POST['cat_id'].'"');	
/////
//$cat_id = $_POST['cat_id'];
$cat_id=filter_input(INPUT_POST, 'cat_id'); /// new Nov 2023	 
$stmt = $conn->prepare('DELETE FROM store_category WHERE cat_id = :cat_id');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
$stmt->execute();	 
////	
	 
////
//echo $sql;
//$result = $conn->query($sql);  //new sql
if (!$stmt) {
  echo "An error occured.\n";
 exit;
}

echo "The category has been deleted<p><br>";
echo "<a class='btn btn-primary btn-xs'  href='category-admin.php' role='button'>Back to category admin</a>";	
pg_close;




//include($pagedetails['footer']); ?>

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
