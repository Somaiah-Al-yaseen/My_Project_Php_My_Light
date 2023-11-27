<?php
session_start();
$_SESSION['isAdmin']= False;
// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the landing page or any other page after logout
header('Location: ../login.php');
exit();
?>