<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// setting title...
$title = 'Add Car';

// requiring heading page which is consistent across all pages of website for users...
require 'heading.php';

// when submit button is pressed...
if (isset($_POST['submit'])) {

	// setting criteria for adding car...
	$criteria = [
		'car_name' => $_POST['car_name'],
		'engine' => $_POST['en_type'],
		'mileage' => $_POST['mileage'],
		'prev_price' => $_POST['price'],
		'postedBy' => $_SESSION['username'],
		'manufacturerId' => $_POST['manufacturerId'],
		'description' => $_POST['description'],
		'archived' => 'N'
	];

	// function to add car...
	$allQueries->insert($pdo, 'cars', $criteria);

	// after car's information is written to respective fields, then another form is shown which asks for car image...
	echo '<h2>Add Car Image</h2>';

	// field for uploading car's image (multiple)...
	echo '<form method = "POST" enctype="multipart/form-data">
			<label>Images</label><input type="file" name="image[]" accept="image/png, image/jpg, image/gif, image/jpeg" id="images" multiple/>
			<span style = "float: left; margin-top: 5px; margin-left: 220px;">Please choose at least 4 photos of different angles of car.</span>
			<input type = "submit" name = "addImg" value = "Add Car">
		  </form>';
}

// when Add Car button is pressed...
else if (isset($_POST['addImg'])){

	// function to select all data from cars table...
	$stmt = $allQueries->selectAll($pdo, 'cars');

	// extracting all selected data...
	foreach($stmt as $row){

		// car's id...
		$carId = $row['id'];
	}

	// for uploading multiple images...
	foreach ($_FILES['image']['tmp_name'] as $key => $image) {

		// name of image...
		$fileName = $_FILES['image']['name'][$key];

		// criteria for uploading image...
		$crt = [
			'car_id' => $carId,
			'img_name' => $fileName,
			'updated' => 'N'
		];

		// inserting car's image in car_image table...
		$allQueries->insert($pdo, 'car_image', $crt);

		// moving uploaded car's image to specific directory...
		$result = move_uploaded_file($_FILES['image']['tmp_name'][$key], '../images/cars/' . $fileName);
	}

	// prompting message...
	echo '<h2 style = "text-align: center;">Car Added</h2>';
	
	// link to redirect to cars page...
	echo '<a href="cars.php">GO BACK</a>';
}

else{

	// default head of the form is set to Add Car...
	$head = 'Add Car';

	// requiring car's form to add or edit car...
	include('carForm.php');
}
?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>