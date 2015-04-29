<?php
	require("/var/www/config.php");
	session_start();
	$result = mysqli_query($con, "SELECT name FROM GROUPS WHERE name = '" .$POST["groupName"]. "'");
	if(mysqli_num_rows($result) == 0)
	{
		$insert = mysqli_query($con, "INSERT INTO GROUPS (name, description, owner)
									VALUES ('".$POST["groupName"]."', '".$POST["groupDesc"]."', '".$SESSION["User"]."')");
	}
	else
	{
		header("Location: http://inceptisol.us.to:6670/profile/groups.php?error=groupnametaken");
		exit();
	}
	header("Location: http://inceptisol.us.to:6670/profile/groups.php");
	exit();

?>