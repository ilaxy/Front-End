<?php

	error_reporting(E_ALL);	
	ini_set('display_errors',0);
	ini_set('display_startup_errors',0);
	ini_set('log_errors',1);
	ini_set('error_log', dirname(__FILE__). 'log.txt');
	
	errorLog();	

	session_start();

	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
	require_once('RabbitMQClient.php');


	include ("functions.php");

	$type = $_GET["type"];

	switch ($type){

	case "Username":
		$username = $_GET["username"];	
		
		$response = VerifyUsername($username);
		echo $response;
		break;

	case "UserProfile":

		$username = $_GET["username"];
		$firstname = $_GET["firstname"];
		$lastname = $_GET["lastname"];
		$email = $_GET["email"];	
		
		$response = UserProfile($username, $firstname, $lastname, $email);
		echo $response;
		break;

	case "WritingReview":

		$username = $_GET["username"];
		$bookname = $_GET["bookname"];		
		$text = $_GET["text"];
		
		$response = WriteReview($username,$bookname,$text);
		echo $response;
		break;


	case "NewWish":

		$username = $_GET["username"];
		$bookname = $_GET["bookname"];	
		
		$response = addWishlist($username,$bookname);
		echo $response;
		break;

	case "Owned":

		$username = $_GET["username"];
		$bookname = $_GET["bookname"];	
		
		$response = Owned($username,$bookname);
		echo $response;
		break;

	case "Read":

		$username = $_GET["username"];
		$bookname = $_GET["bookname"];	
		
		$response = HaveRead($username,$bookname);
		echo $response;
		break;

}
?>
