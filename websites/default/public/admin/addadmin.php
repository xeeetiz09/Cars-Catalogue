<?php

// initializing the exist variable to false (to check if admin account with provided username exists or not)
$exist = false;

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// checks if admin's id is provided...
if (isset($_GET['id'])){

	// if the admin's id is provided, then title is changed to Update Admin...
	$title = 'Update Admin';
}
else{

	// if the admin's id is not provided, then title is changed to Add Admin...
	$title = 'Add Admin';
}

// requiring heading page which is consistent across all pages of website for users...
require 'heading.php';

// when submit button is pressed...
if (isset($_POST['submit'])) {

	// function called to select all data from admins table...
	$admins = $allQueries->selectAll($pdo, 'admins');

	// username entered by admin in the text field...
	$username = strtolower(trim($_POST['username']));

	// extracting all data from admins table...
	foreach($admins as $admin){

		// checking if the entered username matches the database...
		if (strtolower($admin['username']) == $username){

			// if matches, the admin already exists and cannot add the existing admin (i.e., the new admin's username must be unique)...
			$exist = true;
		}
	}

	// checks if admin's id is provided...
	if (isset($_GET['id'])){

		// function called to select specific data using provided admin's id from admins table...
		$one_admin = $allQueries->find($pdo, 'admins', 'id', $_GET['id']);

		// checking if the entered username matches the database...
		if ($exist == true && $one_admin['username'] != $username){

			// if admin account already exists, prompts the message and redirects to admins page...
			echo '<script>alert("Unable to update!\nAdmin account already exists!")
				window.location.href = "admins.php";
			</script>';
		}
		else{

			// setting criteria for updating admin's account...
			$criteria = [
				'id' => $_GET['id'],
				'username' => trim($_POST['username']),
				'email' => strtolower(trim($_POST['email'])),
				'password' => sha1(trim($_POST['password']))
			];

			// function to update admin's account...
			$allQueries->update($pdo, 'admins', $criteria, 'id');

			// prompts the message and redirects user to admins.php page...
			echo '<script>alert("Admin account updated successfully!")
				window.location.href = "admins.php";
			</script>';
		}
	}
	else{

		// checking if the entered username matches the database...
		if ($exist == true){
			
			// if admin account already exists, prompts the message and redirects to admins page...
			echo '<script>alert("Admin account already exists!")
				window.location.href = "admins.php";
			</script>';
		}
		else{

			// setting criteria for adding new admin's account...
			$criteria = [
				'username' => $username,
				'email' => strtolower(trim($_POST['email'])),
				'password' => sha1(trim($_POST['password']))
			];

			// function to add new admin's account...
			$allQueries->insert($pdo, 'admins', $criteria);

			// prompts the message and redirects user to admins page...
			echo '<script>alert("Admin account added successfully!")
				window.location.href = "admins.php";
			</script>';
		}
	}
}


else{

	// if the admin's id is provided, then heading of the form is changed to Update Admin...
	if (isset($_GET['id'])){
		$admin = $allQueries->find($pdo, 'admins', 'id', $_GET['id']);
		$heading = 'Update Admin';
	}
	else{

		// if the admin's id is not provided, then heading of the form is changed to Add Admin...
		$heading = 'Add Admin';
	}

	// only claire can add, edit or delete the admin's account...
	if ($_SESSION['username'] === 'Claire') {
		?>
		<h2><?php echo $heading ?></h2>
		<form method="POST">
			<label>Username</label><input type="text" name="username" <?php if (isset($_GET['id'])){echo 'value = "'.$admin['username'].'"'; } ?> required/>
			<label>Email</label><input type="email" name="email" <?php if (isset($_GET['id'])){echo 'value = "'.$admin['email'].'"'; } ?> required/>
			<label>Set Password</label><input type="password" name="password" required/>
			<input type="submit" name="submit" value="<?php if(isset($_GET['id'])){ echo "Update";}else{echo "Add"; } ?>" />
		</form>
	<?php
	}

	// if it's not claire, then another admin cannot access to the admins page...
	else{
		echo "You don't have permission to access this resource!";
	}
}
?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>
