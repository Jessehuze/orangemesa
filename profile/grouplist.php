<?php
	require("/var/www/config.php");
	session_start();
	
	$result = mysqli_query($con, "SELECT name, description FROM GROUPS WHERE 
//We don't have any way of storing what user belongs to what group

?>