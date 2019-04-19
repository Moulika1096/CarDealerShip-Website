<?php   
    session_start(); 

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first.";
        header('location: /Project/registration/login.php');
    }
  
    if (isset($_SESSION['username'])) {
        if(isset($_GET['stock_no']) & !empty($_GET['stock_no'])) {
			$item = $_GET['stock_no'];
			$_SESSION['cart'] = $item;
			header('location: cart.php?status=success');
        }
    }
?>
