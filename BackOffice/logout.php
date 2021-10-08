<?php
// Initialize the session
session_start();

if (!isset($_SESSION["admin"])) {
   header("location: index.php");
    exit;
}
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>