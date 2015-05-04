<?php
  require("/var/config.php");
  session_start();
  
  $event = mysqli_real_excape_string($con, $_POST["event"]);
  $user = mysqli_real_escape_string($_SESSION["username"]);
  
  $query = "";
  $delete = mysqli_query($con, $query);
  
  //Redirect to profile page
  header("Location: http://inceptisol.us.to::6670/profile/profile.php");
  exit();

?>