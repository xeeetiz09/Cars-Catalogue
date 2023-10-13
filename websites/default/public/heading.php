<?php
include('./connection.php');
?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="./styles.css"/>
		<title>Claires's Cars - <?php echo $title; ?></title>
	</head>
	<body>
	<header>
		<section>
			<?php require './openinghour.php'; ?>
                <img src="./images/logo.png"/>
		</section>
	</header>
    <nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="cars.php">Showroom</a></li>
			<li><a href="contact.php">Contact us</a></li>
			<li><a href="career.php">Claire's Careers</a></li>
			<li><a href="/admin/">Login to Admin Page</a></li>
		</ul>
	</nav>
<img src="./images/randombanner.php"/>