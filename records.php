<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<?php include("connection.php"); ?>


<h1>Users Table</h1>
<table border="1">
	<thead>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
<?php
	 
	$get_data = mysqli_query($connection, "SELECT * FROM user");
		while ($row = mysqli_fetch_assoc($get_data)) {
			$id = $row["id"];
			$db_username = $row["username"];
			$db_password = $row["password"];
			$update = "updateData";
			$delete = "deleteData";		
			echo "<tr>
					<td>$db_username</td>
					<td>$db_password</td>
					<td><button><a href='?update=$update&&id=$id'>Update</a></button></td>
					<td><button><a href='?delete=$delete&&id=$id'>Delete</a></button></td>
				</tr>";	
		}
?>
	</tbody>
</table>

</body>
</html>