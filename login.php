<?php

	error_reporting(E_ALL);	
	ini_set('display_errors',1);
	ini_set('log_errors',1);
	

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');  
	require_once('RabbitMQClient.php');


	$request = array();

	$request['type'] = "login";
	$request['username'] = $_POST['username'];
	$request['password'] = $_POST['password'];


	$returnResponse = dbClient($request);

	if ($returnResponse == "True")
	{
		session_start();
		$_SESSION["logged"] = true;
		$_SESSION["username"] = $username;
		
		header("Location: readBuster.php");
	}

	else
	{
		header("Location: login.html");
		 
	}
 
	return $returnResponse;
?>



