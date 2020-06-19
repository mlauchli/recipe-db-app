<?php
require_once('phpmodules/start-session.php');
require_once('phpmodules/populate-fullrecipe.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $recipe_name; ?> | Sarah's Buttercream Nommies and Treats</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../favicon.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
        footer {
            background-color: rgba(0,0,0,0.5);
        }
        .dropshadow {
            -webkit-box-shadow: 10px 10px 39px -21px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 10px 39px -21px rgba(0,0,0,0.75);
            box-shadow: 10px 10px 39px -21px rgba(0,0,0,0.75);
        }
        .container {
            background-color: white;
            border-radius: 10px;
        }
    /*DESKTOP*/
    @media (min-width: 991px) {
   
        
    }
    /*TABLET*/
    @media (min-width: 750px) AND (max-width: 990px) {
        .container {
            display: block;
            width: 90%;
            margin: 0 auto;
        }
    }

    /*MOBILE*/
    @media (min-width: 0px) AND (max-width: 749px) {
        .container {
            display: block;
            width: 90%;
            margin: 0 auto;
        }
    }
  </style>
</head>
<body style="background-image: url('../media/background-business.jpg'); background-size: cover; background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 10%; padding-right: 10%; margin-bottom: 2.5%">
        <a class="navbar-brand" href="dashboard.php">Butter and Dishes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="orders.php">Orders</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Expense</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="vendors.php">New Vendor</a>
                  <a class="dropdown-item" href="expenses.php">New Expense</a>
              </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="recipes.php">Recipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" style="background-color: #d9534f; color: white;">Log Out</a>
            </li>
        </ul>
    </nav>
    <main>
        <div class="jumbotron jumbotron-fluid">
            <div class="container pl-4 pr-4">
                <h1 class="display-4" style="text-align: center;"><?php echo $recipe_name ?></h1>
    <p class="lead" style="letter-spacing: 1.5px; text-align: center;">Prep Time: <?php echo $row['prep_time']; ?> minutes | Cook Time: <?php echo $row['cook_time'];?> minutes | Serves: <?php echo $row['serving_size'];?></p>
    <hr>
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-10 offset-sm-1 offset-md-1 offset-lg-1">
            <h2>Ingredients</h2>
            <ul>
                <?php echo $ingredients; ?>
            </ul>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-10 offset-sm-1 offset-md-1 offset-lg-1">
            <h2>Spices</h2>
            <ul>
                <?php echo $spices; ?>
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-10 col-md-10 col-sm-10 offset-lg-1 offset-md-1 offset-sm-1">
            <h2>Instructions</h2>
            <ol>
                <?php echo $instructions; ?>
            </ol>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
    <div id="edit"><button type="button" class="btn btn-primary mr-1 mb-1" data-toggle="modal" data-target="#editmodal">
            Edit
        </button></div>
        <button type="button" class="btn btn-danger ml-1 mb-1" data-toggle="modal" data-target="#deletemodal">
            Delete
        </button>
    </div>
</div>             
</div>
<!-- Edit Modal -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Recipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      

	<div class="container rounded mt-3" id="result-message">
		<form class="needs-validation" id="editform" action="phpmodules/formsubmit-recipes-edit.php" novalidate>
		  	<div class="form-row">
              <input type="hidden" id="recipeid" name="recipe_id" value="<?php echo $recipe_id;?>">
			    <div class="col-lg-6 col-md-6 col-sm-12" style="padding-top: 2%">
			    	<label for="recipename">Recipe Name</label>
  					<input type="text" class="form-control" id="recipename" name="recipename" value="<?php echo $recipe_name;?>" required>
					    <div class="valid-feedback">
					    Looks good!
					    </div>
					    <div class="invalid-feedback">
	          			Please enter a recipe name.
	        			</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12" style="padding-top: 2%">
			    	<label for="recipetype">Recipe Type</label>
		    		<select name="recipetype" class="custom-select">
                        <?php 
                            require_once('phpmodules/dropdown-recipetypes-edit.php');
                        ?>
				    </select>
				</div>
			    <div class="col-2">
			    </div>
		  	</div>
		  	<div class="row">
			    <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top: 2%">
                <label for="costfactor">Cost Factor</label>
		    		<select name="costfactor" class="custom-select">
                        <option <?php if($cost_factor == 1) echo 'selected'; ?>>$</option>
                        <option <?php if($cost_factor == 2) echo 'selected'; ?>>$$</option>
                        <option <?php if($cost_factor == 3) echo 'selected'; ?>>$$$</option>
                        <option <?php if($cost_factor == 4) echo 'selected'; ?>>$$$$</option>
				    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top: 2%">
                <label for="timefactor">Time Factor</label>
		    		<select name="timefactor" class="custom-select">
                        <option <?php if($time_factor == 1) echo 'selected'; ?>>1</option>
                        <option <?php if($time_factor == 2) echo 'selected'; ?>>2</option>
                        <option <?php if($time_factor == 3) echo 'selected'; ?>>3</option>
                        <option <?php if($time_factor == 4) echo 'selected'; ?>>4</option>
				    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top: 2%">
                <label for="veggiefactor">Veggie Factor</label>
		    		<select name="veggiefactor" class="custom-select">
                        <option <?php if($veggie_factor == 1) echo 'selected'; ?>>1</option>
                        <option <?php if($veggie_factor == 2) echo 'selected'; ?>>2</option>
                        <option <?php if($veggie_factor == 3) echo 'selected'; ?>>3</option>
                        <option <?php if($veggie_factor == 4) echo 'selected'; ?>>4</option>
				    </select>
				</div>
            </div>
            <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top: 2%">
			    	<label for="servingsize">Servings</label>
  					<input type="text" class="form-control" id="servingsize" name="servingsize" value="<?php echo $serving_size;?>" required>
					    <div class="valid-feedback">
					    Looks good!
					    </div>
					    <div class="invalid-feedback">
	          			Please enter a serving size.
	        			</div>
				</div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top: 2%">
				  	<label for="preptime">Prep Time</label>
			    	<input type="text" class="form-control" name="preptime" id="preptime" value="<?php echo $prep_time;?>">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="padding-top: 2%">
				  	<label for="cooktime">Cook Time </label>
			    	<input type="text" class="form-control" name="cooktime" id="cooktime" value="<?php echo $cook_time;?>">
			    </div>

		  	</div>
		  	<div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 mt-4" style="padding-top: 2%;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="vegetarian" name="vegetarian" value="true" <?php echo ($vegetarian==1 ? 'checked' : '') ?>>
                        <label class="form-check-label" for="vegetarian">Vegetarian</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="vegan" name="vegan" value="true" <?php echo ($vegan==1 ? 'checked' : '') ?>>
                        <label class="form-check-label" for="vegan">Vegan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="glutenfree" name="glutenfree" value="true" <?php echo ($gluten_free==1 ? 'checked' : '') ?>>
                        <label class="form-check-label" for="glutenfree">Gluten-Free</label>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12" style="padding-top: 2%">
				  	<label for="image">Image URL</label>
			    	<input type="text" class="form-control" name="photo" id="photo" value="<?php echo $photo;?>">
               	</div>
            </div>
            <span id="ingredients-list">
                <label for="ingredients">Ingredients</label>
			<?php echo $ingredient_rows; ?>
			</span>
			<div class="form-row">
				<div class="col-11 offset-1 mt-3">
				<button class="btn btn-primary ingredient-button" type="button">
					<svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
					</svg>
				</button>
				</div>
			</div>
			<span id="spices-list">
            <label for="spices">Spices</label>
			<?php echo $spice_rows; ?>
			</span>
			<div class="form-row">
				<div class="col-11 offset-1 mt-3">
				<button class="btn btn-primary spice-button" type="button">
					<svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
					</svg>
				</button>
				</div>
			</div>

			<span id="instructions-list">
                <label for="instructions">Instructions</label>
			<?php echo $instruction_rows; ?>
			</span>
			<div class="form-row">
				<div class="col-11 offset-1 mt-3">
				<button class="btn btn-primary instructions-button" type="button">
					<svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
					</svg>
				</button>
				</div>
			</div>
        </form>
</div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="editbutton" id="edit-button" class="btn btn-success">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--END EDIT MODAL-->

<!-- DELETE MODAL -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Recipe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="delete-result-message">
                
                <p>Are you sure you want to delete this recipe?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteform" action="phpmodules/formsubmit-recipes-delete.php">
                    <input type="hidden" id="recipeid" name="recipe_id" value="<?php echo $recipe_id;?>">
                    <button type="button" class="btn btn-danger" name="deletebutton" id="delete-button">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>    




    </main>
    <hr>
	<footer style="color: white;">
		<p style="text-align: center; ">Copyright Buttercream LLC. All rights reserved.</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script type="javascript" src="scripts/edit.js"></script> -->
    <script src="../js/scripts.js"></script>
</body>
</html>
