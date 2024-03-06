<select name="fan" id="fan">
  <option> </option>
  <?php
include('pdo.php'); 

$active='1';
$fan_id=$_SERVER["REMOTE_USER"];
$stmt = $conn->prepare('SELECT * FROM store_staff WHERE active= :active ORDER BY fan_id');
$stmt->bindParam(':active', $active, PDO::PARAM_INT);	
$stmt->execute(); 	


if($stmt != 0)
	{
while($row_dropdown = $stmt->fetch_assoc()) {
$fan_id=$row_dropdown['fan_id'];
$first_name=$row_dropdown['first_name'];			
$last_name=$row_dropdown['last_name'];			
			
echo "<option value='$fan_id'>".$fan_id." ".$first_name." "."$last_name.</option>" ;
											}
	}
else	echo "<p>No entry for <b>" . $browse;
	
?>
</select>

