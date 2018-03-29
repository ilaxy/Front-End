
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
    
    $response = dbClient($request);  
?> 

<!DOCTYPE html>
<html>

 <head>
 	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Barlow Condensed' rel='stylesheet'>  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<style>
		html, body {  
		width: 100%;   
		height: 100%;   
		font-family: 'Barlow Condensed';
		font-size: 22px;   
		color: #000;      
		background: white;
		height: 100%;
		position: auto;
		width: 100%;

		}
		p {
		    margin-top: -15px;
		    margin-left: 1010px;
		    color: orange;
		}

		* {
		    box-sizing: border-box;
		    font-family: 'Barlow Condensed';
		}

		input[type=text]{
		    height:100px;
		    width: 300px;
		    font-size:14pt;		
		}

		button[type=button]{
		    float: auto;
		    background-color: orange;
		    color: white;
		    padding: 14px 20px;
		    margin: 0 8px;
		    margin-top: 20px;
		    margin-right: 20px;
		    border: none;
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
		/* Style for Profile view*/

		.dropbtn {
		    align=right;
		    background-color: orange;
		    color: white;
		    padding: 16px;
		    font-size: 16px;
		    border: none;
		    cursor: pointer;
		}

		.dropbtn:hover, .dropbtn:focus {
		    background-color: #0b7dda;
		}

		.dropdown {
		    position: relative;
		    display: inline-block;
		}

		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f1f1f1;
		    min-width: 160px;
		    overflow: auto;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		}

		.dropdown a:hover {background-color: #0b7dda}

		.show {display:block;}

		button[type=submit] {
		    float: left;
		    margin-left: 130px; 
		    margin-top: 10px;
		    width: 100px;
		    height: 50px;
		    font-size: 14px;
		    font-weight: bold;
		    color: #fff;
		    background-color: #acd6ef; /*IE fallback*/
		    background-image: -webkit-gradient(linear, left top, left bottom, from(#acd6ef), to(#6ec2e8));
		    background-image: -moz-linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
		    background-image: linear-gradient(top left 90deg, #acd6ef 0%, #6ec2e8 100%);
		    border-radius: 30px;
		    border: 1px solid #66add6;
		    box-shadow: 0 1px 2px rgba(0, 0, 0, .3), inset 0 1px 0 rgba(255, 255, 255, .5);
		    cursor: pointer;
		}


	</style>
</head>
<script>

	/* When the user clicks on the button,
	toggle between hiding and showing the dropdown content */
	function myFunction() {
	    document.getElementById("myDropdown").classList.toggle("show");
	}

	// Close the dropdown if the user clicks outside of it
	window.onclick = function(event) {
	  if (!event.target.matches('.dropbtn')) {

	    var dropdowns = document.getElementsByClassName("dropdown-content");
	    var i;
	    for (i = 0; i < dropdowns.length; i++) {
	      var openDropdown = dropdowns[i];
	      if (openDropdown.classList.contains('show')) {
		openDropdown.classList.remove('show');
	      }
	    }
	  }
	}

</script>

<body> 
  
	  <button type="button" onclick="myFunction()" class="dropbtn"><?php echo $_SESSION["username"] ?></button>
	     <div id="myDropdown" class="dropdown-content">
	      <a href="profile.php">My Profile</a>	
	      <a href="logout.php">Log Out</a>
	     </div>
	  <button type="button" onclick="location.href='BookForSell.php'" id="defaultOpen">Sell Books</button>
	  <button type="button" onclick="openElement(event, 'ContactUs')">Contact Us</button>
	  <img hspace="60" align=right src="logo.png" width="100" height="90"> 
	  <p>readBuster</p> <br><br><br><br><br>

	  <h1><?php echo $_SESSION["username"]; ?></h1>
	       <?php for($i = 0; $i < count($data["Books"]); $i++){ ?>
		    <b>Book Name: </b> <?php echo $data["suggestions"][$i]["book_title"]; ?>
		    <b>Author: </b> <?php echo $data["suggestions"][$i]["author"]; ?>
		    <b>Review: </b> <?php echo  $data["reviews"][$i]["review_text"]; ?><br>

		    <input id=addReview type=text name="addReview"><br>
	  	    <button type="submit">Add comment</i></button> <br>
		    <button onclick="AddToWishList()" class="dropbtn" id="addWish" type="button">+ Add to Wishlist</button>  
		    
		    <label class="container">Owned
		      <input type="checkbox">
		      <span class="checkmark"></span>
		    </label>
		    <label class="container">Read
		      <input type="checkbox">
		      <span class="checkmark"></span>
		    </label> <br><br>  
		<?php } ?><br>
		  
	    <button onclick="update()" class="dropbtn" id="update" type="submit">Update</button>  
		
</body>
</html>
