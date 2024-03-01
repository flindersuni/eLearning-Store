
    
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
<? include('../bootstrap/nav_ehlstore.php'); ?>


      <!-- sidebar nav -->
 <div id="wrapper"> 
 
 <!-- Sidebar -->
  <div id="sidebar-wrapper">    
      <? include('../bootstrap/sidebar_ehlstore.php'); ?>
  </div>
        <!-- /#sidebar-wrapper -->
   <!-- Page Content -->
 <div class="col-md-8">
<!--  body begins GF -->


<form action="upload_image_do.php" method="post" enctype="multipart/form-data">
    <h4>Select image to upload</h4>
    2 images needed - 300 x 200 png AND 150 x 50 jpg<br>
    Use underscore in name eg 'tablet_ipad' or 'camera_360_rico_theta'. Use same name for the jpg and the png<p></p>
    <input type="file" name="fileToUpload" id="fileToUpload"><p></p>
    <input type="submit" value="Upload Image" name="submit">
</form>



  
<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
