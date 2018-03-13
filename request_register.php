
<?php

	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	ini_set("error_log","/tmp/error.log");
	error_reporting(E_ALL);	

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
	require_once('testRabbitMQClient.php');

	$request = array();

	$request['type'] = "register";
	$request['username'] = $_POST["username"];
	$request['firstname'] = $_POST["firstname"];
	$request['lastname'] = $_POST["lastname"];
	$request['email'] = $_POST["email"];
	$request['password'] = $_POST["password"];

	$returnResponse = register($request);


	if ($returnResponse == "True")
	{
		header("Location: login.html");
	}

	else
	{
		echo "Registration failed ! Please try again!";
		header("Location: register.html");
		 
	}


?>


