<?php

  //Database connection code
  require("/var/config.php");
  session_start();
  
  if($_POST["username"] != "" && $_POST["pass"] != "" && isset($_POST["login"])) {
    
	//Sanitize data input to prevent sql injection
	$username = mysqli_real_escape_string($con, $_POST["username"]);
    $usr_pass = mysqli_real_escape_string($con, $_POST["pass"]);
    
	//Retrieve password from given username
	$result = mysqli_query($con, "SELECT username, fname, usr_pass FROM PEOPLE WHERE username = '" .$username. "'");
    $row = mysqli_fetch_array($result);
    
	//Check to see if password and first names match
    if (password_verify($_POST["pass"], $row["usr_pass"])) {
      $_SESSION["username"] = $row["username"];
      $_SESSION["fname"] = $row["fname"];
      
	  //Redirect to profile page
	  header("Location: http://inceptisol.us.to:6670/profile/profile.php");
      exit();
    }
	//If the password and first name don't match redirect to login page
    header("Location: http://inceptisol.us.to:6670/login/login.php?error=Incorrect Username/Password.");
    exit();
  }
?>