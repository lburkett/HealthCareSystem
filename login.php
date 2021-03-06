<?php
  require 'templates/meta.php';
  require_once 'phpscripts/authenticate.php';
  require_once 'phpscripts/common.php';

  session_start();
  if (isLoggedIn()) {
    redirectAndExit('doctorHome.php');
  }
  $username = '';
  if ($_POST) {
    $username = $_POST['username'];
    $success = loginAttempt($username, $_POST['password']);

    if ($success) {
      $name = nameLookup($username);
      $id = idLookup($username);
      login($username, $name, $id);

      //header('Location: doctorHome.php');
      redirectAndExit('doctorHome.php');
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
//Using the happy.js plugin for quick and easy form validation
	var happy = {
    notDoneYet: function () {
    	alert("Please complete blank fields.");
    	return false;
	    }
	};
	$(document).ready(function () {
        $('.login-form').isHappy({
          fields: {
            '#username': {
              required: true,
            },
            '#password': {
              required: true,
            }
          },
          unHappy: happy.notDoneYet
        });
      });
</script>

<?php require 'templates/header.php'; ?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->
      <!-- Write things here, do php wizardy. -->
        
        <div class="section">

        <h3>Doctor Login</h3>
            <?php // Just temporary, perhaps replace with a better system to check for this stuff? ?>
            <hr>
            <?php if ($username): ?>
                <div style="border: 1px solid #ff6666; padding: 6px;">
                  The username or password is incorrect, try again.
                </div>
            <?php endif ?> 
            <!--<form  class="login" method="post">-->
            <!-- username textbox -->
            <div class="row">
              <div class="four columns"><br></div> 
      				<div class="four columns">
      					<form class="login-form" method="post">
      						<label for="username" class="u-pull-left">Username</label>
      						<input type="text" class="u-full-width" placeholder="Username" id="username" name="username">
      						
      						<label for="password" class="u-pull-left">Password</label>
      						<input type="password" class="u-full-width" placeholder="Password" id="password" name="password">
      						
      						<input class="button-primary" type="submit" value="Login" id="login-button" data-role="none">
      					</form>
      				</div>
                <div class="four columns"><br></div>  
            </div>  
 
            <div class="row">
                <!-- forgot password link -->
                <a href ="forgotPassword.php">Forgot Password?</a><br>
            </div>
              
        </div>
    </div>
  </div>

<?php require 'templates/footer.php'; ?>
