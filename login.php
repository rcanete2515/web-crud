<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?php include("connection.php"); ?>

<?php 
	
	$username = $password = "";
	$usernameErr = $passwordErr = "";

	if (isset($_POST["btnLogin"])) {
		if (empty($_POST["username"])) {
			$usernameErr = "Enter your username";	
		}else {
			$username = $_POST["username"];
		}
		if (empty($_POST["password"])) {
			$passwordErr = "Enter your password";
		}else {
			$password = $_POST["password"];
		}

		if ($username && $password) {
			$check_username = mysqli_query($connection, "SELECT * FROM user WHERE username='$username'");
			$check_username_row = mysqli_num_rows($check_username);
				if ($check_username_row > 0) {
					while ($row = mysqli_fetch_assoc($check_username)) {
						$db_password = $row["password"];
							if ($password == $db_password) {
								echo "<script>window.location.href='index.php';</script>";
							}else {
								$passwordErr = "Password is incorrect";
							}
					}
				}
		}
	}
?>

<form method="POST">
	<h1>Login</h1>
	<label>Username: </label>
	<input type="text" name="username"> <span><?php echo $usernameErr; ?></span><br><br>
	<label>Password: </label>
	<input type="password" name="password"> <span><?php echo $passwordErr; ?></span><br><br>
	<input type="submit" name="btnLogin" value="Login">
</form>


</body>
</html>