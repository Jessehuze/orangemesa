<?php
  require("/var/config.php");
  session_start();
  
  $event = mysqli_real_escape_string($con, $_POST["event"]);
  $user = mysqli_real_escape_string($con, $_SESSION["username"]);
  
  $query = "DELETE FROM EVENT_INVITES WHERE invitee = '".$user."' AND eventid = '".$event."'";
  $delete = mysqli_query($con, $query);

  //Redirect to profile page
  header("Location: http://inceptisol.us.to:6670/profile/profile.php?user=".$_SESSION["username"]);
  exit();

?>