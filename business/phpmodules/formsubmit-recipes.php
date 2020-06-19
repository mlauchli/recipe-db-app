<?php
	if(isset($_POST['submit'])) { 
            // prepare sql and bind parameters
            $stmt = $link->prepare("INSERT INTO recipes (recipe_name, recipe_type, cost_factor, time_factor, veggie_factor, serving_size, prep_time, cook_time, ingredients, spices, instructions, vegetarian, vegan, gluten_free, photo)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssiiiiisssiiis", $recipe_name, $recipe_type, $cost_factor, $time_factor, $veggie_factor, $serving_size, $prep_time, $cook_time, $ingredientsblock, $spicesblock, $instructionsblock, $vegetarian, $vegan, $gluten_free, $photo);
            $recipe_name = trim($_POST['recipename']);
            $recipe_type = ($_POST['recipetype']);
            $cost_factor = ($_POST['costfactor']);
            $time_factor = ($_POST['timefactor']);
            $veggie_factor = ($_POST['veggiefactor']);
            $serving_size = trim($_POST['servingsize']);
            $prep_time = trim($_POST['preptime']);
            $cook_time = trim($_POST['cooktime']);
            $ingredients = $_POST['ingredients'];
            $spices = $_POST['spices'];
            $instructions = $_POST['instructions'];
            $vegetarian = ( isset($_POST['vegetarian']) ) ? true : false;	
            $vegan = ( isset($_POST['vegan']) ) ? true : false;	
            $gluten_free = ( isset($_POST['glutenfree']) ) ? true : false;
            $photo = trim($_POST['photo']);	
            $ingredientsblock = json_encode($ingredients);
            $spicesblock = json_encode($spices);
            $instructionsblock = json_encode($instructions);

            // insert a row
            if($stmt->execute()) {        
            echo "<p style='background-color: #5cb85c; color: white; text-align: center; padding-top: 20px; vertical-align: middle;'>Recipe successfully added!</p>";
            } else  {
            echo "<p style='background-color: #d9534f; color: white; text-align: center; padding-top: 20px; vertical-align: middle;'>Fuck it didn't work!!</p>";
            }
    }
?>