<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<?php 
	
	//Delete
	if (empty($_GET["delete"])) {
		
	}else {
		include("delete.php");
	}
	//Update
	if (empty($_GET["update"])) {
		include("records.php");
	}else {
		include("update.php");
	}

?>	
<br><br>
<button><a href="login.php">Logout</a></button>
</body>
</html>