<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="login.js"></script>
    <script type="text/javascript"></script>
    <script type="text/javascript" src="../js/moment.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="settings.css"/>
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css"/>
    
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
               
               <div class="editProfile_row">               
                <button data-toggle="modal" data-target="#areyousureModal" class="edit__submit" id="updateimg">Delete Account</button>
               </div>
               
              </div>
             </div>
           </div>
           </div>
          </div>
        </div>
      </div>
    </div>

<!-- Are you sure modal -->    
    <div class="modal fade" id="areyousureModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
          </div>
          <div class="modal-body">
           <div class="cont">
           <div class = "check">
            <div class="editProfile">
              <div class="editProfile_form">
               
               <div class="editProfile_row">
                <form action="deleteProfile.php" method="POST">
                  <input name="delete" type="hidden" value="true"/>
                  <button name="update_description" type="submit" class="edit__submit">Yes</button>
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
          <a class="navbar-brand" href="feed.php">
            <object id="logoO" type="image/svg+xml" data="../images/logo.svg" width="25" height="25"></object>
            <object id="logoW" type="image/svg+xml" data="../images/logow.svg" width="25" height="25" style="position: relative; left: -30.25px; opacity: 0;"></object>
            <span style="position: relative; top: -5.5px; left: -37.25px;">rangeMesa</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="profile.php"><i class="fa fa-user"></i>
            <?php
                echo $_SESSION["fname"]; //First name of current user
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
                $user=$_SESSION["username"]; //Who's calling?
              //Find photo url
              $result = mysqli_query($con, "SELECT photourl
                                            FROM PHOTOS
                                            WHERE owner = '" .$user. "' AND photoid IN (SELECT ppid
                                                                                        FROM PEOPLE
                                                                                        WHERE username ='" .$user. "')");
              $photo = mysqli_fetch_array($result);
              if ($photo["photourl"] != "")
                echo "..".$photo["photourl"]; //Insert it
              else
                echo "../images/user.png";
            ?>");
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
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
      .deletepost:hover{
        color: #FA7B01;
      }
    </style>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar userinfo profileSideBar">
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-2 main">
          <h2 class="page-header">Posts</h2><a href="#"><span id="addpost" class="pull-right">Add Post <i class="fa fa-plus-square"></i></span></a>

          <?php
            // Filling page with post's directed at user
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
                          <button id='nope' type='button' class='edit__submit'>Cancel</button>
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
                          <button id='nope' type='button' class='edit__submit'>Cancel</button>
                          <input name='reciever' type='hidden' value='" . $user . "'/>

                        </form>
                    </div>
                    <div class='col-sm-2 userimg' style='margin-left: -5%;'>
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
                $time = strtotime($msg["timestamp"]);
                $sentTime = date("F j, Y, g:i a", $time);
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
                    <div class='col-md-2'>";
                      if ($msg["sender"] == $_SESSION["username"])
                        echo "<a  href='deletepost.php?user=".$user."&postid=".$msg["postid"]."' class='deletepost'><i class='fa fa-times'></i></a>";
                    echo "<p>".$sentTime."</p>
                    </div>
                  </div>";
                }
                else
                {
                  echo "<div class='row usrpost'>
                    <div class='col-sm-2'>";
                    if ($user == $_SESSION["username"] || $msg["sender"] == $_SESSION["username"])
                      echo "<a href='deletepost.php?user=".$user."&postid=".$msg["postid"]."' class='deletepost pull-right'><i class='fa fa-times'></i></a>";
                    echo "<p>".$sentTime."</p>
                    </div>
                    <div style='text-align: right;' class='col-sm-8 usrtxt'>
                      <a href='profile.php?user=".$msg["sender"]."'>
                        <h3>".$name["fname"]." ".$name["lname"]." </h3>
                      </a>
                      <p>".$msg["message"]."</p>
                    </div>
                    <div class='col-sm-2 userimg'>
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
            padding: 20px;
            margin:-10px;
            position: relative;
            height: 0px;
            left: -75vw;
            margin-right: 35px;
            overflow:hidden;
          }
          .friendimg{
              margin-left: 13%;
              width: 75px;
              height: 75px;
              border-radius: 512px;
              box-shadow: 0 0 10px rgba(0,0,0, .3);
              background-repeat: no-repeat;
              background-position: center;
              background-size: cover;
            }
            .statusimg{
              position: relative;
              margin-left: 0;
              width: 100px;
              height: 100px;
              border-radius: 512px;
              box-shadow: 0 0 10px rgba(0,0,0, .5);
              background-repeat: no-repeat;
              background-position: center;
              background-size: cover;
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
              margin-right: -9%;
              padding-top: 20px;
            }
            .userimg{
              margin-left: -6%;
              padding-top: 20px;
            }
            .tabinfo{
              position: fixed;
              right: -15px;
            }
        </style>

        <div class="col-md-2 tabinfo">
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
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
$("#nope").click(function () {
  $(".hiddenrow").css('height', '0px');
  $(".hiddenrow").css('left', '-75vw');
});
</script>

</html>
