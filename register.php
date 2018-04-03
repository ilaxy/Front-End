
<?php

	error_reporting(E_ALL);	
	ini_set('display_errors',1);
	ini_set('display_startup_errors',0);
	ini_set('log_errors',1);


	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
	require_once('RabbitMQClient.php');

	$request = array();

	$request['type'] = "register";
	$request['username'] = $_POST["username"];
	$request['firstname'] = $_POST["firstname"];
	$request['lastname'] = $_POST["lastname"];
	$request['email'] = $_POST["email"];
	$request['password'] = $_POST["password"];

	$returnResponse = dbClient($request);

	if ($returnResponse == "True")
	{
		header("Location: login.html");
	}

	else 
	{

		header('Refresh:5; url=register.html');
		echo "Registration failed ! Please try again!";
		/*
		echo "<script>";
		echo " alert('Registration failed ! Please try again!');
			window.location.href='".site_url('register.html')." ';
		</script>";	*/
	 
	}


?>


