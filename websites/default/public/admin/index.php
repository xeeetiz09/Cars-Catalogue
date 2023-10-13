<?php

// starting the session...
session_start();

// including connection to connect to server and database...
include('../connection.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// when submit button is pressed...
if (isset($_POST['submit'])) {

	// username entered by admin in the login page...
	$username = $_POST['username'];

	// password entered by admin in the login page...
	$password = $_POST['password'];

	// selecting all data from admin's table...
	$admins = $allQueries->selectAll($pdo, 'admins');

	// extracting all selected data...
	foreach($admins as $admin){

		// if username and password matches the database, admin logs into the website and their id and username is passed using session...
		if ($admin['username'] == $username && $admin['password'] == sha1($password)) {
			$_SESSION['id'] = $admin['id'];
			$_SESSION['username'] = $username;
			$_SESSION['adminlogin'] = true;
		}
	}
}

// After pressing submit button...
if (isset($_POST['post'])){
	$staff_name = $_SESSION['username'];
	$context = trim($_POST['context']);

    // for uploading image in database....
    $image = $_FILES['uploadfile']['name'];

    //image template name...
    $tempname = $_FILES['uploadfile']['tmp_name'];

    // for saving image in specified directory
    $folder = "../images/stories/" . $image;

    // moving uploaded image to specific folder...
    move_uploaded_file($tempname, $folder);

	// criteria for inserting stories...
	$criteria = [
		'staff_name' => $staff_name,
		'context' => $context,
		'image' => $image
	];

	// function for inserting stories in the database...
	$allQueries->insert($pdo, 'stories', $criteria);
	echo '<script>alert("Story posted successfully!")</script>';
}

// if admin logs into the website, the title is set...
if (isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == true) {
	$title = 'Admin Home';
}

// if the admin is not logged into the website, the title is set...
else{
	$title = 'Admin Login';
}

// requiring heading file which is consistent across all pages of website...
require 'heading.php';

// if admin logs into the website, the following content is displayed in the index page...
if (isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == true) {
?>
		<h2 style = "text-transform: capitalize; text-align: center;">
		<?php
			echo "Welcome, ". $_SESSION['username'];
		?>
		</h2>

		<!-- form for uploading stories along with image (optional)... -->
		<form method = "POST" enctype="multipart/form-data">
			<div style = "display: flex; flex-direction: row;">
			<!-- textarea field for writing story content... -->
				<textarea style = "height: 80px; width: 450px; margin-left: 40px;" placeholder = "Announce Something" required name = "context"></textarea><label for = "story_img"><img src = "../images/picupload.jpg" style = "height: 80px; margin-left: 20px; cursor: pointer;"></label>

				<!-- label tag used for uploading image... -->
				<input hidden type = "file" name = "uploadfile" accept = "image/*" id = "story_img">
			</div>
			<!-- submit button for inserting the story into database...-->
			<input style = "width: 20%;" type = "submit" name = "post" value = "POST">
		</form>
		<?php

		// page that shows the story being called...
		include('../showStories.php');
		?>
	<?php
	}

	// if the admin is not logged in...
	else {
	?>
	<h2>Log in</h2>
	<form method = "POST">
		<label>Username</label><input type = "text" name = "username"/>
		<label>Password</label><input type = "password" name = "password"/>
		<input type = "submit" name = "submit" value = "Log In">
	</form>
	<?php
	}
	?>
	</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>
