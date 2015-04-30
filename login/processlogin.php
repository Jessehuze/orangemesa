<?php
  require("/var/www/config.php");
  session_start();
  if($_POST["username"] != "" && $_POST["pass"] != "" && isset($_POST["login"])) {
    $result = mysqli_query($con, "SELECT username, fname FROM PEOPLE WHERE username = '" .$_POST["username"]. "' AND
                                                                              usr_pass = '" .$_POST["pass"]."'");
    if (mysqli_num_rows($result) == 0) {
      header("Location: http://inceptisol.us.to:6670/login/login.php?error=Incorrect Username/Password.");
      exit();
    }
    $row = mysqli_fetch_array($result);
    $_SESSION["User"] = $row["username"];
    $_SESSION["fname"] = $row["fname"];
    header("Location: http://inceptisol.us.to:6670/profile/profile.php");
    exit();
  }
?>