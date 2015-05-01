<?php
	require("/var/config.php");
	session_start();
	
	$friend = $_GET["user"];
	$friender = $_SESSION["username"];
	
	$query = "INSERT INTO FRIENDS (userid, friendid, status) VALUES ('".$friender."', '".$friend."', a)";
	echo $query;
	$insert = mysqli_query($con, $query);

?>