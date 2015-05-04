<?php
  require("/var/config.php");
  session_start();
  
  $friend = mysqli_real_escape_string($con, $_POST["friend"]);
  $user = mysqli_real_escape_string($con, $_SESSION["username"]);
  
  $query = "DELETE FROM FRIENDS WHERE userid = '".$user."' AND friendid = '".$friend."'";
  $delete = mysqli_query($con, $query);

  //Redirect to profile page
  header("Location: http://inceptisol.us.to:6670/profile/profile.php");
  exit();

?>