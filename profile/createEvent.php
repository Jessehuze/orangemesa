<?php
	require("/var/config.php");
	session_start();
	
	$eventName = mysqli_real_escape_string($con, $_POST["eventName"]);
	$eventDecr = mysqli_real_escape_string($con, $_POST_["eventDesc"]);
	
	$query = "SELECT eventname FROM EVENTS WHERE eventname = '" .$eventName. "'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) == 0)
	{
		//Create Event in database
		$query = "INSERT INTO EVENTS (eventname, description, creatorid) VALUES ('".$eventName."', '".$eventDesc."', '".$_SESSION["username"]."')";
		mysqli_query($con, $query);
		
		$result = mysqli_query($con, "SELECT eventid FROM EVENTS WHERE eventname = '".$eventName."' AND creatorid = '".$_SESSION["username"]."'");
		$row = mysqli_fetch_array($result);
		
		$query = "INSERT INTO EVENT_INVITES (eventid, invitee, status) VALUES ('".$row["eventid"]."','".$_SESSION["username"]."', 'g')";
		mysqli_query($con, $query);
	}
	else
	{
		//event name taken
		header("Location: http://inceptisol.us.to:6670/profile/profile.php?error=eventnametaken");
		exit();
	}
	header("Location: http://inceptisol.us.to:6670/profile/profile.php");
	exit();
	
?>