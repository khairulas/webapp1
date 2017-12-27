<?php
$error = $_SESSION['error'];
switch ($error) {
	case 1:
		echo "Unauthorized";
		break;
	case 2:
		echo "Invalid parameter";
		break;
	case 3:
		echo "Invalid page";
		break;
	default:
		echo "general error";
}
?>