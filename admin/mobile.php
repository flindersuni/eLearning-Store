
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	include('database_connect.php'); 
    include('ldap_connect2.php');	
?>
<title>eLearning store quick access</title>

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

<h1></h1>

 
<div class="col-md-5">
<a class="btn btn-danger btn-block"  href="quick_access_pre_book.php" role="button"><h1>Equipment out <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></h1></a><p></p>

<a class="btn btn-success btn-block" href="quick_access_pre_return.php" role="button"><h1>Equipment in <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></h1></a> 
</div>







 



<div class="element">
</div>




<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
