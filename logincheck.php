<?php
  require("config.php");
  session_start();
  if (!isset($_SESSION["User"])) 
  {
    header("Location: http://inceptisol.us.to:6670/login/login.php?error=Please Log in to Continue.");
    exit();
  }
?>
