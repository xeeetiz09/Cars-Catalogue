<?php

// requiring autoloadClass to load the required classes automatically (autoloading class)
require 'autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// title is set...
$title = "Our Cars";

// requiring heading file which is consistent across all pages of website...
require 'heading.php';
?>
<main class="admin">
	<section class="left">
		<ul>
		<?php

		// selecting all data from manufacturers table...
		$manuf = $allQueries->selectAll($pdo, 'manufacturers');

		// extracting all selected data from manufacturer table...
		foreach ($manuf as $manufs){

			// showing manufacturer name on the left navigation menu...
			echo '<li><a style = "text-transform: capitalize;" href="cars.php?id='.$manufs['id'].'">'.$manufs['name'].'</a></li>';
		}
		?>
		</ul>
	</section>
	
	<section class="right">
	<?php

	// when specific manufactuer's name is pressed, the car from such manufacturer is shown...
	if (isset($_GET['id'])){
		$id = $_GET['id'];

		// selecting manufacturer's data...
		$manufacturer = $allQueries->find($pdo, 'manufacturers', 'id', $id);

		// showing manufacturer's name...
		echo "<h1 style = 'text-transform: capitalize;'>". $manufacturer['name'] ." Cars</h1>";
	}
	else{
	?>
	<h1>Our cars</h1>
	<?php
	}
	?>
	<ul class="cars">
	<?php

	// if id is fetched, then the cars with specific manufacturer id is shown...
	if (isset($_GET['id'])){
		$cars = $allQueries->select($pdo, 'cars', 'manufacturerId', $id);
	}
	else{

		// by default, all cars are shown...
		$cars = $allQueries->selectAll($pdo, 'cars');
	}
	foreach ($cars as $car) {

		// archived cars are not shown...
		if ($car['archived'] == 'N'){
			include('showCar.php');
		}
	}
	?>
	</ul>
	</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php require('footer.php'); ?>