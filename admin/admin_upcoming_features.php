
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('../../admin/database_connect.php'); 
    //include('../../admin/ldap_connect2.php');	
?>
<title>Admin staff</title>
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
 <div class="col-md-6">
<!--  body begins GF -->

 
<h4>Features to be added at some stage</h4>
<table width="800" border="1">
  <tbody>
    <tr>
      <td><strong>What?</strong></td>
      <td><strong>Why?</strong></td>
    </tr>
    <tr>
      <td>abilty to retire categories</td>
      <td>keep items in that category (for audit) but dont show anywhere except this page</td>
    </tr>
    <tr>
      <td>ability to move items to new category</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
