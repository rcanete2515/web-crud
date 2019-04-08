<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

<?php include("connection.php"); ?>

<?php 
	
	$username = $password = "";
	$usernameErr = $passwordErr = "";

	if (isset($_POST["btnRegister"])) {
			if (empty($_POST["username"])) {
				$usernameErr = "Required!";
			}else {
				$username = $_POST["username"];
			}
			if (empty($_POST["password"])) {
				$passwordErr = "Required!";
			}else{
				$password = $_POST["password"];
			}

			if ($username && $password) {
				mysqli_query($connection, "INSERT INTO user(username,password) VALUES('$username','$password') ");
				echo "<script>alert('User has been added');</script>";
			}
		}	

?>

<form method="POST">
	<h1>Create Account</h1>
	<label>Username: </label>
	<input type="text" name="username"> <span><?php echo $usernameErr; ?></span><br><br>
	<label>Password: </label>
	<input type="password" name="password"> <span><?php echo $passwordErr; ?></span><br><br>
	<input type="submit" name="btnRegister" value="Register">
</form>


</body>
</html>