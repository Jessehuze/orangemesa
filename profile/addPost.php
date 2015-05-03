<?php
	require("/var/config.php");
	session_start();
	
	$reciever = mysqli_real_escape_string($con, $_POST["reciever"]);
	$sender = mysqli_real_escape_string($con, $_SESSION["username"]);
  $msg = mysqli_real_escape_string($con, $_POST["message"]);
	
	//Insert user into group
	$query = "INSERT INTO POST_PEOPLE2PEOPLE (reciever, sender, message, timestamp)
                VALUES('".$reciever."', '".$sender."', '".$msg."', now())";

	$insert = mysqli_query($con, $query);
  
  header("Location: http://inceptisol.us.to::6670/profile/profile.php?user=".$reciever."");


?>