<?php

	
	error_reporting(E_ALL);	
	ini_set('display_errors',1);
	ini_set('log_errors',1);

	session_start();

    	require_once('path.inc');
    	require_once('get_host_info.inc');
   	require_once('rabbitMQLib.inc');
    	require_once('RabbitMQClient.php');

    	$request = array();
    	$request['type'] = "UserProfile";
    	$request['username'] = $_SESSION["username"];
    	$request['firstname'] = $_SESSION["firstname"];
    	$request['lastname'] = $_SESSION["lastname"];
    	$request['email'] = $_SESSION["email"];
    	$request['wishlist'] = $_SESSION["wishlist"];
    
   	$response = dbClient($request);   

    
?>

<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  	<title>My Profile</title>     
  	<link href='https://fonts.googleapis.com/css?family=Barlow Condensed' rel='stylesheet'>
	<style>
		html, body {  
 
		width: 100%;   
		height: 100%;   
		font-family: 'Barlow Condensed';
		font-size: 22px;   
		color: #000;      
		background: #FFF8DC;
		height: 100%;
		position: auto;
		width: 100%;

		}
		p {
		    margin-top: -15px;
		    margin-left: 35px;
		    color: orange;
		}


		* {
		    box-sizing: border-box;
		}


		/* Set a style for all buttons */
		button[type=button]{
		    float: right;
		    background-color: orange;
		    color: white;
		    padding: 14px 20px;
		    margin: 0 8px;
		    margin-top: 20px;
		    margin-right: 20px;
		    border: none;
		    box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
		    cursor: pointer;
		    width: 15%;
		    font-family: 'Barlow Condensed';
		    font-size: 18px; 
		    font-weight: bold; 
		    opacity: 0.9;
		}

		button:hover {
		    opacity:1;
		    background: #0b7dda;
		}


	</style>
  </head>
   
  <body>
   <button type="button" style= "align=right" onclick="location.href='logout.php'">Log Out</button> 
   <h1> Personal User Library </h1>
   <h2>My Profile</h2>
    	<p><?php echo "Username  :". $_SESSION["username"]; ?></p>
	<p><?php echo "First Name  :". $_SESSION["firstname"]; ?></p>
	<p><?php echo "Last Name  :". $_SESSION["lastname"]; ?></p>
       	<p> <?php echo "Email address  :". $_SESSION["email"]; ?></p>

    <!--retrive wishlist from database if wishlist has been added for user -->			
    <h2>My Wishlist</h2>
	    <?php for($i = 0; $i < count($response["wishlist"]); $i++){ ?>
	    <b>Book Name: <?php echo $response["wishlist"][$i]["bookname"]; ?></b><br>
	    <?php } ?>
       
  </body> 
</html>

   
