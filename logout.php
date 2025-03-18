<?php
session_start();  // Start session

// Destroy all session variables
session_unset();
session_destroy();

// Redirect to homepage after logout
header("Location: index.php");
exit();
?>
