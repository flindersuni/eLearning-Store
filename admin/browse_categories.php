<select name="cat_id" id="cat_id">
  <option>--- Pick a category ---</option>
  <?

//drop down list of categories
$sql_dropdown="SELECT * FROM store_category ORDER BY category";
$result_dropdown = $conn->query($sql_dropdown); //new sql;

 if($result_dropdown)
	{
		while ($row_dropdown = $result_dropdown->fetch_assoc()) {
$cat_id=$row_dropdown['cat_id'];			
$category=$row_dropdown['category'];			
				  echo "<option value='$cat_id'>$category</option>" ;
											}
	}
	else	echo "<p>No entry for <b>" . $browse;
	
?>
</select>

