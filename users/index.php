<?php
session_start();
      
       include("connection.php");
       include("function.php");

       $user_data = check_login($con);


?>

<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My website</title>
</head>
<body>
	<a href="logout.php">logout</a>
	<h1>This is the index page</h1>

	<br>
	HELLO, <?php echo $user_data['username']; ?>
</body>
</html>
