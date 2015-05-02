<?php
	require("/var/config.php");
	session_start();
	
	$eventid = mysqli_real_escape_string($con, $_GET["event"]);
	$user = mysqli_real_escape_string($con, $_SESSION["username"]);
	
	//Insert user into group
	$query = "INSERT INTO EVENT_INVITES VALUES ('".$eventid."', '".$user."', 'g')";
	$insert = mysqli_query($con, $query);
	
	//header("Location: http://inceptisol.us.to::6670/profile/search.php");


?>