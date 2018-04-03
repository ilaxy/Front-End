<?php

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
	require_once('RabbitMQClient.php');

	$client = new rabbitMQClient("RabbitMQ.ini","dbServer");

	$request = array();

	$request['type'] = "NewWish";
	$request['username'] = $_SESSION["username"];
	$request['book_title'] = $bookname;
	    
	$response = dbClient($request);   

	if ($returnResponse == "True")
	{
		echo "true";
	}

	else
	{
		echo "false";
		 
	}	

?>
