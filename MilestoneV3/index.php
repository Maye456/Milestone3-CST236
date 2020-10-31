<?php
require_once 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
</head>

<body>
	<h1>People Search</h1>
	<form action="presentation/handlers/PersonSearchHandler.php">
		Search For A Person:<input type="text" name="name"></input><br>
		<input type="submit" value="Search"></input>
	</form>
	
	<h1>Product Search</h1>
	<form action="presentation/handlers/ProductSearchHandler.php">
		Search For A Product:<input type="text" name="name"></input><br>
		<input type="submit" value="Search"></input>
	</form>
</body>
</html>