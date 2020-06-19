<?php
require_once('phpmodules/start-session.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Recipes | Sarah's Buttercream Nommies and Treats</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="../favicon.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
        <div class="container">
            <div class="row">
                <div class="col-8 justify-content-start">
                <h1>
                    Recipes
                </h1>
                </div>
                <div class="col-4 justify-content-end pt-3">
                <a href="newrecipe.php">
                    <button class="btn btn-success">
                        New Recipe
                    </button>
                </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <?php require_once('phpmodules/card-recipe.php');?>
            </div>
        </div>
    </main>
    <hr>
	<footer style="color: white;">
		<p style="text-align: center; ">Copyright Buttercream LLC. All rights reserved.</p>
	</footer>
</body>
</html>
