<?php
  require("/var/www/config.php");
  session_start();
    $insert = mysqli_query($con, "UPDATE PEOPLE
                                  SET fname = '".$_POST["fname"]."'
                                  WHERE username = '" .$_SESSION["username"]. "' "); 
  if ($insert)
  {
    $_SESSION["User"] = $_POST["username"];
  	header("Location: http://inceptisol.us.to:6670/profile/settings.php");
    exit();
  }
?>