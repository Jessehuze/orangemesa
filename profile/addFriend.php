<?php
	require("/var/config.php");
	session_start();
	
	$friend = mysqli_real_escape_string($con, $_POST["user"]);
	$friender = mysqli_real_escape_string($con, $_SESSION["username"]);
  
	$query = "INSERT INTO FRIENDS (userid, friendid, request_state) VALUES ('".$friender."', '".$friend."', 'a')";
	echo $query;
	$insert = mysqli_query($con, $query);
	if ($insert == false)
	{
		echo "failure";
	}
	else
	{
		echo "success";
	}
	echo $insert;
	
	//header("Location: http://inceptisol.us.to:6670/profile/profile.php");

?>