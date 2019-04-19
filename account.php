<?php
include('header.php');
require 'datalogin.php';

$username = $_SESSION['username'];

$sql = "SELECT * 
	FROM customers 
	WHERE username='$username'";
	
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name = $row['first_name'] . " " . $row['last_name'];
        $address = $row['address'];
        $phone_number = $row['phone_number'];
        echo "Name: " . $name . "<br>";
        echo "Address: " . $address . "<br>";
        echo "Phone Number: " . $phone_number;
    }
}
    
else {
    echo "0 results";
}
                
?>

</body>
</html>
