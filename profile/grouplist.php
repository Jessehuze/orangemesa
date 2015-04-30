<?php
	require("/var/www/config.php");
	
	session_start();
	
	$query = "SELECT G.name, G.description, G.owner FROM GROUP_MEMBERS M, GROUPS G WHERE memberid = '" .$_SESSION["username"]. "' AND M.GID = G.groupid"; 
	$result = mysqli_query($con, $query);
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo $row["name"];
		echo $row["description"];
		echo $row["owner"];
	}


?>