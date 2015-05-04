<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="login.js"></script>
    <script type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="settings.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/logo.png">

    <title>OrangeMesa</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  </head>

  <?php
    require("../logincheck.php");
  ?>

  <style>
    .infobar{
      max-height: calc(100vh - 175px);
      overflow-y: scroll;
      overflow-x: hidden;
      word-wrap: break-word;
      padding-right: 15px
    }
  </style>

  <body>

  <!-- firsttimelogin Modal -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Set your description?</h4>
          </div>
          <div class="modal-body">
           <div class="cont">
           <div class = "demo">
            <div class="editProfile">
              <div class="editProfile_form">

                <form action="updateProfile/processEdit_description.php" method="POST">
                  <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>

                  <div class="editProfile_row">
                  <textarea name="description" class="edit__input description" placeholder="Description" rows="6"></textarea>
                  <button name="update_description" type="submit" class="edit__submit">Set Description</button>
                  </div>

                </form>

              </div>
             </div>
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  <script>
  <?php
  if (isset($_SESSION["firsttimelogin"]))
  {
    if ($_SESSION["firsttimelogin"] == 1)
    {
      $_SESSION["firsttimelogin"] = 0;
      echo 'setTimeout(function() {$("#myModal2").modal("show");}, 100);';
    }
  }
  ?>
  </script>

  <!-- Profile Pro Modal -->
    <div class="modal fade" id="propic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Change Picture</h4>
          </div>
          <div class="modal-body">
           <div class="cont">
           <div class = "demo">
            <div class="editProfile">
              <div class="editProfile_form">

                  <div class="editProfile_row">

                    <?php
                      if (isset($_GET["user"]))
                      {
                        if ($_GET["user"] == $_SESSION["username"])
                          echo '<form action="../upload.php" method="post" enctype="multipart/form-data">
                                  Select image to upload:
                                  <input type="file" name="fileToUpload" id="fileToUpload">
                                  <input type="submit" value="Upload Image" name="submit" class="edit__submit">
                                  <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                                </form>';
                      }
                      else
                      {
                        echo '<form action="../upload.php" method="post" enctype="multipart/form-data">
                                Select image to upload:
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload Image" name="submit" class="edit__submit">
                                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                              </form>';
                      }
                    ?>
                  </div>

              </div>
             </div>
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>

<!-- Settings Modal -->
    <div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Settings</h4>
          </div>
          <div class="modal-body">
           <div class="cont">
           <div class = "demo">
            <div class="editProfile">
              <div class="editProfile_form">

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_fname.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <input name="fname" type="text" class="edit__input fname" placeholder="First Name" />
                <button name="update_fname" type="submit" class="edit__submit">Update First Name</button>
                </form>
               </div>

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_minit.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <input name="minit" type="text" class="edit__input minit" placeholder="Middle Initial" />
                <button name="update_minit" type="submit" class="edit__submit">Update Middle Initial</button>
                </form>
               </div>

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_lname.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <input name="lname" type="text" class="edit__input lname" placeholder="Last Name" />
                <button name="update_lname" type="submit" class="edit__submit">Update Last Name</button>
                </form>
               </div>

               <div class="editProfile_row">
                <form action="updateProfile/processEdit_description.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <textarea name="description" class="edit__input description" placeholder="Description" rows="6"></textarea>
                <button name="update_description" type="submit" class="edit__submit">Update Description</button>
                </form>
               </div>

              </div>
             </div>
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Groups Modal -->
    <div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Groups</h4>
          </div>
          <div class="modal-body">
           <div class="cont">
           <div class = "demo">
            <div class="editProfile">
              <div class="editProfile_form">

              <form action="createGroup.php" method="POST">
                <div class="createGroup__row">
                  <svg class="signup__icon username svg-icon" viewBox="0 0 20 20">
                  </svg>
                  <input name="groupName" type="text" class="edit__input groupName" placeholder="Group Name" required/>
                </div>

                <div class="createGroupDesc__row">
                  <svg class="signup__icon username svg-icon" viewBox="0 0 20 20">
                  </svg>
                  <textarea name="groupDesc" type="text" class="edit__input description" rows="6" placeholder="Description" required></textarea>
                </div>

                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <button name="createGroup" type="submit" class="edit__submit">Create Group</button>
              </form>

              </div>
             </div>
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Post Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Post</h4>
          </div>
          <div class="modal-body">
           <div class="cont">
           <div class = "demo">
            <div class="editProfile">
              <div class="editProfile_form">

              <form action="addPost.php" method="POST">

                <div class="createGroupDesc__row">
                  <textarea name="message" type="text" class="edit__input description" rows="6" placeholder="Message" required></textarea>
                </div>

                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <button name="post" type="submit" class="edit__submit">Send Message</button>
                <input name="reciever" type="hidden" value="<?php
                    if (isset($_GET["user"]))
                      $user=$_GET["user"];
                    else
                      $user=$_SESSION["username"];
                    echo $user;
                  ?>"/>

              </form>

              </div>
             </div>
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Events Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Events</h4>
          </div>
          <div class="modal-body">
           <div class="cont">
           <div class = "demo">
            <div class="editProfile">
              <div class="editProfile_form">

              <form action="createEvent.php" method="POST">
                <div class="createGroup__row">
                  <svg class="signup__icon username svg-icon" viewBox="0 0 20 20">
                  </svg>
                  <input name="eventName" type="text" class="edit__input groupName" placeholder="Event Name" required/>
                </div>

                <div class="createGroupDesc__row">
                  <svg class="signup__icon username svg-icon" viewBox="0 0 20 20">
                  </svg>
                  <textarea name="eventDesc" type="text" class="edit__input description" rows="6" placeholder="Description" required></textarea>
                </div>

				<div class="createGroupDate__row">
				  <svg class="signup__icon username svg-icon" viewbox="0 0 20 20"></svg>
				  <input name="eventDate" type="text" class="edit__input dob" name="eventDate" placeholder="Event Date" required pattern="((((0[13578]|1[02])(\/|-|.)(0[1-9]|1[0-9]|2[0-9]|3[01]))|((0[469]|11)(\/|-|.)(0[1-9]|1[0-9]|2[0-9]|3[0]))|((02)((\/|-|.)(0[1-9]|1[0-9]|2[0-8]))))(\/|-|.)(19([6-9][0-9])|20(0[0-9]|1[0-4])))|((02)(\/|-|.)(29)(\/|-|.)(19(6[048]|7[26]|8[048]|9[26])|20(0[048]|1[26])))"/>
				</div>

                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <button name="createGroup" type="submit" class="edit__submit">Create Event</button>
              </form>

              </div>
             </div>
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>



    <script>
    </script>


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <img href="../images/logo.png"></img>
          <a class="navbar-brand" href="profile.php">
            <object id="logoO" type="image/svg+xml" data="../images/logo.svg" width="25" height="25"></object>
            <object id="logoW" type="image/svg+xml" data="../images/logow.svg" width="25" height="25" style="position: relative; left: -30.25px; opacity: 0;"></object>
            <span style="position: relative; top: -5.5px; left: -37.25px;">rangeMesa</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="profile.php"><i class="fa fa-user"></i>
            <?php
                require("/var/config.php");
                $username = mysqli_real_escape_string($con, $_SESSION["username"]);
                $result = mysqli_query($con, "SELECT fname FROM PEOPLE WHERE username = '" .$username. "'");
                $name = mysqli_fetch_array($result);
                echo $name["fname"];
            ?>
            </a></li>
            <li><a data-toggle="modal" data-target="#settingsModal" href="#settingsModal">Settings</a></li>
            <li><a href="../logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
          </ul>
          <form class="navbar-form navbar-left" action="search.php" method="GET">
            <div class="input-group">
              <input name="query" type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                 <button class="btn btn-default" type="submit">
                  <span class="glyphicon glyphicon-search" style="color:#FA7B01" aria-hidden="true"></span>
                </button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </nav>

    <style>
      .userinfo{
        background-color:rgba(250,123,1,.80);
      }
      .usrimg{
        margin: 0 auto;
        width: 200px;
        height: 200px;
        border-radius: 512px;
        box-shadow: 0 0 10px rgba(0,0,0, .3);
        background-image: url("<?php
              require("/var/config.php");
              if (isset($_GET["user"]))
                $user=$_GET["user"];
              else
                $user=$_SESSION["username"];
              $result = mysqli_query($con, "SELECT photourl
                                            FROM PHOTOS
                                            WHERE owner = '" .$user. "' AND photoid IN (SELECT ppid
                                                                                        FROM PEOPLE
                                                                                        WHERE username ='" .$user. "')");
              $photo = mysqli_fetch_array($result);
              if ($photo["photourl"] != "")
                echo "..".$photo["photourl"];
              else
                echo "../images/user.png";
            ?>");
          background-repeat: no-repeat;
          background-position: center;
          background-size: 200px;
      }
      .updateimg{
        width: 40px;
        height: 40px;
        text-align: center;
        background: #101010;
        color: #ccc;
        padding: 9.5px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0,0,0, .5);
        position: relative;
        top: -40px;
        left: 68%;
        margin-bottom: -40px;
        cursor: pointer;
      }
      .fa-spin-hover:hover {
        -webkit-animation: spin 2s infinite linear;
        -moz-animation: spin 2s infinite linear;
        -o-animation: spin 2s infinite linear;
        animation: spin 2s infinite linear;
      }
      .middlerow{
        -webkit-transition:all 1.5s ease-in-out;
        -moz-transition:all 1.5s ease-in-out;
        -o-transition:all 1.5s ease-in-out;
        transition:all 1.5s ease-in-out;

      }

    </style>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar userinfo profileSideBar">
          <div>
            <div class="usrimg"></div>
            <?php
              require("/var/config.php");
              if (isset($_GET["user"]))
                $user=$_GET["user"];
              else
                $user=$_SESSION["username"];
              if ($user == $_SESSION["username"])
                echo '<div data-toggle="modal" data-target="#propic" class="updateimg fa-spin-hover" id="updateimg"><i class="fa fa-lg fa-gear "></i></div>';
            ?>
          </div>
          <hr>
          <h2>
            <?php
              require("/var/config.php");
              if (isset($_GET["user"]))
                $user=$_GET["user"];
              else
                $user=$_SESSION["username"];
              $result = mysqli_query($con, "SELECT fname, minit, lname FROM PEOPLE WHERE username = '" .$user. "'");
              $name = mysqli_fetch_array($result);
              if($name["minit"] == "")
                echo ($name["fname"]." ".$name["lname"]);
              else
                echo ($name["fname"]." ".$name["minit"].". ".$name["lname"]);
            ?>
          </h2>
          <h3>About</h3>
          <p>
            <?php
              require("/var/config.php");
              if (isset($_GET["user"]))
                $user=$_GET["user"];
              else
                $user=$_SESSION["username"];
              $result = mysqli_query($con, "SELECT description FROM PEOPLE WHERE username = '" .$user. "'");
              $desc = mysqli_fetch_array($result);
              echo $desc["description"];
            ?>
          </p>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 main">
          <h2 class="page-header">Posts</h2><a href="#"><span id="addpost" class="pull-right">Add Post <i class="fa fa-plus-square"></i></span></a>

          <?php
            require("/var/config.php");
            if (isset($_GET["user"]))
              $user=$_GET["user"];
            else
              $user=$_SESSION["username"];

            $query = "SELECT * FROM POST_PEOPLE2PEOPLE WHERE reciever = '".$user."' ORDER BY timestamp DESC";

            $msgresult = mysqli_query($con, $query);

            $sender = mysqli_query($con, "SELECT fname, minit, lname FROM PEOPLE WHERE username = '" .$_SESSION["username"]. "'");
            $sendername = mysqli_fetch_array($sender);

            if ($user == $_SESSION["username"])
                {
                  echo "<div class='row usrpost hiddenrow'>
                    <div class='col-sm-2 ownimg'>
                      <div class='statusimg' style='background-image:url(". $_SESSION["imageurl"] .")'></div>
                    </div>
                    <div class='col-sm-8 owntxt'>
                        <h3>".$sendername["fname"]." ".$sendername["lname"]." </h3>
                        <form action='addPost.php' method='POST'>

                          <div class='createGroupDesc__row'>
                            <textarea name='message' type='text' class='posttext' rows='2' placeholder='Write your post here!' required></textarea>
                          </div>

                          <input name='refer' type='hidden' value='http://inceptisol.us.to:6670/profile/profile.php?user=" . $user . "'/>
                          <button name='post' type='submit' class='edit__submit'>Post</button>
                          <input name='reciever' type='hidden' value='" . $user . "'/>

                        </form>
                    </div>
                    <div class='col-sm-2'></div>
                  </div>";
                }
                else
                {
                  echo "<div class='row usrpost hiddenrow'>
                    <div class='col-sm-2'></div>
                    <div style='text-align: right;' class='col-sm-8 usrtxt'>
                        <h3>".$sendername["fname"]." ".$sendername["lname"]." </h3>
                        <form action='addPost.php' method='POST'>

                          <div class='createGroupDesc__row'>
                            <textarea name='message' type='text' class='posttext' rows='2' placeholder='Write your post here!' required></textarea>
                          </div>

                          <input name='refer' type='hidden' value='http://inceptisol.us.to:6670/profile/profile.php?user=". $user . "'/>
                          <button name='post' type='submit' class='edit__submit'>Post</button>
                          <input name='reciever' type='hidden' value='" . $user . "'/>

                        </form>
                    </div>
                    <div class='col-sm-2 userimg' style='margin-left: 13%;'>
                        <div class='statusimg' style='background-image:url(". $_SESSION["imageurl"] .")'></div>
                    </div>
                  </div>";
                }

             if (mysqli_num_rows($msgresult) != 0)
            {
              while ($msg = mysqli_fetch_array($msgresult))
              {
                $result = mysqli_query($con, "SELECT photourl
                                      FROM PHOTOS
                                      WHERE owner = '" .$msg["sender"]. "' AND photoid IN (SELECT ppid
                                                                                  FROM PEOPLE
                                                                                  WHERE username ='" .$msg["sender"]. "')");
                $photo = mysqli_fetch_array($result);
                $nameresult = mysqli_query($con, "SELECT fname, lname FROM PEOPLE WHERE username = '".$msg["sender"]."'");
                $name = mysqli_fetch_array($nameresult);
                if ($photo["photourl"] != "")
                  $imageurl = "..".$photo["photourl"];
                else
                  $imageurl = "../images/user.png";
                if ($user == $msg["sender"])
                {
                  echo "<div class='row usrpost'>
                    <div class='col-sm-2 ownimg'>
                      <a href='profile.php?user=".$msg["sender"]."'>
                        <div class='statusimg' style='background-image:url(". $imageurl .")'></div>
                       </a>
                    </div>
                    <div class='col-sm-8 owntxt'>
                      <a href='profile.php?user=".$msg["sender"]."'>
                        <h3>".$name["fname"]." ".$name["lname"]." </h3>
                      </a>
                      <p>".$msg["message"]."</p>
                    </div>
                    <div class='col-md-2'>
                      <a class='deletepost'><i class='fa fa-times'></i></a>
                    </div>
                  </div>";
                }
                else
                {
                  echo "<div class='row usrpost'>
                    <div class='col-sm-2'>
                      <a class='deletepost pull-right'><i class='fa fa-times'></i></a>
                    </div>
                    <div style='text-align: right;' class='col-sm-8 usrtxt'>
                      <a href='profile.php?user=".$msg["sender"]."'>
                        <h3>".$name["fname"]." ".$name["lname"]." </h3>
                      </a>
                      <p>".$msg["message"]."</p>
                    </div>
                    <div class='col-sm-2 userimg' style='margin-left: 13%;'>
                      <a href='profile.php?user=".$msg["sender"]."'>
                        <div class='statusimg' style='background-image:url(". $imageurl .")'></div>
                       </a>
                    </div>
                  </div>";
                }
              }
            }
          ?>


        </div>
        <style>
          .infobar{
            height: calc(100vh - 70px);
            overflow-y: scroll;
            overflow-x: hidden;
            word-wrap: break-word;
            padding-right: 15px
          }
          a{
            color:#000;
            text-decoration:none;
          }
          .posttext{
            width: 100%;
            height: 75px;
            border:none;
          }
          .hiddenrow{
            -webkit-transition:all 1.5s ease-in-out;
            -moz-transition:all 1.5s ease-in-out;
            -o-transition:all 1.5s ease-in-out;
            transition:all 1.5s ease-in-out;
            height: 0px;
          }
          .friendimg{
              margin-left: 13%;
              width: 75px;
              height: 75px;
              border-radius: 512px;
              box-shadow: 0 0 10px rgba(0,0,0, .3);
              background-repeat: no-repeat;
              background-position: center;
              background-size: 75px;
            }
            .statusimg{
              position: relative;
              margin-left: -23px;
              width: 100px;
              height: 100px;
              border-radius: 512px;
              box-shadow: 0 0 10px rgba(0,0,0, .5);
              background-repeat: no-repeat;
              background-position: center;
              background-size: 100px;
              z-index: 20;
            }
            .inforow{
              height: 50px;
            }
            .usrpost{
              margin: 25px 0;
            }
            .usrtxt{
              padding: 20px 75px;
              background: #fff;
              box-shadow: -1px 0 5px rgba(0,0,0, 0.5);
            }
            .owntxt{
              padding: 20px 75px;
              background: #fff;
              box-shadow: 1px 0 5px rgba(0,0,0, 0.5);
            }
            .owntxt:before, .owntxt:after{
              	position: absolute;
                width: 40%;
                height: 10px;
                content: ' ';
                left: 12px;
                bottom: 12px;
                background: transparent;
                -webkit-transform: skew(-5deg) rotate(-5deg);
                -moz-transform: skew(-5deg) rotate(-5deg);
                -ms-transform: skew(-5deg) rotate(-5deg);
                -o-transform: skew(-5deg) rotate(-5deg);
                transform: skew(-5deg) rotate(-5deg);
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.0);
                -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.0);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.0);
                z-index: -3;
            }
             .usrtxt:before, .usrtxt:after{
              	position: absolute;
                width: 40%;
                height: 10px;
                content: ' ';
                left: 12px;
                bottom: 12px;
                background: transparent;
                -webkit-transform: skew(-5deg) rotate(-5deg);
                -moz-transform: skew(-5deg) rotate(-5deg);
                -ms-transform: skew(-5deg) rotate(-5deg);
                -o-transform: skew(-5deg) rotate(-5deg);
                transform: skew(-5deg) rotate(-5deg);
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                z-index: -1;
            }
            .usrtxt:after{
              	left: auto;
                right: 12px;
                -webkit-transform: skew(5deg) rotate(5deg);
                -moz-transform: skew(5deg) rotate(5deg);
                -ms-transform: skew(5deg) rotate(5deg);
                -o-transform: skew(5deg) rotate(5deg);
                transform: skew(5deg) rotate(5deg);
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.0);
                -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.0);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.0);
            }
            .owntxt:after{
              	left: auto;
                right: 12px;
                -webkit-transform: skew(5deg) rotate(5deg);
                -moz-transform: skew(5deg) rotate(5deg);
                -ms-transform: skew(5deg) rotate(5deg);
                -o-transform: skew(5deg) rotate(5deg);
                transform: skew(5deg) rotate(5deg);
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            }
            .ownimg{
              margin-right: -75px;
              padding-top: 20px;
            }
            .userimg{
              margin-left: -75px;
              padding-top: 20px;
            }
            .tabinfo{
              position: fixed;
              right: -15px;
            }
        </style>

        <div class="col-md-3 tabinfo">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <?php
                      if (isset($_GET["user"]))
                          $user=$_GET["user"];
                        else
                          $user=$_SESSION["username"];

                        $query = "SELECT fname FROM PEOPLE WHERE username = '".$user."'";

                        $result = mysqli_query($con, $query);
                        $name = mysqli_fetch_array($result);

						$query = "SELECT DISTINCT COUNT(*) FROM FRIENDS WHERE userid='".$user."'";
						$result = mysqli_query($con, $query);
						$count = mysqli_fetch_array($result);

                        if ($user != $_SESSION["username"])
                          echo $name["fname"]." follows ".$count["COUNT(*)"]." people:";
                        else
                          echo "You follow " .$count["COUNT(*)"]." people:";
                      ?>


                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body infobar">
                  <?php

                    if (isset($_GET["user"]))
                      $user=$_GET["user"];
                    else
                      $user=$_SESSION["username"];

                    $query = "SELECT fname, lname, username FROM PEOPLE WHERE username IN
                        (SELECT friendid FROM FRIENDS WHERE userid = '".$user."')";

                    $friends_result = mysqli_query($con, $query);


                     if (mysqli_num_rows($friends_result) != 0)
                    {
                      while ($friend = mysqli_fetch_array($friends_result))
                      {
                        $result = mysqli_query($con, "SELECT photourl
                                              FROM PHOTOS
                                              WHERE owner = '" .$friend["username"]. "' AND photoid IN (SELECT ppid
                                                                                          FROM PEOPLE
                                                                                          WHERE username ='" .$friend["username"]. "')");
                        $photo = mysqli_fetch_array($result);
                        if ($photo["photourl"] != "")
                          $imageurl = "..".$photo["photourl"];
                        else
                          $imageurl = "../images/user.png";
                        echo "<div class='row'>
                          <div class='col-xs-3'>
                            <a href='profile.php?user=".$friend["username"]."'>
                              <div class='friendimg' style='background-image:url(". $imageurl .")'></div>
                             </a>
                          </div>
                          <div class='col-xs-9'>
                            <div class='col-xs-7'>
							<a href='profile.php?user=".$friend["username"]."'>
                              <h5>".$friend["fname"]." ".$friend["lname"]." </h5>
                            </a>
							</div>
							<div class='col-xs-5'>
							<form action='removeFriend.php' method='POST'>
					          <button class='btn addbtn btn-default' name='friend' value='".$friend["username"]."' type='submit'>Unfollow</button>
                            </form>
							</div>
                          </div>
                        </div>";
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
				    <?php
						if (isset($_GET["user"]))
                          $user=$_GET["user"];
                        else
                          $user=$_SESSION["username"];

						$query = "SELECT fname FROM PEOPLE WHERE username = '".$user."'";
                        $result = mysqli_query($con, $query);
                        $name = mysqli_fetch_array($result);

						$query = "SELECT DISTINCT COUNT(*) FROM GROUP_MEMBERS WHERE memberid= '".$user."'";
						$result = mysqli_query($con, $query);
						$count = mysqli_fetch_array($result);

						if($user != $_SESSION["username"])
						  echo $name["fname"]." is in ".$count["COUNT(*)"]." groups:";
						else
						  echo "You are in ".$count["COUNT(*)"]." groups:";
					?>

					<a data-toggle="modal" data-target="#groupModal" href="#groupModal"><i class="pull-right fa fa-plus-square"></i></a>

				  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body infobar">
                 <?php
					if (isset($_GET["user"]))
						$user=$_GET["user"];
					else
						$user=$_SESSION["username"];



					$query = "SELECT groupid, gpid, name, description FROM GROUPS WHERE groupid IN
							(SELECT gid FROM GROUP_MEMBERS WHERE memberid = '".$user."')";

					$group_result = mysqli_query($con, $query);

					if(mysqli_num_rows($group_result) != 0)
					{
						while ($group = mysqli_fetch_array($group_result))
						{
							//Picture for group?
              echo "<div class='row'>
                          <div class='col-xs-8'>
                            <a href='profile.php?user=".$group["name"]."'>
                              <h4>".$group["name"]."</h4>
                              <h5>".$group["description"]."</h5>
                            </a>
                          </div>
						  <div class='col-xs-4'>
						    <form action='leavegroup.php' method='POST'>
                              <button class='btn addbtn btn-default' name='group' value='".$group["groupid"]."' type='submit'>Leave<br>Group</button>
                            </form>
						  </div>
                    </div>";

						}
					}
				 ?>
				 </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                     <?php
					    if (isset($_GET["user"]))
                          $user=$_GET["user"];
                        else
                          $user=$_SESSION["username"];

                        $query = "SELECT fname FROM PEOPLE WHERE username = '".$user."'";
                        $result = mysqli_query($con, $query);
                        $name = mysqli_fetch_array($result);

						$query = "SELECT DISTINCT COUNT(*) FROM EVENT_INVITES WHERE invitee = '".$user."'";
						$result = mysqli_query($con, $query);
						$count = mysqli_fetch_array($result);

						if ($user != $_SESSION["username"])
                          echo $name["fname"]." is going to ".$count["COUNT(*)"]." events:";
                        else
                          echo "You are going to " .$count["COUNT(*)"]." events:";
					 ?>

					 <a data-toggle="modal" data-target="#eventModal" href="#eventModal"><i class="pull-right fa fa-plus-square"></i></a>

				   </a>
				</h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body infobar">
                   <?php
						if (isset($_GET["user"]))
							$user=$_GET["user"];
						else
							$user=$_SESSION["username"];


						$query = "SELECT eventid, eventname, description, eventdate FROM EVENTS WHERE eventid IN
								(SELECT eventid FROM EVENT_INVITES WHERE invitee = '".$user."')";

						$event_result = mysqli_query($con, $query);

						if(mysqli_num_rows($event_result) != 0)
						{
							while($event = mysqli_fetch_array($event_result))
							{
								echo 	"<div class='row'>
                      <div class='col-xs-8'>
										 <h3>".$event["eventname"]."</h3>
										 <h5>".$event["eventdate"]."</h5>
										 <h5>".$event["description"]."</h5>
										</div>";

					    if($user == $_SESSION["username"])
						{
						  echo "<div class='col-xs-4'>
						          <form action='leaveevent.php' method='POST'>
                                    <button class='btn addbtn btn-default' name='event' value='".$event["eventid"]."' type='submit'>Leave<br>Event</button>
                                  </form>
					            </div>
					          </div>";
						}


							}
						}
					?>
				</div>
              </div>
            </div>
          </div>
          <style>
            .panel-group {
                height: auto !important;
             }
          </style>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>

<script>
jQuery('input[name="eventDate"]').bind('keyup',function(e){

    var strokes = $(this).val().length;
    if (!((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) && e.keyCode != 8 && e.keyCode != 37 && e.keyCode != 39)
    {
      var thisVal = $(this).val();
      thisVal = thisVal.substr(0, strokes - 1);
      $(this).val(thisVal);
    } else if(strokes === 2 || strokes === 5) {
      if (e.keyCode != 8) {
        var thisVal = $(this).val();
        thisVal += '-';
        $(this).val(thisVal);
      }
    } else if(strokes >= 11) {
       var thisVal = $(this).val();
       thisVal = thisVal.substr(0,10);
       $(this).val(thisVal);
    }
});

$("#addpost").click(function () {
  $(".hiddenrow").css('height', '250px');
  $(".hiddenrow").css('left', '0');
});
</script>

</html>
