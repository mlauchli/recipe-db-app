
<?php 
	$sql = mysqli_query($link, "SELECT recipetype_id, recipetype_description FROM recipetypes ORDER BY recipetype_description");
	while ($row = $sql->fetch_assoc()){
        if ($recipe_type == $row['recipetype_id']){
            echo "<option value=\"" .$row['recipetype_id'] . "\" selected>" . $row['recipetype_description'] . "</option>";
        } else { echo "<option value=\"" .$row['recipetype_id'] . "\">" . $row['recipetype_description'] . "</option>";
        };
	}
?>