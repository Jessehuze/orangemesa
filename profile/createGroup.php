<?php
	require("/var/www/config.php");
	session_start();
	$query = "SELECT name FROM GROUPS WHERE name = '" .$_POST["groupName"]. "'";
	$result = mysqli_query($con, $query);
	echo mysqli_num_rows($result);
	if(mysqli_num_rows($result) == 0)
	{
		$insert = mysqli_query($con, "INSERT INTO GROUPS (name, description, owner) VALUES ('".$_POST["groupName"]."', '".$_POST["groupDesc"]."', '".$_SESSION["username"]."')");
		echo $insert;
	}
	else
	{
		//header("Location: http://inceptisol.us.to:6670/profile/groups.php?error=groupnametaken");
		exit();
	}
	//header("Location: http://inceptisol.us.to:6670/profile/groups.php");
	exit();

?>