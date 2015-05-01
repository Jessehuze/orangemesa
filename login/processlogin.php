<?php
  require("/var/config.php");
  session_start();
  if($_POST["username"] != "" && $_POST["pass"] != "" && isset($_POST["login"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $usr_pass = mysqli_real_escape_string($con, $_POST["pass"]);
    $result = mysqli_query($con, "SELECT username, fname, usr_pass FROM PEOPLE WHERE username = '" .$username. "'");
    $row = mysqli_fetch_array($result);
    
    if (password_verify($_POST["pass"], $row["usr_pass"])) {
      $_SESSION["username"] = $row["username"];
      $_SESSION["fname"] = $row["fname"];
      header("Location: http://inceptisol.us.to:6670/profile/profile.php");
      exit();
    }
    header("Location: http://inceptisol.us.to:6670/login/login.php?error=Incorrect Username/Password.");
    exit();
  }
?>