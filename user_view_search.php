<!DOCTYPE html>
<html>
<head>
<style>
table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 80%;
}

td, th {
	border: 1px solid #dddddd;
	text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<?php
include 'dbconnect.php';
	
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['searchname'])) {
	$searchname = $_GET['searchname'];
} else 
	$searchname = '';

$sql = "SELECT username, role, status FROM app_user";
$sql = $sql . " WHERE username LIKE '%" . $searchname . "%'";
$result = mysqli_query($conn, $sql);
?>
</br><a href="user_add.php">Add user</a>
</br>

<form method="GET" action="<?php echo $_SERVER['PHP_SELF']?>?searchkey=<?php echo $searchkey?>">
	<input type="text" name="searchname" value="<?php echo $searchname?>">
	<input type="submit" name="search" value="Search User">
</form>

<table>
  <tr>
    <th>Username</th>
    <th>Role</th>
    <th>Status</th>
    <th colspan="2">Action</th>
  </tr>
<?php 
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
?>	
    
    	<tr>
    	<td><?php echo $row["username"] ?></td>
    	<td><?php echo $row["role"] ?></td>
    	<td><?php echo $row["status"] ?></td>
    	<td><a href="user_edit.php?username=<?php echo $row["username"] ?>">Edit</a></td>
    	<td><a href="user_delete.php?username=<?php echo $row["username"] ?>">Delete</a></td>
    	</tr>
<?php
    }
} else {
    echo "<tr><td colspan='3'>0 results</td></tr>";
}

mysqli_close($conn);
?>
</table>
</body>
</html>