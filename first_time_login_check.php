<?php
  require("/var/config.php");
  if (isset($_SESSION["firsttimelogin"])) 
  {
  	echo '
    <!-- Settings Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <form action="updateProfile/processEdit_description.php" method="POST">
                <input name="refer" type="hidden" value="http://inceptisol.us.to:6670/profile/profile.php"/>
                <textarea name="description" class="edit__input description" placeholder="Description" rows="6"></textarea>
                <button name="update_description" type="submit" class="edit__submit">Set Description</button>
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
    ';
    exit();
  }
?>
