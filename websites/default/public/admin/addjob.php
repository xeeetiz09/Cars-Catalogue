<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// setting title...
$title = 'Job Announcement';

// requiring heading page which is consistent across all pages of website for users...
require 'heading.php';

// when submit button is pressed...
if (isset($_POST['submit'])) {

	// setting criteria for adding job...
    $criteria = [
		'job_title' => $_POST['job_title'],
		'vacancy' => $_POST['vacancy'],
		'job_description' => $_POST['description']
	];

	// function to add job...
	$allQueries->insert($pdo, 'jobs', $criteria);

	// prompts message and redirects to jobs page...
	echo '<script>alert("Job offer announced successfully")
		window.location.href = "jobs.php";
	</script>';
}
else{
    ?>
	<!-- when page is visited, the form to add job is displayed... -->
    <h2>Announce Job</h2>
	<form method="POST">
		<!-- field for writing job title -->
		<label>Job Title</label><input type="text" name="job_title" required/>
		<!-- field for writing job vacancy available -->
		<label>Vacancy Available</label><input type="number" style = "width: 50%;" name="vacancy" required/>
		<!-- field for writing job description -->
		<label>Description</label><textarea name="description" style = "width: 50%;" required></textarea>
		<!-- submit button for submitting the form -->
		<input type="submit" name="submit" value="POST" />
	</form>
<?php
}
?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>
