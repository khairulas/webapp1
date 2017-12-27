<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "webapp_db";
// Create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
?>
