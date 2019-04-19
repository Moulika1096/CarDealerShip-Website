<?php 
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first.";
    header('location: /Project/registration/login.php');
}

require 'datalogin.php'; 
include('header.php');

$username = $_SESSION['username'];
$stock_no = $_SESSION['cart'];

$sql = "select *
        from inventory
        where stock_no='$stock_no'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $make = $row['make'];
    $model = $row['model'];
    $year = $row['year'];
    $price = $row['price'];
    $discount = $row['discount'];
    $interest_rate = $row['interest_rate'];
    $down_payment = $row['down_payment'];
}

$total_price = $price - $discount;

$sql = "SELECT *
        FROM customers
        WHERE username='$username'";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $customerID = $row['customerID'];
    $name = $row['first_name'] . " " . $row['last_name'];
    $address = $row['address'];
    $phone_number = $row['phone_number'];
}

$_SESSION['customerID'] = $customerID;
?>

<?php 
if (empty($_SESSION['cart'])) {
    echo "<center>Your cart is empty.</center>";
}

else {
?>

<div class="container">
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>Stock Number</th>
	  		<th>Vehicle Make and Model</th>
	  		<th>Price</th>
            <th>Discount</th>
            <th>Interest Rate</th>
            <th>Down Payment</th>
            <th></th>
	  	</tr>
  	
	  	<tr>
            <td><?php echo $stock_no; ?></td>
            <td><?php echo $year . " " . $make . " " . $model; ?></td>
            <td>$<?php echo $price; ?></td>
            <td>-$<?php echo $discount; ?></td>
            <td><?php echo $interest_rate; ?></td>
            <td>$<?php echo $down_payment; ?></td>
            <td><a href="delcart.php?remove=<?php echo $stock_no; ?>">Remove</a></td>
        </tr>
		<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
			<td><strong>Total Price</strong></td>
			<td><strong>$<?php echo $total_price; ?></strong></td>
            <td></td>
		</tr>
	  </table>
	</div>
</div>

<center>
Name: <?php echo $name ?><br>
Address: <?php echo $address ?><br>
Phone Number: <?php echo $phone_number ?><br>

<form method="post" action="checkout.php">
    <div class="input-group">
  		<label>Loan Term</label>
  		<select name="loan_term">
            <option value="">Select</option>
            <option value="24">24 Months</option>
            <option value="36">36 Months</option>
            <option value="48">48 Months</option>
            <option value="72">72 Months</option>
        </select>
  	</div>
  	<div class="input-group">
  		<label>Credit Card Number</label>
  		<input type="text" name="credit_card" value="<?php echo $credit_card; ?>">
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="checkout_user">Checkout</button>
  	</div>
</form>
</center>

<?php } 
include ('footer.php'); ?>
