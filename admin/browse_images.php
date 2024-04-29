<select name="image" id="image">
<option>--- Pick an image ---</option>	
  <?php
//drop down list of images
$sql_dropdown="SELECT * FROM store_images ORDER BY image";
$result_dropdown = $conn->query($sql_dropdown); //new sql;

 if($result_dropdown)
	{
	 	 
while($row_dropdown = $result_dropdown->fetch_assoc()) {
$image=$row_dropdown['image'];			
			
				  echo "<option value='$image'>$image</option>" ;
											}
	}
	else	echo "<p>No entry for <b>" . $browse;
	
?>
</select>

