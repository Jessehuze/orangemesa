<?php
	require("/var/www/config.php");
	session_start();
	$query = "SELECT name FROM GROUPS WHERE name = '" .$_POST["groupName"]. "'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) == 0)
	{
		echo "in if statement";
		$query = "INSERT INTO GROUPS (name, description, owner) VALUES ('".$_POST["groupName"]."', '".$_POST["groupDesc"]."', '".$_SESSION["username"]."')";
		$insert = mysqli_query($con, $query);
		echo $query;
	}
	else
	{
		//header("Location: http://inceptisol.us.to:6670/profile/groups.php?error=groupnametaken");
		exit();
	}
	//header("Location: http://inceptisol.us.to:6670/profile/groups.php");
	exit();

?>