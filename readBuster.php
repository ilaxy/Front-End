
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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>readBuster-Welcome Page</title>     
	<link rel="stylesheet" href="readBusterActive.css">
	<link href='https://fonts.googleapis.com/css?family=Barlow Condensed' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>

	// When the user clicks on the button, toggle between hiding and showing the dropdown content //
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
</head>

<body>

	<button type="button" onclick="myFunction()" class="dropbtn"><?php echo $_SESSION["username"] ?></button>
	     <div id="myDropdown" class="dropdown-content">
	      <a href="profile.php">My Profile</a>	
	      <a href="logout.php">Log Out</a>
	     </div>
	  <button type="button" onclick="location.href='BookForSell.php'" id="defaultOpen">Sell Books</button>
	  <button type="button" onclick="openElement(event, 'ContactUs')">Contact Us</button>
	  <img hspace="60" align=right src="logo.png" width="100" height="90"> 
	  <p>readBuster</p> <br> <br><br><br><br>


	<br><br><br>
	<form class="example" action="BookView.php" style="margin:auto;max-width:600px">
	  <input type="text" placeholder="Search by Book Title or Author Name.." name="search2">
	  <button type="submit">Find a book</i></button>
	</form>

</body>
</html>


