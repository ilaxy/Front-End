<?php

	error_reporting(E_ALL);	
	ini_set('display_errors',1);
	ini_set('log_errors',1);
	

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
	require_once('RabbitMQClient.php');


	function VerifyUsername($username){

		$client = new rabbitMQClient("RabbitMQ.ini","dbServer");

		$request = array();
		$request['type'] = "Username";
		$request['username'] = $username;
	    
		$response = dbClient($request);   
	
		return $response;
	}

	function UserProfile{

		$client = new rabbitMQClient("RabbitMQ.ini","dbServer");

		$request = array();
	    	$request['type'] = "UserProfile";
	    	$request['username'] = $_SESSION["username"];
	    	$request['firstname'] = $_SESSION["firstname"];
	    	$request['lastname'] = $_SESSION["lastname"];
	    	$request['email'] = $_SESSION["email"];
	    	$request['wishlist'] = $_SESSION["wishlist"];
	    
	   	$response = dbClient($request);   

	    	return $response;   
	}


	function BookSearch($bookname){

	    $client = new rabbitMQClient("RabbitMQ.ini","dbServer");
	   
	    $request = array();
	    $request['type'] = "search";
	    $request['bookname'] = $bookname;


	    $response = dbClient($request);
	    
	    return $response;
	}


	function WriteReview{
	
		$client = new rabbitMQClient("RabbitMQ.ini","dbServer");

		$request = array();
	    	$request['type'] = "WritingReview";
	    	$request['username'] = $_SESSION["username"];
		$request['bookname'] = $bookname;
	    	$request['text'] = $text;
	    
	   	$response = dbClient($request);   

	    	return $response;   

	}

	function addWishlist{
	
		$client = new rabbitMQClient("RabbitMQ.ini","dbServer");

		$request = array();
	    	$request['type'] = "NewWish";
	    	$request['username'] = $_SESSION["username"];
	    	$request['book_title'] = $bookname;
	    
	   	$response = dbClient($request);   

	    	return $response;   

	}

	function Owned{
	
		$client = new rabbitMQClient("RabbitMQ.ini","dbServer");

		$request = array();
	    	$request['type'] = "Owned";
	    	$request['username'] = $_SESSION["username"];
	    	$request['book_title'] = $bookname;
	    
	   	$response = dbClient($request);   

	    	return $response;   

	}

	function HaveRead{
	
		$client = new rabbitMQClient("RabbitMQ.ini","dbServer");

		$request = array();
	    	$request['type'] = "Read";
	    	$request['username'] = $_SESSION["username"];
	    	$request['book_title'] = $bookname;
	    
	   	$response = dbClient($request);   

	    	return $response;   

	}

	
?>
