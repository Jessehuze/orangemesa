<script type="text/javascript" src="../js/moment.js"></script>

<?php
	//Database connection code
	require("/var/config.php");
	session_start();
	
	//Sanitize the information passed to protect against sql injection
	$eventname = mysqli_real_escape_string($con, $_POST["eventName"]);
	$eventdesc = mysqli_real_escape_string($con, $_POST["eventDesc"]);
	$eventdate = mysqli_real_escape_string($con, $_POST["eventDate"]);
  
  $dateTime = date_create($eventdate);
  $dateTime = date_format($dateTime, 'Y-m-d H:i:s');
  
	//Query to check if the event name already exists
	$query = "SELECT eventname FROM EVENTS WHERE eventname = '" .$eventName. "'";
	$result = mysqli_query($con, $query);
	
	//If event name doesn't exist yet
	if(mysqli_num_rows($result) == 0)
	{
		//Create Event in database
		$query = "INSERT INTO EVENTS (eventname, description, creatorid, eventdate) VALUES ('".$eventname."', '".$eventdesc."', '".$_SESSION["username"]."', '".$dateTime."')";
		mysqli_query($con, $query);
		
		//Retrieve event id
		$result = mysqli_query($con, "SELECT eventid FROM EVENTS WHERE eventname = '".$eventname."' AND creatorid = '".$_SESSION["username"]."'");
		$row = mysqli_fetch_array($result);
		
		//Insert creator of event into EVENT_INVITES signifying he/she is going to that event
		$query = "INSERT INTO EVENT_INVITES (eventid, invitee, status) VALUES ('".$row["eventid"]."','".$_SESSION["username"]."', 'g')";
		mysqli_query($con, $query);
	}
	else
	{
		//event name taken redirect
		header("Location: http://inceptisol.us.to:6670/profile/profile.php?error=eventnametaken");
		//exit();
	}
	//Redirect to profile page
	header("Location: http://inceptisol.us.to:6670/profile/profile.php");
	//exit();
  */
?>