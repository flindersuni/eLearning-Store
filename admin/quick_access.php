
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	include('../pdo.php');	
?>
<title>eLearning store quick access</title>
<script src="../../Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
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



 
<div class="col-md-5">
<a class="btn btn-danger btn-block"  href="quick_access_pre_book.php" role="button"><h1>Equipment out <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></h1></a><p></p>

<a class="btn btn-success btn-block" href="quick_access_pre_return.php" role="button"><h1>Equipment in <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span></h1></a> 

<p><p>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
	     <div class="item active">
      <img src="../images/gopro-hero8.png" alt="..." >
      
    </div>
    <div class="item">
      <img src="../images/rechargeable-pa-speaker.png" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
    <div class="item">
      <img src="../images/gimbal.png" alt="...">
      <div class="carousel-caption">
      </div>
    </div>
      <div class="item">
      <img src="../images/webchat1.png" alt="...">
      <div class="carousel-caption"> 
      </div>
    </div>
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>

 








<!--  body ends GF -->


  <? include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
