<?php
session_start();

// destroying the session...
session_destroy();

// prompting the message and redirecting to index (login) page...
echo '<script> alert("You have been logged out!");
window.location.href = "index.php";
</script>';
exit();
?>