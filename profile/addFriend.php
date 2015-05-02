<?php
	require("/var/config.php");
	session_start();
	
	$friend = mysqli_real_escape_string($con, $_POST["user"]);
	$friender = mysqli_real_escape_string($con, $_SESSION["username"]);
  
  $friendstatus = mysqli_query($con, "SELECT * FROM FRIENDS
                                                  WHERE userid = '".$friender."' AND friendid = '".$friend."' ");
  
  if (mysqli_num_rows($friendstatus) == 0)
  {
    $query = "INSERT INTO FRIENDS (userid, friendid, request_state) VALUES ('".$friender."' , '".$friend."', 'a') ";
    echo $query;
    $insert = mysqli_query($con, $query);
    header("Location: http://inceptisol.us.to:6670/profile/profile.php");
    exit();
  }
  else
  {
    header("Location: http://inceptisol.us.to:6670/profile/profile.php");
    exit();
  }
	

?>