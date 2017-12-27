
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
<?php
include 'dbconnect.php';

if (isset($_POST['search'])) {
	$searchname = $_POST['searchname'];
} else 
	$searchname = '';
$sql = "SELECT * FROM student WHERE username = '" . $_SESSION['username'] . "'";

$result = mysqli_query($conn, $sql);
?>
</br><a href="index.php?page=useradd">Add user</a>
<table>
  <tr>
    <th>Username</th>
    <th>Role</th>
    <th>Status</th>

  </tr>
<?php 
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result)
?>	
    
    	<tr>
    	<td><?php echo $row["matric_number"] ?></td>
    	<td><?php echo $row["prog_code"] ?></td>
    	<td><?php echo $row["student_name"] ?></td>
    	</tr>
<?php
    
} else {
    echo "<tr><td colspan='3'>0 results</td></tr>";
}

mysqli_close($conn);
?>
</table>