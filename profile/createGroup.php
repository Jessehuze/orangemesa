<?php
	require("/var/www/config.php");
	session_start();
	$result = mysqli_query($con, "SELECT groupname FROM GROUPS WHERE groupname = '" .$POST["groupName"]. "'");
	if(mysqli_num_rows($result) == 0)
	{
		$insert = mysqli_query($con, "INSERT INTO GROUPS (groupname, description)
									VALUES ('".$POST["groupName"]."', '".$POST["groupDesc"]."')");
	}
	header("Location: http://inceptisol.us.to:6670/profile/groups.php");
	exit();

?>