
    
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
//$sql="INSERT INTO store_category (category,visibility) VALUES ('".$_POST['category']."', '".$_POST['visibility']."')" ;
$category = $_POST['category'];
$visibility = $_POST['visibility'];	
echo $category;
//$sql="INSERT INTO store_category (category,visibility) VALUES (:category, :visibility)" ;
$stmt = $conn->prepare('INSERT INTO store_category (category,visibility) VALUES (:category, :visibility)');
//$sql = $pdo->prepare("INSERT INTO store_category (category,visibility) VALUES (:category, :visibility)");	 
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->bindParam(':visibility', $visibility,PDO::PARAM_INT);

//$category = $_POST['category'];
//$value = 1;
$stmt->execute();	 

//echo $sql;
$new=$id+1;
//exit;
//pg_close;
//if (!$result) {
  //echo "An error occured.\n";
  //exit;
//}

?>
 
<h4>Store category created.</h4>
<a class='btn btn-primary btn-xs'  href='category-admin.php' role='button'>Back to category admin</a>
<?php

//Send HTML email to someone 


$to = "george.filipov@flinders.edu.au";
$subject = "Store category created";
$body = "
<body bgcolor='#FFFF99'>
<p>A new category (<strong>".$_POST['category']."</strong>) has been created in the store database</p>

 



";


$body .= "</ul>\n";
$_POST['email'];
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= 'From:   ' . "$email\r\n";
//$headers .= 'Reply-To: ' . "$email . \r\n" ;
mail($to, $subject, $body, $headers);




 ?>

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
