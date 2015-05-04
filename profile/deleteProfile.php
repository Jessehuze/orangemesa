<?php
  require("/var/config.php");
  session_start();
  
  if ($_POST["delete"] == "true")
  {
    $query = "DELETE FROM PEOPLE WHERE username = '".$_SESSION["username"]."'";
    $delete = mysqli_query($con, $query);
    session_destroy();
    header("Location: http://inceptisol.us.to:6670/login/login.php");
    exit();
  }
  else
  {
    //Redirect to profile page
    header("Location: http://inceptisol.us.to:6670/profile/profile.php?user=".$_GET["user"]);
    exit();
  }

?>