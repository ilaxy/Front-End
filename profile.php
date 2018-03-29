<?php


    session_start();
   
    if (!$_SESSION["logged"]){
        header("Location: login.html");
    }
    
    
    require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');
    require_once('RabbitMQClient.php');
	
    $client = new rabbitMQClient("RabbitMQ.ini","dbServer");
	
    $request = array();
    $request['type'] = "UserProfile";
    $request['username'] = $_SESSION["username"];
    $request['firstname'] = $_SESSION["firstname"];
    $request['lastname'] = $_SESSION["lastname"];
    $request['email'] = $_SESSION["email"];
    $request['wishlist'] = $_SESSION["wishlist"];
    
    $response = $client->send_request($request);  

    return $response;
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
		
	
    <h2>My Wishlist</h2>
    <?php for($i = 0; $i < count($data["wishlist"]); $i++){ ?>
    <b>Book Name: <?php echo $data["reviews"][$i]["book_title"]; ?></b>
    //retrive from database if wishlist has been added for user
    <br>
    <?php } ?>
       
  </body> 
</html>

   
