<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// when submit button is pressed...
if (isset($_POST['submit'])){

	// title is set...
	$title = 'Delete Manufacturers';

	// requiring heading file which is consistent across all pages of website...
	require 'heading.php';

	// getting manufacturer's id to proceed deleting...
	$id = $_POST['id'];

	// function to delete specific manufacturer with provided id...
	$allQueries->delete($pdo, 'manufacturers', 'id', $id);

	// function to delete car with specific manufacturer's id...
	$allQueries->delete($pdo, 'cars', 'manufacturerId', $id);

	// prompts message...
	echo '<h2 style = "text-align: center;">Manufacturer deleted</h2>';

	// link to redirect to manufacturers page...
	echo '<a style = "" href="manufacturers.php">GO BACK</a>';
}
else{

	// by default, the title is set...
	$title = 'Manufacturers';

	// requiring heading file which is consistent across all pages of website...
	require 'heading.php';
?>
	<h2>Manufacturers</h2>

	<!-- link to redirect to add manufacturer page... -->
	<a class="new" href="addmanufacturer.php">Add new manufacturer</a>
	<?php
	echo '<table>';
		echo '<thead>';
			echo '<tr>';
				echo '<th>Name</th>';
				echo '<th style="width: 5%">&nbsp;</th>';
				echo '<th style="width: 5%">&nbsp;</th>';
			echo '</tr>';

			// selecting all data from manufacturers table...
			$categories = $allQueries->selectAll($pdo, 'manufacturers');

			// extracting the selected data...
			foreach ($categories as $category) {
				echo '<tr>';
				// displays manufacturer's name...
					echo '<td>' . $category['name'] . '</td>';

					// link for editing manufacturer's name...
					echo '<td><a style="float: right" href="addmanufacturer.php?id=' . $category['id'] . '">Edit</a></td>';

					// link for deleting manufacturer...
					echo '<td>
							<form method="post">
								<input type="hidden" name="id" value="' . $category['id'] . '" />
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