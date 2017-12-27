<?php session_start();
if (!isset($_SESSION["username"])) {
	$_SESSION["username"] = "Guest";
	$_SESSION["role"] = "Guest";
}
if (isset($_GET["logout"])) {
	$_SESSION["username"] = "Guest";
	$_SESSION["role"] = "Guest";
}
function clean_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
<style>
.flex-container {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    text-align: center;
}

.flex-container > * {
    padding: 15px;
    -webkit-flex: 1 100%;
    flex: 1 100%;
}

.article {
    text-align: left;
}

header {background: blue;color:white;}
footer {background: #aaa;color:white;}
.nav {background:#eee;}

.nav ul {
    list-style-type: none;
 padding: 0;
}
   
.nav ul a {
 text-decoration: none;
}

@media all and (min-width: 768px) {
    .nav {text-align:left;-webkit-flex: 1 auto;flex:1 auto;-webkit-order:1;order:1;}
    .article {-webkit-flex:5 0px;flex:5 0px;-webkit-order:2;order:2;}
    footer {-webkit-order:3;order:3;}
}
</style>
</head>
<body>

<div class="flex-container">
<header>
  <h1>E-College Binary</h1>
</header>

<nav class="nav">
<ul>
  <li>User: <?php echo $_SESSION['username']?></li>
  <li>Role: <?php echo $_SESSION['role']?></li>
  <li><a href="index.php?page=home">Home</a></li>
  <?php 
  	if ($_SESSION['username'] == 'Guest' || $_SESSION['username'] == '') {
 	 	echo '<li><a href="index.php?page=login">Login</a></li>';
	} else {
		echo '<li><a href="index.php?page=home&logout">Logout</a></li>';
	}
  ?>
  <?php 
  if ($_SESSION['role'] == 'admin') {
  	echo '<li><a href="index.php?page=userview">Manage Users</a></li>';
  	echo '<li><a href="index.php?page=managestudent">Manage Student</a></li>';
  }
  if ($_SESSION['role'] == 'normal') {
  	echo '<li><a href="index.php?page=student_profile">My Profile</a></li>';
  	echo '<li><a href="index.php?page=submitcomplaint">Submit Complaint</a></li>';
  	echo '<li><a href="index.php?page=items">My Items</a></li>';
  }
  ?>
  <li><a href="index.php">About</a></li>
</ul>
</nav>

<article class="article">
  <?php 

  if (isset($_GET['page'])) {
  	if ($_GET['page'] == 'home') {
  		include 'home.php';
  	} elseif ($_GET['page'] == 'login') {
  		include 'login.php';
  	} elseif ($_GET['page'] == 'userview') {
  		if ($_SESSION['role'] == 'admin') {
  			include 'user_view.php';
  		} else {
  			$_SESSION['error'] = 1;
  			include 'error.php';
  		}
  	} elseif ($_GET['page'] == 'useradd') {
  		include 'user_add.php';	
  	} elseif ($_GET['page'] == 'student_profile') {
  			include 'student_profile.php';
  	} elseif ($_GET['page'] == 'submitcomplaint') {
  			include 'submit_complaint.php';
  	} elseif ($_GET['page'] == 'useredit') {
  		include 'user_edit.php';	
  	} elseif ($_GET['page'] == 'userdelete') {
  		include 'user_delete.php';	
  	} elseif ($_GET['page'] == 'managestudent') {
  		include 'student_manage.php';
   	} elseif ($_GET['page'] == 'error') {
  		include 'error.php';
   	} else {
  		include 'home.php';
  	}
  } else {
  		include 'home.php';
  }
  ?>
</article>

<footer>Copyright © mysite.com</footer>
</div>

</body>
</html>

