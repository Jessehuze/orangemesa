<?php
  require("/var/config.php");
  session_start();
  if($_POST["username"] != "" && $_POST["pass"] != "" && isset($_POST["login"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $usr_pass = mysqli_real_escape_string($con, $_POST["pass"]);
    $result = mysqli_query($con, "SELECT username, fname FROM PEOPLE WHERE username = '" .$username. "' AND
                                                                              usr_pass = '" .$usr_pass."'");
    if (mysqli_num_rows($result) == 0) {
      header("Location: http://inceptisol.us.to:6670/login/login.php?error=Incorrect Username/Password.");
      exit();
    }
    $row = mysqli_fetch_array($result);
    $_SESSION["username"] = $row["username"];
    $_SESSION["fname"] = $row["fname"];
    header("Location: http://inceptisol.us.to:6670/profile/profile.php");
    exit();
  }
?>