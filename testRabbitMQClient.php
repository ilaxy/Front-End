#!/usr/bin/php
<?php

	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	ini_set("error_log","/tmp/error.log");
	error_reporting(E_ALL);	

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');


	function doLogin($username, $password){
		$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	
		if (isset($argv[1]))
		{
		  $msg = $argv[1];
		}
		else
		{
		  $msg = "client message";
		}

		$request = array();

		$request['type'] = "login";
		$request['username'] = $username;
		$request['password'] = $password;
		$request['message'] = $msg;
	
		$response = $client->send_request($request);

		return $response;

		echo "\n\n";

		echo $argv[0]." END".PHP_EOL;
	
	}
	
	function doRegister($request){
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	
		if (isset($argv[1]))
		{
		  $msg = $argv[1];
		}
		else
		{
		  $msg = "client message";
		}

		$request = array();

		$request['type'] = "register";
		$request['username'] = $username;
		$request['firstname'] = $firstname;
		$request['lastname'] = $lastname;
		$request['email'] = $email;
		$request['password'] = $password;

		$response = $client->send_request($request);

		return $response;

		echo "\n\n";

		echo $argv[0]." END".PHP_EOL;
	
	}

?>

?>

