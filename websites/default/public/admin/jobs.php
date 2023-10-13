<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// title is set to 'Jobs'...
$title = 'Jobs';

// requiring heading file which is consistent across all pages of website...
require 'heading.php';
?>
<h2>Jobs</h2>

<!-- link to redirect to add job page -->
<a class="new" href="addjob.php">Add new job</a>
<?php

// requiring show jobs page to show the jobs available in claire's cars company...
require ('../showJobs.php');
?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>