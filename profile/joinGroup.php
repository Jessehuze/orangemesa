<?php
	//Database Connection Code
	require("/var/config.php");
	session_start();
	
	//Sanitize the information passed to protect against sql injection
	$groupid = mysqli_real_escape_string($con, $_POST["group"]);
	$user = mysqli_real_escape_string($con, $_SESSION["username"]);
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	
	//Insert user into group
	$query = "INSERT INTO GROUP_MEMBERS (gid, memberid) VALUES ('".$groupid."', '".$user."')";
	$insert = mysqli_query($con, $query);
	
	//Redirect to search page
	header("Location: http://inceptisol.us.to:6670/profile/search.php?query=".$search);
    exit();

?>