<?php
	//Database connection code
	require("/var/config.php");
	session_start();
	
	//Sanitize data input to prevent sql injection
	$eventid = mysqli_real_escape_string($con, $_POST["event"]);
	$user = mysqli_real_escape_string($con, $_SESSION["username"]);
	
	//Insert user into event
	$query = "INSERT INTO EVENT_INVITES VALUES ('".$eventid."', '".$user."', 'g')";
	$insert = mysqli_query($con, $query);
	
	//Redirect to profile page
	header("Location: http://inceptisol.us.to:6670/profile/search.php");
	exit();

?>