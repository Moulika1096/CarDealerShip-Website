<?php   
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first.";
  	header('location: /Project/registration/login.php');
  }
?>

<!DOCTYPE html>
<html>
<body>
    <title>Purchase</title>
    <h1>Purchase</h1>
    
    This is a placeholder purchase page.
   
</body>
</html>
