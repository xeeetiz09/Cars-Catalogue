<?php

// requiring autoloadClass to load the required classes automatically (autoloading class)
require 'autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// title is set...
$title = 'Home';

// requiring heading file which is consistent across all pages of website...
require 'heading.php';
?>
<main class="home">
	<h2 style = "text-align: center;">Welcome to Claire's Cars</h2>
	<?php

	// including show stories...
	include('showStories.php');
	?>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php require('footer.php'); ?>
