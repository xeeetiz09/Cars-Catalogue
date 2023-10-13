<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// title is set...
$title = 'Showroom';

// requiring heading file which is consistent across all pages of website...
require 'heading.php';
?>

	<?php

	// if the button 'For Sale' is pressed, the heading is set...
	if (isset($_GET['forSaleCars'])){
		echo '<h1>Cars For Sale</h1>';
	}

	// if the button 'Archived Cars' is pressed, the heading is set...
	else if (isset($_GET['archivedCars'])){
		echo '<h1>Archived Cars</h1>';
	}

	// by default, the heading is set...
	else{
		echo '<h1>Our Cars</h1>';
	}
	?>
		
		<br>

		<!-- link for showing all available cars (archived or unarchived both)... -->
		<a href = "showroom.php" style = "padding: 10px; background-color: #444; color: white; margin: 10px; text-decoration: none; border-radius: 10px;">All Cars</a>

		<!-- link for showing cars for sale only... -->
		<a href = "showroom.php?forSaleCars" style = "padding: 10px; background-color: #444; color: white; margin: 180px; text-decoration: none; border-radius: 10px;">For Sale</a>

		<!-- link for showing archived cars only... -->
		<a href = "showroom.php?archivedCars" style = "padding: 10px; background-color: #444; color: white; margin: 10px; text-decoration: none; border-radius: 10px;">Archived Cars</a>
		<br><br>


		<?php

		// when the 'Archive' is clicked, the car gets archived (i.e., the archived column name of cars table changes from N to Y)...
		if (isset($_GET['arcId'])){

			// getting car's id...
			$carId = $_GET['arcId'];

			// criteria for updating...
			$criteria = [
				'id' => $carId,
				'archived' => 'Y'
			];

			// updating the car's table ('updated' column)...
			$allQueries->update($pdo, 'cars', $criteria, 'id');

			// prompts message and redirects to archived cars page...
			echo '<script>alert("Car Archived Successfully!");
					window.location.href = "showroom.php?archivedCars";
				  </script>';
		}

		// when the 'Unarchive' is clicked, the car gets unarchived (i.e., the archived column name of cars table changes from Y to N)...
		else if (isset($_GET['unarcId'])){

			// getting car's id...
			$carId = $_GET['unarcId'];

			// criteria for updating...
			$criteria = [
				'id' => $carId,
				'archived' => 'N'
			];

			// updating the car's table ('updated' column)...
			$allQueries->update($pdo, 'cars', $criteria, 'id');

			// prompts message and redirects to for sale cars page...
			echo '<script>alert("Car Unarchived Successfully!");
					window.location.href = "showroom.php?forSaleCars";
				  </script>';
		}
		else if (isset($_GET['resid'])){

			// getting car's id...
			$carId = $_GET['resid'];

			// criteria for updating...
			$criteria = [
				'id' => $carId,
				'cur_price' => ''
			];

			// when the 'Restore Price' is clicked, the car's previous price gets restored (i.e., the cur_price column name of cars table changes from some value to null)...
			$allQueries->update($pdo, 'cars', $criteria, 'id');

			// prompts message and redirects to showroom page...
			echo '<script>alert("Previous Price was restored!");
					window.location.href = "showroom.php";
				  </script>';
		}
		?>

		<ul class="cars">
		<?php 

		// selecting all data from cars table...
		$cars = $allQueries->selectAll($pdo, 'cars');

		// if the button 'For Sale' in the showroom page is clicked, the cars which are listed on sale (unarchived) are shown...
		if (isset($_GET['forSaleCars'])){
			foreach ($cars as $car) {
				if ($car['archived'] == 'N'){
					include('../showCar.php');
				}
			}
		}

		// if the button 'Archived Cars' in the showroom page is clicked, the cars which are not listed on sale (archived) are shown...
		else if (isset($_GET['archivedCars'])){
			foreach ($cars as $car) {
				if ($car['archived'] == 'Y'){
					include('../showCar.php');
				}
			}
		}

		// by default, all cars (archived, unarchived) are shown...
		else{
		foreach ($cars as $car) {
			include('../showCar.php');
		}
	}
	?>

</ul>

</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php require('../footer.php'); ?>