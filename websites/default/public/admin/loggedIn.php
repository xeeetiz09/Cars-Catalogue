<?php

// starting the session...
session_start();

// including the connection page...
include('../connection.php');

// if the admin's session  is not set or is false, then they gets redirected to index (login) page...
if (!isset($_SESSION['username'])) {
	header('Location: index.php');
}
?>