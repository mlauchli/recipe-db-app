	<?php
	include_once('config.php');
	$recipe_name = trim($_POST['recipename']);
	$recipe_type = trim($_POST['recipetype']);
	$cost_factor = trim($_POST['costfactor']);
	$time_factor = trim($_POST['timefactor']);
	$veggie_factor = trim($_POST['veggiefactor']);
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
	$recipe_id = $_POST['recipe_id'];
	
	$ingredientsblock = json_encode($ingredients);
	$spicesblock = json_encode($spices);
	$instructionsblock = json_encode($instructions);

	$editsql = "UPDATE recipes 
				SET 
					recipe_name=?,
					recipe_type=?,
					cost_factor=?,
					time_factor=?,
					veggie_factor=?,
					serving_size=?,
					prep_time=?,
					cook_time=?,
					ingredients=?,
					spices=?,
					instructions=?,
					vegetarian=?,
					vegan=?,
					gluten_free=?,
					photo=?
				WHERE recipe_id=?";


	if ($stmt = $link->prepare($editsql)) {
		$stmt->bind_param('siiiiiiisssiiisi', 	$recipe_name, 
												$recipe_type, 
												$cost_factor, 
												$time_factor, 
												$veggie_factor, 
												$serving_size, 
												$prep_time, 
												$cook_time, 
												$ingredientsblock, 
												$spicesblock, 
												$instructionsblock, 
												$vegetarian, 
												$vegan, 
												$gluten_free, 
												$photo, 
												$recipe_id);
		$stmt->execute();
		echo '<div style="padding-left: 150px;"><svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" style="color: #5cb85c; width: 100px; height: auto;" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
		<path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
	  	</svg></div>
		<h2 style="color: #5cb85c; text-align: center;">Recipe Updated!</h2>';
	} else {
		$error = $link->errno . ' ' . $link->error;
		echo $error;
	}
?>