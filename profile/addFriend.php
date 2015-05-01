<?php
	require("/var/config.php");
	session_start();
	
	$friend = $_GET["user"];
	$friender = $_SESSION["username"];
	

?>