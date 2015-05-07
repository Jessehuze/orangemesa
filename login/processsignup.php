<?php
  require("/var/config.php");
  session_start();
  if ($_POST["usr_pass"] == $_POST["usr_pass_check"]) //Passwords match
  {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $usr_pass = mysqli_real_escape_string($con, $_POST["usr_pass"]);
    $hash = password_hash($usr_pass, PASSWORD_DEFAULT);
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $minit = mysqli_real_escape_string($con, $_POST["minit"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $result = mysqli_query($con, "SELECT username FROM PEOPLE WHERE username = '" .$username. "'");
    if (mysqli_num_rows($result) == 0)
    {
      $date = DateTime::createFromFormat('m-d-Y', $_POST["dob"]);
      $date = $date->format('Y-m-d');
      if ($minit == "") { //NO MIDDLE NAME GIVEN
      
        $insert = mysqli_query($con, "INSERT INTO PEOPLE (username, usr_pass, fname, lname, dob)
                                      VALUES ('".$username."', '".$hash."', 
                                              '".$fname."', '".$lname."', '".$date."')");
      } else { //MIDDLE NAME GIVEN
        $insert = mysqli_query($con, "INSERT INTO PEOPLE (username, usr_pass, fname, minit, lname, dob)
                        VALUES ('".$username."', '".$hash."', '".$fname."',
                                            '".$minit."', '".$lname."' , '".$date."')");

      }
    }
    else //Redirect otherwise
    {
      header("Location: http://inceptisol.us.to:6670/login/login.php?error=Username Taken.&signin=true");
      exit();
    }
    if ($insert) //If insertion is successful, redirect to home page
    {
      $_SESSION["username"] = $username;
      $_SESSION["firsttimelogin"] = 1;
      $_SESSION["fname"] = $row["fname"];
      $_SESSION["imageurl"] = "../images/user.png";
      header("Location: http://inceptisol.us.to:6670/profile/profile.php?user=".$_SESSION["username"]);
      exit();
    }
  }
  else //Passwords don't match
  {
    header("Location: http://inceptisol.us.to:6670/login/login.php?error=Passwords Don't Match.&signin=true");
    exit();
  }
?>