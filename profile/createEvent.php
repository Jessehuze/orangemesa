<?php
	require("/var/config.php");
	session_start();
	
	$eventName = mysqli_real_escape_string($con, $_POST["eventName"]);
	$eventDate = mysqli_real_escape_string($con, $_POST["eventDate"]);
	$eventDecr = mysqli_real_escape_string($con, $_POST_["eventDesc"]);
	
	$query = "SELECT eventname FROM EVENTS WHERE eventname = '" .$eventName. "'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) == 0)
	{
		//Create Event in database
		$query = "INSERT INTO EVENTS (eventname, description, eventdate, creatorid) VALUES ('".$eventName."', '".$eventDesc."', '".$eventDate."', '".$_SESSION["username"]."')";
		$insert = mysqli_query($con, $query);
		
		$result = mysqli_query($con, "SELECT eventid, creatorid FROM EVENTS WHERE eventname = '".$eventName."'");
		$row = mysqli_fetch_array($result);
		
		$query = "INSERT INTO EVENT_INVITES (eventid, invitee, status) VALUES ('".$row["eventid"]."','".$row["creatorid"]."', 'g')";
		$insert = mysqli_query($con, $query);
	}
	else
	{
		//event name taken
		header("Location: http://inceptisol.us.to:6670/profile/events.php?error=eventnametaken");
		exit();
	}
	header("Location: http://inceptisol.us.to:6670/profile/groups.php?error=groupnametaken");
	exit();
	
?>