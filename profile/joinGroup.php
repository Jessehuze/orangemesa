<?php
	require("/var/config.php");
	session_start();
	
	$groupid = mysqli_real_escape_string($con, $_POST["group"]);
	$user = mysqli_real_escape_string($con, $_SESSION["username"]);
	
	//Insert user into group
	$query = "INSERT INTO GROUP_MEMBERS (gid, memberid) VALUES ('".$groupid."', '".$user."')";
	$insert = mysqli_query($con, $query);
	
	header("Location: http://inceptisol.us.to::6670/profile/search.php");


?>