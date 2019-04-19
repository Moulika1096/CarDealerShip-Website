<?php
session_start();
require 'datalogin.php'; 
include('header.php');

$stock_no = $_SESSION['cart'];
$customerID = $_SESSION['customerID'];

if (isset($_POST['checkout_user'])) {
    $loan_term = mysqli_escape_string($conn, $_POST['loan_term']);
    $credit_card = mysqli_escape_string($conn, $_POST['credit_card']);
}

$sql = "select price, discount
        from inventory
        where stock_no='$stock_no'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $price = $row['price'];
    $discount = $row['discount'];
}

$total_price = $price - $discount;

$sql = "INSERT INTO purchases (customerID, stock_no, date, total_price, loan_term, credit_card, order_status)
        VALUES ('$customerID', '$stock_no', CURDATE(), '$total_price', '$loan_term', '$credit_card', 'pending')";
        
mysqli_query($conn, $sql);
?>

<center>Your purchase is pending approval.</center>

<?php include('footer.php'); ?>
