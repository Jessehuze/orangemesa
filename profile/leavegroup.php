<?php
  //Code to connect to database
  require("/var/config.php");
  session_start();
  
  //Sanitize database input to prevent sqli injection
  $group = mysqli_real_escape_string($con, $_POST["group"]);
  $user = mysqli_real_escape_string($con, $_SESSION["username"]);
  
  //Delete group member entry from database
  $query = "DELETE FROM GROUP_MEMBERS WHERE gid = '".$group."' AND memberid = '".$user."'";
  $delete = mysqli_query($con, $query);

  //Redirect to profile page
  header("Location: http://inceptisol.us.to:6670/profile/profile.php?user=".$_SESSION["username"]);
  exit();

?>