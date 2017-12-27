
<h1>User Entry</h1>
<form method="post" action="index.php?page=useradd">
Username
<input type="text" name="username" value=""></br>
Password
<input type="password" name="password" value=""></br>
Role
<select name="role">
	<option value="">Choose</option>
	<option value="admin">Administrator</option>
	<option value="staf">Staf</option>
	<option value="customer">Customer</option>
</select> 
</br>
Status
<input type="radio" name="status" value="active"> Active
<input type="radio" name="status" value="inactive"> Inactive
</br>
</br>
<input type="submit" name="AddUser" value=" OK "></br>
</form>
<?php
if (isset($_POST['AddUser'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (isset($_POST['role']))
		$role = $_POST['role'];
	else
		$role = "";
	if (isset($_POST['status']))
		$status = $_POST['status'];
	else
		$status = "";
	$status = $_POST['status'];
	include 'dbconnect.php';

	// SQL query
	$sql = "INSERT INTO app_user 
				(username, password, role, status)
				VALUES
				('$username',
				PASSWORD('$password'),
				'$role',
				'$status')";

	// Execute the query (the recordset $rs contains the result)
	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
}
?>
</br><a href="index.php?page=userview">Back</>
