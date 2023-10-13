<?php

// including loggedIn to check if admin is logged in...
include('loggedIn.php');

// requiring autoloadClass to load the required classes automatically (autoloading class)
require '../autoloadClass.php';

// calling AllQueries class with autoload function...
$allQueries = new AllQueries;

// when submit button is pressed...
if (isset($_POST['submit'])){

	// when delete button is pressed, the title is changed to Delete Admin...
	$title = 'Delete Admin';

	// requiring heading file which is consistent across all pages of website...
	require 'heading.php';

	// getting id of the specific admin (to delete)...
	$id = $_POST['id'];

	// function to delete the specific admin...
	$allQueries->delete($pdo, 'admins', 'id', $id);

	// prompts the message...
	echo '<h2 style = "text-align: center;">Admin deleted</h2>';
}
else{

	// by default, the title is Admins...
	$title = 'Admins';

	// requiring heading file which is consistent across all pages of website...
	require 'heading.php';

	// only Claire can add, edit or delete other admin's account...
	if ($_SESSION['username'] === 'Claire') {
?>

	<h2>Admins</h2>

	<!-- link to redirect to add admin page... -->
	<a class="new" href="addadmin.php">Add new admin</a>
	<?php
	echo '<table>';
		echo '<thead>';
		echo '<tr>';
			echo '<th>Username</th>';
			echo '<th style="width: 50%">E-mail</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
			echo '<th style="width: 5%">&nbsp;</th>';
		echo '</tr>';

		// function to select one specific admin...
		$one_admin = $allQueries->find($pdo, 'admins', 'id', $_SESSION['id']);

		// function to select all admins...
		$admins = $allQueries->selectAll($pdo, 'admins');

		// extracting the selected admin's data...
		foreach ($admins as $admin) {
			echo '<tr style = "text-align: center;">';

			// shows all admin's username...
				echo '<td>' . $admin['username'] . '</td>';

				// shows all admin's email
				echo '<td>' . $admin['email'] . '</td>';

				// claire cannot edit or delete his account...
				if ($admin['username'] == $one_admin['username']){
				echo '<td colspan = "2">YOU</td>';
				}
				else{

					// claire can edit or delete other admin's account...
					echo '<td><a style="float: right" href="addadmin.php?id=' . $admin['id'] . '">Edit</a></td>';
					echo '<td>
						<form method="post">
								<input type="hidden" name="id" value="' . $admin['id'] . '" />
								<input type="submit" name="submit" value="Delete" />
						</form>
					</td>';
				}
			echo '</tr>';
		}
		echo '</thead>';
	echo '</table>';
	}
	else{

		// if it's not claire, none of the admins can access the admins page...
		echo "You don't have permission to access this resource!";
	}
}
?>
</section>
</main>

<!-- including footer page which is consistent across all pages of website for users -->
<?php include('../footer.php'); ?>