
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 

?>
<title>Quick access</title>

</head>
<body>

      <!-- Static navbar -->
<? include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? //include('../../admin/bootstrap/sidebar_ehlstore_admin.html'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
<!--  body begins GF --> 
<?
$sql="SELECT * FROM store_items  WHERE barcode = '".$_GET['barcode']."'";
//echo $sql;
$result = $conn->query($sql);  //new sql
while($row = $result->fetch_assoc()) {
$image=$row['image'];
}
	
?>



<? echo "<h3>Check this out? <img src='../images/".$image.".jpg'> </h3>"; 

?>

<div class="row">
<div class="col-md-4">
<a class='btn btn-success btn-block'  href='quick_access_book_do.php?barcode=<? echo $_GET['barcode'] ?>&booking_id= <? echo $_GET['booking_id'] ?>&date_string=<? echo $_GET['date_string'] ?>' role='button'><h1><span class="glyphicon glyphicon-ok" aria-hidden="true"></h1></a>
</div>
</div>
  
<div class="row">
<div class="col-md-10">
<h1></h1>
</div>
</div>

<div class="row">
<div class="col-md-2">
<a class="btn btn-danger btn-block" href="quick_access_pre_book.php" role="button" ><h1><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></h1></a> 
</div>
</div>

<div class="col-md-10">
<h1></h1>
</div>






<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
