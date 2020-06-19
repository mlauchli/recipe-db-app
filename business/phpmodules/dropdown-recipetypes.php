//Generates the dropdown selector from the vendors table

<?php 
	$sql = mysqli_query($link, "SELECT recipetype_id, recipetype_description FROM recipetypes ORDER BY recipetype_description");
	while ($row = $sql->fetch_assoc()){
	echo "<option value=\"" .$row['recipetype_id'] . "\">" . $row['recipetype_description'] . "</option>";	
	}
?>