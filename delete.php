<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>

<?php  

	include("connection.php");
	$id = $_GET["id"];
	$delete_record = mysqli_query($connection, "SELECT * FROM user WHERE id='$id'");
	$delete_row = mysqli_fetch_assoc($delete_record);

	$db_username = $delete_row["username"];
	$db_password = $delete_row["password"];

		if (isset($_POST["btnDelete"])) {
			mysqli_query($connection, "DELETE FROM user WHERE id='$id'");
			echo "<script>alert('$db_username Record has been deleted');
				window.location.href='index.php';</script>";
		}
?>

<center>
	<form method="POST">
		<h4>Are you sure you want to delete this user <?php echo $db_username; ?>?</h4>
		<input type="submit" name="btnDelete" value="Delete">
		<button><a href="?">Cancel</a></button>
	</form>
</center>

</body>
</html>