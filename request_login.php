<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	ini_set("error_log","/tmp/error.log");
	error_reporting(E_ALL);	


	session_start();

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');  
	//require_once('testRabbitMQClient.php');

	include ('testRabbitMQClient.php');
	$username = $_POST['username'];
	$password = $_POST['password'];

	//echo $request['username'] + " " + $request['password'];

	$returnResponse = doLogin($username, $password);

	if ($returnResponse == "True")
	{

		$_SESSION["username"] = $_POST["username"];
		$_SESSION["logged"] = true;

		header("Location: readBuster.html");
	}

	else
	{
		header("Location: login.html");
		 
	}

?>



