<?php 
  require 'templates/meta.php'; 
  require_once 'phpscripts/authenticate.php';
    require_once 'phpscripts/password.php';
    require_once 'classes/dbManager.php';

  session_start();

  if(!isLoggedIn()) {
    redirectAndExit('login.php');
  }
  $name = $_SESSION['logged_in_doctor'];
  $doctorid = $_SESSION['logged_in_id'];
  $error = false;
  if($_POST){
    //Verify Old Password
    $manager = new DatabaseManager;
    //$username = getDoctorUsername();
    $oldpwd = $_POST['oldpwd'];
    $newpwd1 = $_POST['newpwd1'];
    $newpwd2 = $_POST['newpwd2'];
    $oldHash = $manager->getDoctorPasswordHash($doctorid);
    
    if (password_verify($oldpwd, $oldHash)) {
      //Verify both new passwords were the same   
      
      if ($newpwd1 === $newpwd2) {
        //Update old password to new password 
        
        $manager->setDoctorPassword($doctorid, $newpwd1);
        
      } 
      else {
        $error = true;
      }
    } 
    else {
      $error = true;
    }
    
  }
?>
<!-- Enter any extra code that should go inside the <head> tag here! Do this ONLY if this page needs a script or something that the other pages do not. -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
// Prevents the jQuery mobile handler from taking over screen switching. 
$(document).bind("mobileinit", function () {
    $.mobile.ajaxEnabled = false;
});
</script>          
<script src="scripts/happy.js"></script>
<script type="text/javascript">
   var happy = {
    notDoneYet: function () {
      alert("Please complete blank fields.");
      return false;
      }
  };
  $(document).ready(function () {
</script>
<?php require 'templates/headerDoctor.php'; ?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->
        <div class="row">
          <div class="u-pull-right logout-row"><a href="phpscripts/logout.php" class="button button-primary u-full-width">Logout</a></div>
        </div>
        <h3>Change Password</h3>
        <p>Please enter the following information: </p>
        <hr>
        <?php 
          if ($_POST && $error == true) { ?>
            <div style="border: 1px solid #ff6666; padding: 6px; margin: 5px;">There was an error in the information you entered, try again.</div>
        <?php
          }
          else if($_POST && $error == false) { ?>
            <div style="border: 1px solid #66ff66; padding: 6px; margin: 5px;">Password changed successfully.</div>
        <?php
          }
        ?>
      <div class="row">
          <div class="four columns"><br></div> 
          <div class="four columns">
            <form class="change-form" method="post">
              <label for="oldpwd" class="u-pull-left">Your Old Password:</label>
              <input type="password" class="u-full-width" placeholder="Old Password" id="oldpwd" name="oldpwd">

              <label for="newpwd1" class="u-pull-left">Your New Password:</label>
              <input type="password" class="u-full-width" placeholder="New Password" id="newpwd1" name="newpwd1">

              <label for="newpwd2" class="u-pull-left">Your New Password Again:</label>
              <input type="password" class="u-full-width" placeholder="New Password Again" id="newpwd2" name="newpwd2">
              <br><br>
              <input class="button-primary" type="submit" value="Change Password" id="change-pwd" data-role="none">
            </form>
          </div>
            <div class="four columns"><br></div>  
        </div>  

    </div>
  </div>

<?php require 'templates/footer.php'; ?>
