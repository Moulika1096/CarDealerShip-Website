<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Spartan Chariots</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      background-color: #ffcc33;
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
    a.purchase:link {
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        }
    
    a.purchase:visited {
        background-color: #f44336;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        }

    a.purchase:hover {
        background-color: red;
        }
    
    a.purchase:active {
        background-color: red;
        }
    
    .col-left{width:20%;float:left; margin: 1% 1%;}
    .col-right{width:60%;float:right; margin: 1% 1%;}
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Spartan Chariots</h1>
    <img src="/Project/images/chariot.png"/>      
    <p>Automotive Dealership</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand">Spartan Chariots</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="new_cars.php">New Cars</a></li>
        <li><a href="used_cars.php">Used Cars</a></li>
      </ul>
        <form class="navbar-form navbar-left" form action="action_page.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search by Keywords" name="keywords">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>      
      <ul class="nav navbar-nav navbar-right">
        <?php
        if (!isset($_SESSION['username'])) {
            echo '<li><a href="/Project/registration/login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>';
        }
        else {
            echo '<li><a href="/Project/account.php"><span class="glyphicon glyphicon-user"></span> '.$_SESSION["username"].'</a></li>';
            echo '<li><a href="/Project/registration/logout.php"><span></span> Log Out</a></li>';
        }
        ?>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
