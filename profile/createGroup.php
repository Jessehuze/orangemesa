<?php
	require("/var/www/config.php");
	session_start();
	$query = "SELECT name FROM GROUPS WHERE name = '" .$_POST["groupName"]. "'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) == 0)
	{
		$query = "INSERT INTO GROUPS (name, description, owner) VALUES ('".$_POST["groupName"]."', '".$_POST["groupDesc"]."', '".$_SESSION["username"]."')";
		$insert = mysqli_query($con, $query);
		
		//Insert in owner as member of group
		$query = "INSERT INTO GROUP_MEMBERS (GID, memberid) VALUES(SELECT groupid FROM GROUPS WHERE name = '".$_POST["groupName"]."', SELECT owner FROM GROUPS WHERE name = '".$_POST["groupName"]."')";
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