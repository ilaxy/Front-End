<?php

switch($_POST["request"]){
	
	case "set": echo(startSession($_POST["username"],$_POST["email"]));
	break;
	case "get": echo(getSession());
	break;
	case "stop": stopSessions();
	break;
}
function startSession($user, $email){
	//writeLogs($user);
	session_start();	
	$_SESSION['username'] = $user;
	$_SESSION['email'] = $email;
	return true;
}
function getSession(){
	session_start();
	//writeLogs($_SESSION["user"]);
	return json_encode(array($_SESSION["username"],$_SESSION["email"]));
}
function stopSessions(){
	session_start();
	session_unset();
	session_destroy();
}
?>
