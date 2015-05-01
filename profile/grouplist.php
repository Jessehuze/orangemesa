<?php
	require("/var/config.php");
	
	
	
	$query = "SELECT G.name, G.description, G.owner FROM GROUP_MEMBERS M, GROUPS G WHERE memberid = '" .$_SESSION["username"]. "' AND M.GID = G.groupid"; 
	$result = mysqli_query($con, $query);
	
	while($row = mysqli_fetch_assoc($result))
	{
		echo "Group Name: '".$row["name"]."'<br>";
		echo "Description: '".$row["description"]."'<br>";
		echo "Group Owner: '".$row["owner"]."'<br>";
		echo "<br>";
	}
?>