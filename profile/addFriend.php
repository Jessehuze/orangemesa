<?php
	require("/var/config.php");
	session_start();
	
	$friend = mysqli_real_escape_string($con, $_POST["user"]);
	$friender = mysqli_real_escape_string($con, $_SESSION["username"]);
	
	$query = "INSERT INTO FRIENDS (userid, friendid, status) VALUES ('".$friender."', '".$friend."', a)";
	echo $query;
	$insert = mysqli_query($con, $query);
	
	//header("Location: http://inceptisol.us.to:6670/profile/search.php");

?>