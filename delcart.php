<?php 
session_start();
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if (isset($_GET['remove']) & !empty($_GET['remove'])) {
	$delitem = $_GET['remove'];
    $key = array_search($delitem, $cartitems);
	unset($cartitems[$key]);
	$itemids = implode(",", $cartitems);
	$_SESSION['cart'] = $itemids;
}

header('location:cart.php');
?>
