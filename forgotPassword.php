<?php
    require 'templates/meta.php';
    require_once 'phpscripts/common.php';
    require_once 'phpscripts/forgot.php';
    require_once 'phpscripts/password.php';

    $tempPass = '';

    if ($_POST) {
        $pdo = getPDO();
    
        //Get user's email id
        $email = $_POST['email'];

        //Find email in the database
        $stmt = $pdo->prepare("SELECT
                                    *
                                FROM
                                    doctor
                                WHERE
                                    email = :username"); 
        
    
        $stmt->bindParam(':username', $username);
        $username = $email;
        $stmt->execute();

        // Check to make sure the email exists, if it does then continue
        if ($stmt) {
            $tempPass = randomPass();
            //sendEmail($email, $tempPass);

            //updb($tempPass, $email);

            // Updates the specified user's password, can't move 
            //  into seperate block for whatever reason so here it is.
            $hash = password_hash($tempPass, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("UPDATE
                                      doctor
                                    SET
                                      password = :password
                                    WHERE
                                      email = :username"); 
        
    
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $username = $email;
            $password = $hash;

            $stmt->execute();
            
            //redirectAndExit('confirm.php'); //Change confirm.php so that it shows for ~5 sec            
        }
        else {
            // show error
        }
    }
?>

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
    
<!--   making sure that textfield is not left empty     -->    
<script src="scripts/happy.js"></script>
<script type="text/javascript">

	var happy = {
    notDoneYet: function () {
    	alert("Please complete blank fields.");
    	return false;
	    }
	};
	$(document).ready(function () {
        $('.forgotPass-form').isHappy({
          fields: {
           
            '#email': {
            	required: true,
            }
          },
          unHappy: happy.notDoneYet
        });
      });
</script>
        
        <h3>Forgot Password</h3>
      <p>Please enter the email linked with your username </p>
      <!--<p>Temporary Password: <?php //echo $tempPass; ?></p>-->
      <?php 
        if ($tempPass) {
          echo "Temporary Password: ".$tempPass;
        }
      ?>
        <hr>
	    <div class="row">
          <div class="four columns"><br></div> 
  				<div class="four columns">
  					<form class="forgotPass-form" method="post">
  						<label for="email" class="u-pull-left">Email </label>
  						<input type="text" class="u-full-width" placeholder="Email Address" id="email" name="email">
                        
  						
                        <br><br>
                        <!--     comment the next line and use the commented one in actual c                               -->
                        <!--<a href="forgotPassword.php" class="button button-primary" style="margin-left: 2px;">Submit</a>-->
<!--                            
Uncomment the next line in actual program
Blank field won't get checked right now-->
  						
              <input class="button-primary" type="submit" value="Submit" id="forgot-pwd" data-role="none">
  					</form>
  				</div>
            <div class="four columns"><br></div>  
        </div>  

    </div>
  </div>
