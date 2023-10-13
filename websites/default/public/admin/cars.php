<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// when submit button is pressed...
if (isset($_POST['submit'])){

	// title is changed to Delete Car...
	$title = 'Delete Car';

	// requiring heading file which is consistent across all pages of website...
	require 'heading.php';

	// fetching car's id...
	$id = $_POST['id'];

	// function to delete the car with fetched id...
	$allQueries->delete($pdo, 'cars', 'id', $id);

	// prompts message...
	echo '<h2 style = "text-align: center;">Car deleted</h2>';
}
else{

	// by default, the title says 'All Cars'...
	$title = 'All Cars';

	// requiring heading file which is consistent across all pages of website...
	require 'heading.php';
?>
	<h2>Cars</h2>

	<!-- link to redirect to add car page -->
	<a class="new" href="addcar.php">Add new car</a>
	<?php
	echo '<table>';
		echo '<thead>';
		echo '<tr>';
			echo '<th>Model</th>';
			echo '<th style="width: 10%">Price</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
		echo '</tr>';

		// selecting all the data from car's database table...
		$cars = $allQueries->selectAll($pdo, 'cars');

		// extracting the selected data...
		foreach ($cars as $car) {
			echo '<tr>';

			// displaying car's name
				echo '<td>' . $car['car_name'] . '</td>';

				// displaying the car's price...
				echo '<td>£' . $car['prev_price'] . '</td>';

				// link for editing the car's details...
				echo '<td><a style="float: right" href="editcar.php?id=' . $car['id'] . '">Edit</a></td>';

				// link for deleting the specific car...
				echo '<td>
						<form method="post">
								<input type="hidden" name="id" value="' . $car['id'] . '" />
								<input type="submit" name="submit" value="Delete" />
						</form>
					</td>';
			echo '</tr>';
		}
		echo '</thead>';
	echo '</table>';
}
?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>