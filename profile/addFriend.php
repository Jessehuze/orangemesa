<?php
	//Database connection code
	require("/var/config.php");
	session_start();
	
	//Sanitize data input to prevent sql injection
	$friend = mysqli_real_escape_string($con, $_POST["user"]);
	$friender = mysqli_real_escape_string($con, $_SESSION["username"]);
    $search = mysqli_real_escape_string($con, $_POST["query"]);
   
    //Determine if you are already friends or not
    $friendstatus = mysqli_query($con, "SELECT * FROM FRIENDS
                                                  WHERE userid = '".$friender."' AND friendid = '".$friend."' ");
  
  //If you aren't already friends
  if (mysqli_num_rows($friendstatus) == 0)
  {
	//Insert into database
    $query = "INSERT INTO FRIENDS (userid, friendid, request_state) VALUES ('".$friender."' , '".$friend."', 'a') ";
    $insert = mysqli_query($con, $query);
	
	//Redirect to search page
    header("Location: http://inceptisol.us.to:6670/profile/search.php?query=".$search);
    exit();
  }
  //If you are already friends, redirect to Search page
  else
  {

    header("Location: http://inceptisol.us.to:6670/profile/search.php?query=".$search);
    exit();
  }
	

?>