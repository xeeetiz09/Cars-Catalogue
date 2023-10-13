<?php

// requiring autoloadClass to load the required classes automatically (autoloading class)
require 'autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// title is set...
$title = "Claire's Careers";

// requiring heading file which is consistent across all pages of website...
require 'heading.php';

?>
<main class="home">
	<?php
	$row = $allQueries->countRows($pdo, 'jobs');
	// counting the rows of jobs table...
	if ($row > 0){
		echo "<h2>Jobs Available</h2>";
		require 'showJobs.php';
	}

	// if there are no rows, the following message is shown...
	else{
		echo "<h3>Claire's Cars currently has no job opportunities available, but keep checking as new positions become available regularly!</h3>";
	}
	?>
	
	<!-- about the company... -->
	<details>
		<summary style = "margin-top: 80px; font-size: 25px; cursor: pointer;">About Us</summary>
		<p style = "margin-top: 10px;">Welcome to Claire's Cars, Northampton's specialist in classic and import cars. Claire's Cars, the first online automotive marketplace in the UK. Buy and sell automobiles in Nepal and the UK swiftly and easily.
			It's simple to find both new and used automobiles for sale.</p><p>The greatest options may be found on Claire's Cars if you need to buy a car but have a limited budget.
			We provide a wide selection of cars, from little city cars to 4x4 SUVs, to suit any budget. </p><p>Never before has it been so simple to find the ideal car.
		</p>
	</details>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php require('footer.php'); ?>
