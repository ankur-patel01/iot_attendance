<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href="css/bootstrap.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css" />
</head>

<header>
	<div class="topnav" id="myTopnav">
		<a class="navbar-brand " style="display: flex;align-items: center;" href="#"><img src="imgg/logosri.png" style="height: 3rem; width: 3rem;    border-radius: 0.5rem;" alt="">SRI DATIA</a>
		<a  href="admin_home.php">Home</a>
		<a href="admin_log.php">Students Log</a>
		<a href="admin_students.php">Enrolled Students</a>
		<a href="manage_students.php">Manage Students</a>
		<a href="devices.php">Devices</a>
		<?php
		if (isset($_SESSION['Admin-name'])) {
			echo '<a href="#" data-toggle="modal" data-target="#admin-account">' . $_SESSION['Admin-name'] . '</a>';
			echo '<a href="logout.php">Log Out</a>';
		} else {
			echo '<a href="login.php">Log In</a>';
		}
		?>
		<a href="javascript:void(0);" class="icon" onclick="navFunction()">
			<i class="fa fa-bars"></i></a>
	</div>
	<div class="up_info1 alert-danger"></div>
	<div class="up_info2 alert-success"></div>
</header>
<script>
	function navFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
		} else {
			x.className = "topnav";
		}
	}
</script>

