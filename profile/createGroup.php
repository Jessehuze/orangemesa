<?php
	require("/var/www/config.php");
	session_start();
	$query = "SELECT name FROM GROUPS WHERE name = '" .$_POST["groupName"]. "'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) == 0)
	{
		$query = "INSERT INTO GROUPS (name, description, owner) VALUES ('".$_POST["groupName"]."', '".$_POST["groupDesc"]."', '".$_SESSION["username"]."')";
		$insert = mysqli_query($con, $query);
		
		$query = mysqli_query($con, "SELECT groupid, owner FROM GROUPS WHERE name = '".$_POST["groupName"]."'");
		$row1 =mysqli_fetch_array($query);
		
		//Insert in owner as member of group
		$query = "INSERT INTO GROUP_MEMBERS (GID, memberid) VALUES('".$row1["groupid"]."','".$row1["owner"]."')";
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