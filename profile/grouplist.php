<?php
	require("/var/www/config.php");
	
	
	
	$query = "SELECT G.name, G.description, G.owner FROM GROUP_MEMBERS M, GROUPS G WHERE memberid = '" .$_SESSION["username"]. "' AND M.GID = G.groupid"; 
	$result = mysqli_query($con, $query);
	
	$numrows = mysqli_num_rows($result);
	
	echo $query;
	echo $numrows;
	
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo "Got to this point";
		echo $row["name"];
		echo $row["description"];
		echo $row["owner"];
	}


?>