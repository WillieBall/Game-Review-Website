<?php
//Create autoloader
function my_autoloader($class) {
	include 'class.' . $class . '.php';
}
//Autoloader class register
spl_autoload_register('my_autoloader');

// Start the session
session_start();

// Connecting to the MySQL database
$user = 'ballw3';
$password = 'd2b0a3ae';
$database = new PDO('mysql:host=localhost;dbname=db_fall19_ballw3', $user, $password);



$current_url = basename($_SERVER['REQUEST_URI']);


//Default admin is 0 for false
$admin = 0;

// if userID is not set in the session and current URL not login.php redirect to login page
if(!isset($_SESSION['userID']) && $current_url != 'signin.php') {
	header("LOCATION: signin.php");
	die();
}
// Else if session key userID is set get $user from the database
else if (isset($_SESSION['userID'])) {
	$userID = $_SESSION['userID'];
}