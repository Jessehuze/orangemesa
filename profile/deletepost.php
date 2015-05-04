<?php
  require("/var/config.php");
  session_start();
  
  $post = mysqli_real_escape_string($con, $_GET["postid"]);
  
  $query = "DELETE FROM POST_PEOPLE2PEOPLE WHERE postid = '".$post."'";
  $delete = mysqli_query($con, $query);

  //Redirect to profile page
  header("Location: http://inceptisol.us.to:6670/profile/profile.php?user=".$_GET["user"]);
  exit();

?>