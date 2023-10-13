<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// checks if manufacturer's id is provided...
if (isset($_GET['id'])){

	// if the manufacturer's id is provided, then title is changed to Update Manufacturer...
	$title = 'Update Manufacturer';
}
else{

	// if the manufacturer's id is not provided, then title is changed to Add Manufacturer...
	$title = 'Add Manufacturer';
}

// requiring heading page which is consistent across all pages of website for users...
require 'heading.php';

// when submit button is pressed...
if (isset($_POST['submit'])) {

	// manufacturer's name entered in the text field...
	$manu_name = trim($_POST['name']);

	// checks if manufacturer's id is provided...
	if (isset($_GET['id'])){

		// setting criteria for updating manufacturer's name...
		$criteria = [
			'id' => $_GET['id'],
			'name' => $manu_name
		];

		// function to update manufacturer's name...
		$allQueries->update($pdo, 'manufacturers', $criteria, 'id');

		// prompts the message and redirects user to manufacturers page...
		echo '<script>alert("Manufacturer updated successfully!")
			window.location.href = "manufacturers.php";
		</script>';
	}

	// if id is not set...
	else{
		// setting criteria for adding manufacturer's name...
		$criteria = [
			'name' => $manu_name
		];

		// function to insert manufacturer's name in manufacturers table...
		$allQueries->insert($pdo, 'manufacturers', $criteria);

		// prompts the message and redirects user to manufacturers page...
		echo '<script>alert("Manufacturer added successfully")
			window.location.href = "manufacturers.php";
		</script>';
	}
}

else{

	// if id is set
	if (isset($_GET['id'])){

		// selecting specific data with provided id from manufacturer's table...
		$manufacturer = $allQueries->find($pdo, 'manufacturers', 'id', $_GET['id']);

		// setting heading of the form to Update Manufacturer...
		$heading = 'Update Manufacturer';
	}

	// if id is not set...
	else{

		// setting heading of the form to Add Manufacturer...
		$heading = 'Add Manufacturer';
	}
	?>
	<h2><?php echo $heading; ?></h2>

	<!-- form for writing manufacturer's name -->
	<form method="POST">

	<!-- input field for name... -->
		<label>Name</label><input type="text" name="name" <?php if(isset($_GET['id'])){ echo 'value = "'.$manufacturer['name'].'"'; } ?>/>

		<!-- submit button to submit the form -->
		<input type="submit" name="submit" value="<?php if(isset($_GET['id'])){ echo "Update Manufacturer";}else{echo "Add Manufacturer"; } ?>" />
	</form>
	<?php
}
?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>
