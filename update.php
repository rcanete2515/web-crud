<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>

<?php  
	include("connection.php");
	$id = $_GET["id"];

	$edit_record = mysqli_query($connection, "SELECT * FROM user WHERE id='$id'");
		while ($row = mysqli_fetch_assoc($edit_record)) {
			$db_username = $row["username"];
			$db_password = $row["password"];
		}

	$newUsername = $newPassword = "";
	$newUsernameErr = $newPasswordErr = "";
		if (isset($_POST["btnUpdate"])) {
				if (empty($_POST["newUsername"])) {
					$newUsernameErr = "Must not be empty";
				}else {
					$newUsername = $_POST["newUsername"];
				}
				if (empty($_POST["newPassword"])) {
					$newPasswordErr = "Must not be empty";
				}else {
					$newPassword = $_POST["newPassword"];
				}

				if ($newUsername && $newPassword) {
					mysqli_query($connection, "UPDATE user SET username='$newUsername', password='$newPassword' WHERE id='$id'");
					echo "<script>alert('Account has been updated');
						window.location.href='index.php';</script>";
				}
			}	
?>


<form method="POST">
	<h1>Update Account</h1>
	<label>Username:</label>
	<input type="text" name="newUsername" value="<?php echo $db_username; ?>"> 
	<span><?php echo $newUsernameErr; ?></span> <br><br>
	<label>Password:</label>
	<input type="password" name="newPassword" value="<?php echo $db_password; ?>"> 
	<span><?php echo $newPasswordErr; ?></span> <br><br>
	<input type="submit" name="btnUpdate" value="Update">
</form>

</body>
</html>