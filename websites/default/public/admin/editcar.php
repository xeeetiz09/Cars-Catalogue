<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// title is set to 'Edit Car'...
$title = 'Edit Car';

// requiring heading file which is consistent across all pages of website...
require 'heading.php';

// when submit button is pressed...
if (isset($_POST['submit'])) {

	// setting criteria for updating car...
	$crts = [
		'id' => $_GET['id'],
		'car_name' => $_POST['car_name'],
		'engine' => $_POST['en_type'],
		'mileage' => $_POST['mileage'],
		'prev_price' => $_POST['price'],
		'manufacturerId' => $_POST['manufacturerId'],
		'description' => $_POST['description'],
		'archived' => 'N'
	];

	// function to update car...
	$allQueries->update($pdo, 'cars', $crts, 'id');

	// prompts message...
	echo '<h2 style = "text-align: center;">Product saved</h2>';

	// after car's information is updated to respective fields, then another form is shown which asks for car image...
	// echo '<h2>Update Car Image</h2>';

	// // field for uploading/updating car's image (multiple)...
	// echo '<form method = "POST" enctype="multipart/form-data">
	// 		<label>Images</label><input type="file" name="image[]" accept="image/png, image/jpg, image/gif, image/jpeg" id="images" multiple/>
	// 		<span style = "float: left; margin-top: 5px; margin-left: 220px;">Please choose at least 4 photos of different angles of car.</span>
	// 		<input type = "submit" name = "addImg" value = "Save">
	// 	  </form>';
}


// when Add Car button is pressed...
// else if (isset($_POST['addImg'])){

// 	// function to select all data from cars table...
// 	$stmt = $allQueries->selectAll($pdo, 'cars');

// 	// extracting all selected data...
// 	foreach($stmt as $row){

// 		// car's id...
// 		$carId = $row['id'];
// 	}

// 	// for uploading/updating multiple images...
// 	foreach ($_FILES['image']['tmp_name'] as $key => $image) {

// 		// name of image...
// 		$fileName = $_FILES['image']['name'][$key];

// 		// criteria for uploading image...
// 		$crt1 = [
// 			'car_id' => $carId,
// 			'img_name' => $fileName
// 		];

// 		// inserting car's image in updated_carImage table...
// 		$allQueries->insert($pdo, 'updated_carimage', $crt1);

// 		// moving uploaded car's image to specific directory...
// 		$result = move_uploaded_file($_FILES['image']['tmp_name'][$key], '../images/cars/' . $fileName);

// 		// if the image is uploaded to specific directory, then image gets inserted to database...
// 		if ($result){

// 			// criteria for updating car's image...
// 			$crt2 = [
// 				'car_id' => $carId,
// 				'updated' => 'Y'
// 			];

// 			// function to update the car_image...
// 			$allQueries->update($pdo, 'car_image', $crt2, 'car_id');
// 		}
// 	}

// 	// prompts message...
// 	echo '<h2 style = "text-align: center;">Product saved</h2>';

// 	// link to redirect to cars page...
// 	echo '<a style = "" href="cars.php">GO BACK</a>';
// }

else {
	// selecting specific data of car with provided car id...
	$car = $allQueries->find($pdo, 'cars', 'id', $_GET['id']);

	// default head of the form is set to Add Car...
	$head = 'Edit Car';

	//requiring car's form to add or edit car...
	include('carForm.php');
}
?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>