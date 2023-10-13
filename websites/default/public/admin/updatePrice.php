<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// fetching id from previous page...
$carId = $_GET['id'];

// when submit button is pressed...
if (isset($_POST['submit'])){

	// criteria for updating the car's price...
	$criteria = [
		'id' => $carId,
		'cur_price' => $_POST['cur_price']
	];

	// function to update the car's price...
	$allQueries->update($pdo, 'cars', $criteria, 'id');

	// prompts success message and redirects to showroom page...
	echo '<script>alert("Price has been updated!");
			window.location.href = "showroom.php";
		  </script>';
}

// title is set...
$title = 'Update Price';

// requiring heading file which is consistent across all pages of website...
require 'heading.php';
?>
<h2>Change Price</h2>
<form method = "POST">
	<!-- input field for writing the new price of the car... -->
	<label>New Price</label><input type = "text" name = "cur_price" required>

	<!-- submit button... -->
	<input type = "submit" name = "submit" value = "Submit">
</form>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>