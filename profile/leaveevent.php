<?php
  //Code to connect to database
  require("/var/config.php");
  session_start();
  
  //Sanitize databse input to prevent sqli injection
  $event = mysqli_real_escape_string($con, $_POST["event"]);
  $user = mysqli_real_escape_string($con, $_SESSION["username"]);
  
  //Delete event invite from database
  $query = "DELETE FROM EVENT_INVITES WHERE invitee = '".$user."' AND eventid = '".$event."'";
  $delete = mysqli_query($con, $query);

  //Redirect to profile page
  header("Location: http://inceptisol.us.to:6670/profile/profile.php?user=".$_SESSION["username"]);
  exit();

?>