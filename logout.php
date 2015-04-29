<?php
  session_start();
  session_destroy();
  header("Location: http://inceptisol.us.to:6670/login/login.php");
  exit();
?>