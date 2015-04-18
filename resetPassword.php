<?php require 'templates/meta.php'; ?>

<?php require 'templates/header.php'; ?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->
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
        $('.reset-form').isHappy({
          fields: {
            '#newpwd1': {
              required: true,
            },
            '#newpwd2': {
            	required: true,
            }
          },
          unHappy: happy.notDoneYet
        });
      });
</script>
        
        <h3>Reset Password</h3>
      <p>Please enter new password </p>
        <hr>
	    <div class="row">
          <div class="four columns"><br></div> 
  				<div class="four columns">
  					<form class="reset-form" method="post">

                        <!--  This is exactly like change password so the same id have been used for all						-->
                        <label for="newpwd1" class="u-pull-left">Your New Password</label>
  						<input type="password" class="u-full-width" placeholder="New Password" id="newpwd1" name="newpwd1">

  						<label for="newpwd2" class="u-pull-left">Confirm New Password</label>
  						<input type="password" class="u-full-width" placeholder="Confirm New Password" id="newpwd2" name="newpwd2">
  						<br><br>
                        
                        <!--  This is exactly like change password so the same id have been used for all						-->
  						<input class="button-primary" type="submit" value="Submit" id="change-pwd" data-role="none">
                        
  					</form>
  				</div>
            <div class="four columns"><br></div>  
        </div>  

    </div>
  </div>

<?php require 'templates/footer.php'; ?>
