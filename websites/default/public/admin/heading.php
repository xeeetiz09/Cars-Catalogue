<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../styles.css"/>
		<title>Claires's Cars - <?php echo $title ?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>
			<?php require('../openinghour.php'); ?>
			</aside>
			<img src="../images/logo.png"/>

		</section>
	</header>
		<?php

		// if admin is logged in, then navigation menu is shown...
		if (isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == true) {
			?>
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="showroom.php">Showroom</a></li>
			<li><a href="contact.php">Messages</a></li>
			<li><a href="logout.php">Log Out</a></li>
		</ul>
	</nav>
	<?php
		}
		?>

	<img src="../images/randombanner.php"/>
	<main class="admin">
		
	<?php

	// if admin is logged in, then left side navigation menu is shown...
	if (isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == true) {
	?>

	<section class="left">
		<ul>
			<li><a href="manufacturers.php">Manufacturers</a></li>
			<li><a href="cars.php">Cars</a></li>
			
			<?php

			// only claire can add, edit or delete other admin's account...
			if ($_SESSION['username'] === 'Claire') {
			?>
				<li><a href="admins.php">Admin</a></li>
			<?php
			}
			?>
			<li><a href="jobs.php">Jobs</a></li>
		</ul>
	</section>
	<?php
	}
	?>
	<section class="right">