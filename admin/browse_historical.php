
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('database_connect2.php'); 
    //include('ldap_connect2.php');	
?>
<title>Browse historical</title>
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
 



<h4>Browse booking history of all items</h4>
<p>
  <?php 
$orderby="category";
$sql="SELECT * FROM store_category ORDER BY ".$orderby;

$result = $conn->query($sql);  //new sql

 if($result)
	{
echo "<table class = 'table table-hover'>";
echo "<span class=style2>Current categories</span></p>";	
echo "</tr>\n";
//print "<tr bgcolor=#ffffff><td colspan=13></td></tr>\n";	

while($row = $result->fetch_assoc()) {

			//$row = pg_fetch_array($result);
			

			
echo "<td>".$row['category']."</span></td>";	
//print "<td><a href=browse_items_historical.php?cat_id=".$row['cat_id'].">browse</a><td>";
echo "<td><a class='btn btn-default btn-xs'  href='browse_items_historical.php?cat_id=".$row['cat_id']."' role='button'>Browse</a></td>";			
echo "<tr>";
       }
echo "</table>\n";	

}
		
//$result = pg_query($dbcon, $sql);
pg_close;
if (!$result) {
  echo "An error occured.\n";
  exit;
  }
  
  
  
	?>
  
  
  <!-- &&& -->
</p>

<p>&nbsp;</p>
<p>

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
