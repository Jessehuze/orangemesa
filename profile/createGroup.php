<?php
	require("/var/www/config.php");
	session_start();
	$result = mysqli_query($con, "SELECT name FROM GROUPS WHERE name = '" .$_POST["groupName"]. "'");
	echo("$result");
	if(mysqli_num_rows($result) == 0)
	{
		$insert = mysqli_query($con, "INSERT INTO GROUPS (name, description, owner)
									VALUES ('".$_POST["groupName"]."', '".$_POST["groupDesc"]."', '".$SESSION["User"]."')");
	}
	else
	{
		header("Location: http://inceptisol.us.to:6670/profile/groups.php?error=groupnametaken");
		exit();
	}
	header("Location: http://inceptisol.us.to:6670/profile/groups.php");
	exit();

?>