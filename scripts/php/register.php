<?php

// Validation functions for user input
require_once("../../inc/validate.php");

// We'll create an Error object
require_once("../../inc/error.php");
$error = new Error();

// All fields must have a value
// isset function allows for us to test multiple variables
// at once.
if(isset($_POST['username'],      
	$_POST['password'],
	$_POST['password_again'],
	$_POST['email']))
{
	// Save to local variables.
	// Actually skipping escaping characters as we'll have
	// input validation for allowed characters anyway.
	$user  = $_POST['username'];
	$pass  = $_POST['password'];
	$pass2 = $_POST['password_again'];
	$email = $_POST['email'];
}
else
{
	// Not all fields were set.
	header("location: ../../?error=not_all_fields");
	exit();
}

// Now we do some other input validation

// Check username format
if(!validateUsername($user))
	echo "stämde inte";

// We need MySQL support now
require_once("../../inc/mysql_config.php");




/*
session_start();
if(isset($_POST['username']) && strlen($_POST['username']) > 4 && isset($_POST['password']) && strlen($_POST['password']) > 0 
	&& isset($_POST['email']) && strlen($_POST['email']) > 0 && isset($_POST['password_again']) && strlen($_POST['password_again']) > 0)
{
	include "../../inc/mysql_config.php";
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$password_again = mysql_real_escape_string($_POST['password_again']);
	$email = mysql_real_escape_string($_POST['email']);
	$result = mysql_query("SELECT COUNT(username) FROM users WHERE username = '". $username . "' LIMIT 0, 1");


	if (mysql_result($result, 0) == 1)
	{
		echo "Det finns redan en användare med det användarnamnet";
	}
	else
	{
		if ($password == $password_again)
		{
			mysql_query("INSERT INTO users (username, password, email) VALUES ('".$username."', '".md5($password)."', '".$email."')");
			header('Location: ../../index.php');
		}
		else
		{
			echo "Du skrev inte samma lösenord två gånger";
		}
	}
}else {
	echo 'Alla fält är inte ifyllda';
}
*/
?>
