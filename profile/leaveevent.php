<?php
  require("/var/config.php");
  session_start();
  
  $event = mysqli_real_escape_string($con, $_POST["event"]);
  $user = mysqli_real_escape_string($con, $_SESSION["username"]);
  
  $query = "DELETE FROM EVENT_INVITES WHERE invitee = '".$_SESSION["username"]."' AND eventid = '".$_POST["event"]."'";
  $delete = mysqli_query($con, $query);
  
  echo $query;
  echo mysqli_error($con);
  
  //Redirect to profile page
  //header("Location: http://inceptisol.us.to::6670/profile/profile.php");
  exit();

?>