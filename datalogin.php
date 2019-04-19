<?php
$servername = "localhost";
$username = "root";
$password = "root";
$db = "myCarDealership";

	$conn=new mysqli($servername, $username, $password, $db);
	
    if($conn->connect_error)
		die('Connect Error');
?>
