
    
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
echo "<h4>Modify this category</h4>";
	
$cat_id=filter_input(INPUT_GET, 'cat_id'); /// new Nov 2023		
$stmt = $conn->prepare('SELECT * FROM store_category WHERE cat_id = :cat_id');
$stmt->bindParam(':cat_id', $cat_id, PDO::PARAM_STR);
$stmt->execute();	 
	 
	 
 if(!$stmt)
	{
echo "An error occured.\n";
exit;
 }


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {		
$visibility=$row['visibility'];	
$category=$row['category'];
$cat_id=$row['cat_id'];	
}


switch ($visibility){
case '1':
    $visibility = 'normal';
break;
case '0':
    $visibility = 'hidden';
break;
}
?>
<form name="modify" method="post" action="edit_category_do.php">
  <table  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Category</td>
      <td><input name="category" type="text" id="category" value="<?php echo "".$category."" ?>"></td>
      <td> Visibility</td>
      <td><label>
        <select name="visibility" id="visibility">
          <option value="<?php echo $visibility ?>" selected="selected"><?php echo $visibility ?></option>
          <option value="1">normal</option>
          <option value="0">hidden</option>
        </select>
      </label></td>
    </tr>
    </tr>
  </table>
  <input name="cat_id" type="hidden" value="<?php echo "".$cat_id."" ?>" size="4">
  <p>
    <input type="submit" name="Submit" value="Modify?">
  </p>
</form>
<?php 

	

//$result = pg_query($dbcon, $sql);
if (!stmt) {
  echo "An error occured.\n";
  exit;
}


 ?> 
<!--  body ends GF -->


  <?php include('../bootstrap/footer_js.html'); ?>
  </body>
</html>
