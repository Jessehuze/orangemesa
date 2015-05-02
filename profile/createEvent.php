<?php
	require("/var/config.php");
	session_start();
	
	$eventname = mysqli_real_escape_string($con, $_POST["eventName"]);
	$eventdesc = mysqli_real_escape_string($con, $_POST["eventDesc"]);
	$eventdate = mysqli_real_escape_string($con, $_POST["eventDate"]);
	
	$query = "SELECT eventname FROM EVENTS WHERE eventname = '" .$eventName. "'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) == 0)
	{
		//Create Event in database
		$query = "INSERT INTO EVENTS (eventname, description, creatorid, eventdate) VALUES ('".$eventname."', '".$eventdesc."', '".$_SESSION["username"]."', '".$eventdate."')";
		mysqli_query($con, $query);
		
		$result = mysqli_query($con, "SELECT eventid FROM EVENTS WHERE eventname = '".$eventname."' AND creatorid = '".$_SESSION["username"]."'");
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