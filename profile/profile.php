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
            <h4 class="modal-title" id="myModalLabel">First Time Login Setup</h4>
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

                  <div class="editProfile_row">
                    
                    <?php 
                      if (isset($_GET["user"]))
                      {
                        if ($_GET["user"] == $_SESSION["username"]) 
                          echo '<form action="../upload.php" method="post" enctype="multipart/form-data">
                                  Select image to upload:
                                  <input type="file" name="fileToUpload" id="fileToUpload">
                                  <input type="submit" value="Upload Image" name="submit" class="edit__submit">
                                </form>';
                      }
                      else
                      {
                        echo '<form action="../upload.php" method="post" enctype="multipart/form-data">
                                Select image to upload:
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload Image" name="submit" class="edit__submit">
                              </form>';
                      }
                    ?>
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
        margin-left: 13%;
        width: 70%;
        border-radius: 512px;
        box-shadow: 0 0 10px rgba(0,0,0, .3)
      }
    </style>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar userinfo profileSideBar">
          <div>
            <img class="usrimg" src=
            <?php
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
            ?>
            >
            <?php 
              if (isset($_GET["user"]))
              {
                if ($_GET["user"] == $_SESSION["username"]) 
                  echo '<form action="../upload.php" method="post" enctype="multipart/form-data">
                          Select image to upload:
                          <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                          <input type="file" name="fileToUpload" id="fileToUpload">
                          <input type="submit" value="Upload Image" name="submit">
                        </form>';
              }
              else
              {
                echo '<form action="../upload.php" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                      </form>';
              }
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
          <h2 class="page-header">Posts</h2>
              
          <?php
            require("/var/config.php");
            if (isset($_GET["user"]))
              $user=$_GET["user"];
            else
              $user=$_SESSION["username"];
            
            $query = "SELECT * FROM POST_PEOPLE2PEOPLE WHERE reciever = '".$user."' ORDER BY timestamp DESC";
                    
            $msgresult = mysqli_query($con, $query); 
  
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
                echo "<div class='row'>
                  <div class='col-xs-2'>
                    <a href='profile.php?user=".$msg["sender"]."'>
                      <img class='statusimg' src='".$imageurl."'/>
                     </a>
                  </div>
                  <div class='col-xs-10'>
                    <a href='profile.php?user=".$msg["sender"]."'>
                      <h3>".$name["fname"]." ".$name["lname"]." </h3>
                    </a>
                    <p>".$msg["message"]."</p>
                  </div>
                </div>";
              }
            }
          ?>
            
          
        </div>
        
        <style>
          .infobar{
            max-height: calc(70vh);
            min-height: calc(70vh);
            overflow-y: scroll;
            overflow-x: hidden; 
            word-wrap: break-word;
            padding-right: 15px
          }
          a{
            color:#000;
            text-decoration:none;
          }
          .friendimg{
              width: 100%;
              border-radius: 512px;
              box-shadow: 0 0 10px rgba(0,0,0, .3)
            }
            .statusimg{
              width: 100%;
              border-radius: 50px;
              box-shadow: 0 0 10px rgba(0,0,0, .3)
            }
            .inforow{
              max-height: calc(7vh);
              min-height: calc(7vh);
            }
        </style>
        
        <div class="col-md-3 tabinfo">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Friends
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body infobar">
                  <?php
					
                    $query = "SELECT fname, lname, username FROM PEOPLE WHERE username IN
                        (SELECT friendid FROM FRIENDS WHERE userid = '".$_SESSION["username"]."')";
                    
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
                              <img class='friendimg' src='".$imageurl."'/>
                             </a>
                          </div>
                          <div class='col-xs-9'>
                            <a href='profile.php?user=".$friend["username"]."'>
                              <h5>".$friend["fname"]." ".$friend["lname"]." </h5>
                            </a>
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
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Groups
                  </a>
                  <a data-toggle="modal" data-target="#groupModal" href="groupModal"><i class="fa fa-plus-square"></i></a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body infobar">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Events
                  </a>
                   <a data-toggle="modal" data-target="#eventModal" href="eventModal"><i class="fa fa-plus-square"></i></a>
                </h4>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body infobar">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
</html>
