<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// title is set to 'Messages'...
$title = 'Messages';

// requiring heading file which is consistent across all pages of website...
require 'heading.php';

// if enquiry's id is fetched...
if (isset($_GET['id'])){

	// providing value of enquiry id...
	$enq_id = $_GET['id'];

	// username of the currently logged in admin...
	$staffName = $_SESSION['username'];

	// setting up criteria to update enquiry table's data...
	$criteria = [
		'enquiry_id' => $enq_id,
		'staff' => $staffName
	];

	// function to update the customer_enquiry's table's data (setting staff's name)...
	$allQueries->update($pdo, 'customers_enquiry', $criteria, 'enquiry_id');

	// alerts the success message and redirects to contact page...
	echo '<script>alert("Enquiry completed successfully!")
		  window.location.href = "contact.php";
	</script>';
}
?>
	<h2>All Enquiries</h2>
	<div id = "enquiry_field">
	<?php

	// selecting all data from customers_enquiry's table...
	$enqry = $allQueries->selectAll($pdo, 'customers_enquiry');

	// extracting the selected data...
	foreach ($enqry as $enqrys){
	?>
	<!-- shows all the enquiry details... -->
		<div id = "all_enquiry">
			
		<!-- shows enquiry date... -->
			<div id = "date"><?php echo $enqrys['enquiry_date']; ?></div>

			<!-- shows the name of user who wrote the enquiry... -->
			<div id = "username"><?php echo $enqrys['name']; ?>&nbsp;<label>(<?php echo $enqrys['email']; ?> - <?php echo $enqrys['telephone']; ?>) </label></div>

			<!-- shows the enquiry... -->
			<div id = "enquiry"><?php echo $enqrys['enquiry']; ?></div>
			<?php

			// if the staffs have not dealt with the enquiry, the complete button is shown...
			if (!$enqrys['staff']){
			?>
				<div id = "dealt"><a href = "contact.php?id=<?php echo $enqrys['enquiry_id']; ?>">Complete</a></div>
			<?php
			}

			// if the staffs have already dealt with the enquiry, then Complete by: Staff name is shown...
			else{
				echo '<p style = "float: right; margin-top: 15px; color: green; cursor: default; text-transform: capitalize;">Completed by: '.$enqrys['staff'].'</p>';
			}
			?>
		</div>
	<?php
	}
	?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>