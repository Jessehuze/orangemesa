<?php
	require("/var/config.php");
	session_start();
	
	$groupName = $_GET["group"];
	$user = $_SESSION["username"];
	
	//Acquire group id from group name
	$query = mysqli_query($con, "SELECT groupid FROM GROUPS WHERE name = '".$groupName."'"); 
	$groupid = mysqli_fetch_array($query);
	
	//Insert user into group
	$query = "INSERT INTO GROUP_MEMBERS (gid, memberid) VALUES ('".$groupid["groupid"]."', '".$user."')";
	$insert = mysqli_query($con, $query);
	
	//header("Location: http://inceptisol.us.to::6670/profile/search.php");


?>