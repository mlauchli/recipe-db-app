<?php
require_once('phpmodules/start-session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>New Recipe | Sarah's Buttercream Nommies and Treats</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../favicon.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  	/*Desktop*/
  	@media (min-width: 992px) {
  		.container {
  			display: block;
  			width: 40%;
  			margin: 0 auto;
  		}
  	}
  	/*Mobile*/
  	@media (max-width: 767px) {
  		.container {
  			display: block;
  			width: 90%;
  			margin: 0 auto;
  		}
  	}

  	/*Medium devices (tablets, 768px and up)*/
	@media (min-width: 768px) {
		.container {
  			display: block;
  			width: 90%;
  			margin: 0 auto;
  		}
  	}
  </style>
</head>
<body style="background-image: url('../media/background-business.jpg'); background-size: cover; background-attachment: fixed;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding-left: 10%; padding-right: 10%;">
        <a class="navbar-brand" href="dashboard.php">Butter and Dishes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
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
            <li class="nav-item">
                <a class="nav-link" href="recipes.php">Recipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php" style="background-color: #d9534f; color: white;">Log Out</a>
            </li>
        </ul>
    </nav>
	<?php 
		require_once('phpmodules/formsubmit-recipes.php');
	 ?>
	<div class="container" style="background-color: white; border-radius: 1%; margin-top: 5%;">
		<div class="row">
			<div class="col-10 offset-1">
				<h1>New Recipe</h1><hr>
			</div>
		</div>

		<form class="needs-validation" novalidate method="POST" action="newrecipe.php">
		  	<div class="form-row">
			    <div class="col-lg-5 col-md-5 col-sm-10 offset-1" style="padding-top: 2%">
			    	<label for="recipename">Recipe Name</label>
  					<input type="text" class="form-control" id="recipename" name="recipename" placeholder="e.g. Chana Masala" required>
					    <div class="valid-feedback">
					    Looks good!
					    </div>
					    <div class="invalid-feedback">
	          			Please enter a recipe name.
	        			</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-10 offset-sm-1 offset-md-0 offset-lg-0" style="padding-top: 2%">
			    	<label for="recipetype">Recipe Type</label>
		    		<select name="recipetype" class="custom-select">
                        <?php 
                            require_once('phpmodules/dropdown-recipetypes.php');
                        ?>
				    </select>
				</div>
		  	</div>
		  	<div class="form-row">
			    <div class="col-lg-3 col-md-3 col-sm-3 offset-1" style="padding-top: 2%">
                <label for="costfactor">Cost Factor</label>
		    		<select name="costfactor" class="custom-select">
                        <option>$</option>
                        <option>$$</option>
                        <option>$$$</option>
                        <option>$$$$</option>
				    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-top: 2%">
                <label for="timefactor">Time Factor</label>
		    		<select name="timefactor" class="custom-select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
				    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-top: 2%">
                <label for="veggiefactor">Veggie Factor</label>
		    		<select name="veggiefactor" class="custom-select">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
				    </select>
				</div>
            </div>
            <div class="form-row">
            <div class="col-lg-3 col-md-3 col-sm-3 offset-1" style="padding-top: 2%">
			    	<label for="servingsize">Servings</label>
  					<input type="number" class="form-control" id="servingsize" name="servingsize" placeholder="e.g. 12" required>
					    <div class="valid-feedback">
					    Looks good!
					    </div>
					    <div class="invalid-feedback">
	          			Please enter a serving size.
	        			</div>
				</div>
                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-top: 2%">
				  	<label for="preptime">Prep Time</label>
			    	<input type="number" class="form-control" name="preptime" id="preptime" placeholder="in minutes">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3" style="padding-top: 2%">
				  	<label for="cooktime">Cook Time</label>
			    	<input type="number" class="form-control" name="cooktime" id="cooktime" placeholder="in minutes">
			    </div>

		  	</div>
		  	<div class="form-row">
                <div class="col-lg-5 col-md-5 col-sm-8 offset-1 mt-4" style="padding-top: 2%;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="vegetarian" name="vegetarian" value="true">
                        <label class="form-check-label" for="vegetarian">Vegetarian</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="vegan" name="vegan" value="true">
                        <label class="form-check-label" for="vegan">Vegan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="glutenfree" name="glutenfree" value="true">
                        <label class="form-check-label" for="glutenfree">GF</label>
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-10 offset-lg-0 offset-md-0 offset-sm-1" style="padding-top: 2%">
				  	<label for="image">Image URL</label>
			    	<input type="text" class="form-control" name="photo" id="photo" placeholder="https://live.staticflickr.com/3867/1e6_k.jpg">
               	</div>
			</div>
			<span id="ingredients-list">
			<div class="form-row">
			    <div class="col-lg-5 col-md-10 col-sm-10 offset-1" style="padding-top: 2%">
			    	<label for="ingredients">Ingredients</label>
                    <input type="text" class="form-control" id="ingredients0" name="ingredients[]" placeholder="e.g. 3 cups sugar">
				</div>
                    <div class="valid-feedback">
					    Looks good!
					</div>
					<div class="invalid-feedback">
	          			C'mon, you need ingredients.
					</div>
			</div>
			</span>
			<div class="form-row">
				<div class="col-lg-4 col-md-4 col-sm-10 offset-1 mt-3">
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
			<div class="form-row">
			    <div class="col-lg-5 col-md-10 col-sm-10 offset-1" style="padding-top: 2%">
			    	<label for="spices0">Spices</label>
                    <input type="text" class="form-control" id="spices0" name="spices[]" placeholder="e.g. 3 tsp salt">
				</div>
                    <div class="valid-feedback">
					    Looks good!
					</div>
					<div class="invalid-feedback">
	          			C'mon, you need spices.
					</div>
			</div>
			</span>
			<div class="form-row">
				<div class="col-lg-4 col-md-4 col-sm-10 offset-1 mt-3">
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
			<div class="form-row">
			    <div class="col-lg-5 col-md-10 col-sm-10 offset-1" style="padding-top: 2%">
			    	<label for="instructions0">Instructions</label>
                    <input type="text" class="form-control" id="instructions0" name="instructions[]" placeholder="e.g. Add enough garlic to kill a horse.">
				</div>
                    <div class="valid-feedback">
					    Looks good!
					</div>
					<div class="invalid-feedback">
	          			C'mon, you need instructions.
					</div>
			</div>
			</span>
			<div class="form-row">
				<div class="col-lg-4 col-md-4 col-sm-10 offset-1 mt-3">
				<button class="btn btn-primary instructions-button" type="button">
					<svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
						<path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
					</svg>
				</button>
				</div>
			</div>

		    <div class="form-row" style="padding-bottom: 2%">
			  	<div class="col-lg-2 col-md-5 col-sm-10 offset-lg-4 offset-md-1 offset-sm-1" style="padding-top: 2%;">
			    	<button class="btn btn-success" name="submit" type="submit" style="width: 100%">Add New Recipe</button>
				</div>
		  		<div class="col-lg-2 col-md-5 col-sm-10 offset-lg-0 offset-md-0 offset-sm-1" style="padding-top: 2%;">
			    	<button class="btn btn-primary" type="reset" style="width: 100%">Clear form</button>
				</div>
			</div>
          </form>
	</div>

		<hr>
	<footer style="color: white;">
		<p style="text-align: center; ">Copyright Buttercream LLC. All rights reserved.</p>
	</footer>
	<script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>


