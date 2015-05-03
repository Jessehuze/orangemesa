<?php
	//Database connection code
	require("/var/config.php");
	session_start();
	
	//Sanitize the information passed to protect against sql injection
    $groupName = mysqli_real_escape_string($con, $_POST["groupName"]);
    $groupDesc = mysqli_real_escape_string($con, $_POST["groupDesc"]);
	
	//Check to see if group name is already taken
	$query = "SELECT name FROM GROUPS WHERE name = '" .$groupName. "'";
	$result = mysqli_query($con, $query);
	
	//If name isn't taken
	if(mysqli_num_rows($result) == 0)
	{
		//Create Group in database
		$query = "INSERT INTO GROUPS (name, description, owner) VALUES ('".$groupName."', '".$groupDesc."', '".$_SESSION["username"]."')";
		$insert = mysqli_query($con, $query);
		
		//Retrieve new group id
		$query = mysqli_query($con, "SELECT groupid, owner FROM GROUPS WHERE name = '".$groupName."'");
		$row1 = mysqli_fetch_array($query);
		
		//Insert owner as member of group
		$query = "INSERT INTO GROUP_MEMBERS (GID, memberid) VALUES('".$row1["groupid"]."','".$row1["owner"]."')";
		$insert = mysqli_query($con, $query);

		//Reloads reference page
		header("Location: ".$_POST["refer"]);
	}
	else
	{
		//Redirect if group name is taken
		header("Location: http://inceptisol.us.to:6670/profile/profile.php?error=groupnametaken");
		exit();
	}
	//Redirect to profile page
	//header("Location: http://inceptisol.us.to:6670/profile/profile.php");
	exit();

?>