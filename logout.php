<?php
// logout.php

// Perform any necessary cleanup or session closing tasks here

// Destroy the current session
session_start();
session_destroy();

// Redirect back to the index page
header("Location: index.php");
exit();
?>
