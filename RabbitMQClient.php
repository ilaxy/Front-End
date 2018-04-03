<?php

	
	error_reporting(E_ALL);	
	ini_set('display_errors',1);
	ini_set('log_errors',1);

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
	
	function dbClient($request){

		$client = new rabbitMQClient("RabbitMQ.ini","dbServer");

		if (isset($argv[1]))
		{
		  $msg = $argv[1];
		}
		else
		{
		  $msg = "client message";
		}
	
		$response = $client->send_request($request);

		echo "client received response: ".PHP_EOL;
		return ($response);
		echo "\n\n";

		echo $argv[0]." END".PHP_EOL;
	}

	function RMQClient($request){

		$client = new rabbitMQClient("RabbitMQ.ini","RMQServer");

		if (isset($argv[1]))
		{
		  $msg = $argv[1];
		}
		else
		{
		  $msg = "client message";
		}
	
		$response = $client->send_request($request);

	
		echo "client received response: ".PHP_EOL;
		return ($response);
		echo "\n\n";

		echo $argv[0]." END".PHP_EOL;
	}
	
?>

