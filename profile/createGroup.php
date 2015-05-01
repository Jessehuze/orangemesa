<?php
	require("/var/config.php");
	session_start();
  $groupName = mysqli_real_escape_string($con, $_POST["groupName"]);
  $groupDesc = mysqli_real_escape_string($con, $_POST["groupDesc"]);
	$query = "SELECT name FROM GROUPS WHERE name = '" .$groupName. "'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) == 0)
	{
		//Create Group in database
		$query = "INSERT INTO GROUPS (name, description, owner) VALUES ('".$groupName."', '".$groupDesc."', '".$_SESSION["username"]."')";
		$insert = mysqli_query($con, $query);
		
		$query = mysqli_query($con, "SELECT groupid, owner FROM GROUPS WHERE name = '".$groupName."'");
		$row1 = mysqli_fetch_array($query);
		
		//Insert owner as member of group
		$query = "INSERT INTO GROUP_MEMBERS (GID, memberid) VALUES('".$row1["name"]."','".$row1["owner"]."')";
		$insert = mysqli_query($con, $query);
	}
	else
	{
		header("Location: http://inceptisol.us.to:6670/profile/groups.php?error=groupnametaken");
		exit();
	}
	//header("Location: http://inceptisol.us.to:6670/profile/groups.php");
	exit();

?>