<?php
  require("/var/config.php");
  session_start();
  //Is the user still logged in?
  if (!isset($_SESSION["username"])) 
  {
    header("Location: http://inceptisol.us.to:6670/login/login.php?error=Please Log in to Continue.");
    exit();
  }
?>
