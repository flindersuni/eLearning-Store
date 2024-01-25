
    
<?php 
include('../bootstrap/boot1_ehlstore.html');

	require('staff_admin_check.php'); 
	//include('database_connect2.php');
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
 <div class="col-md-6">
<!--  body begins GF -->
 
<h4>Category administration</h4>
<p>Restricted categories are highlighted in pink and are hidden from regular users<br>
   Before retiring a category make sure all items in it are retired first</p>	 
<p>
  <?php 
  //echo $info[0];
  //echo  $info[0]["cn"][0];
//$orderby="category";
//$sql="SELECT * FROM store_category WHERE visibility !='r' ORDER BY ".$orderby;
//$result = $conn->query($sql);  //new sql
//$result = $conn->query('SELECT * FROM store_category WHERE visibility !="r" ORDER BY category');
/////////////////////////////
$visibility = 'r';
$category = 'category';	
	
$stmt = $conn->prepare('SELECT * FROM store_category WHERE visibility != :visibility ORDER by :category');
$stmt->bindParam(':visibility', $visibility, PDO::PARAM_STR);
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->execute();	
	
////////////////////////////	
 if(!$result)
	{
echo "<table class = 'table table-hover'>";
echo "<thead><th>Current categories</th>";
echo "<th>Description</th>";	
echo "</thead>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {	

			//$row = pg_fetch_array($result);
			
switch ($row['visibility']){
case '1':
    $visibility = 'normal';
	$row_colour="default";
break;
case '0':
    $visibility = 'hidden';
	$row_colour="danger";
break;
}
		
echo "<tr class=".$row_colour.">";
echo "<td span class=$style>".$row['category']."</span></td>";	
echo "<td>".$row['description']."</td>";	
//echo "<td><a href=modify_category.php?cat_id=".$row['cat_id'].">edit</a><td>";
echo "<td><a class='btn btn-default btn-xs'  href='edit_category.php?cat_id=".$row['cat_id']."' role='button'>edit</a></td>";	
//echo "<td><a href=delete_category.php?cat_id=".$row['cat_id'].">delete</a><td>";
echo "<td><a class='btn btn-danger btn-xs'  href='delete_category.php?cat_id=".$row['cat_id']."' role='button'>delete</a></td>";
echo "<td><a class='btn btn-black btn-xs'  href='retire_category.php?cat_id=".$row['cat_id']."' role='button'>retire</a></td>";	
echo "<tr>";
       }
	echo "</table>\n";	

}
		
//$result = pg_query($dbcon, $sql);
//pg_close;

  
  
  
	?>
  
  
  <!-- &&& -->
</p>
<FORM ACTION="add_category_do.php" METHOD="POST">
  <H4>Add category </H4>
  <table border="0">
    <tr>
      <td align="right"><div align="left">category
          <input name="category" type="text" id="category" size="35">
      </div></td>
      <td>visibility
        <label>
        <select name="visibility" id="visibility">
          <option value="1" selected>normal</option>
          <option value="0">hidden</option>	
        </select>
      </label></td>
    </tr>
  </table>
  <input name="SUBMIT" TYPE="SUBMIT" VALUE="Submit">
</form>
<p>&nbsp;</p>
<p>

<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
