<?php
    require 'templates/meta.php';
    require_once 'phpscripts/common.php';
    //require_once 'phpscripts/password.php';
    require_once 'phpscripts/forgot.php';
    
    if ($_POST) {
        $pdo = getPDO();
    
        //Get user's email id
        $email = $_POST["email"];
        $address = filter_var($email, FILTER_SANITIZE_EMAIL);  // inbuilt php function?
    
        //Find email in the database
        $stmt = $pdo->prepare("SELECT
                                    *
                                FROM
                                    doctor
                                WHERE
                                    email = :username");
    
        $stmt->bindParam(':username', $username);
        $username = $address;
        $stmt->execute();
    
        // Check to make sure the email exists, if it does then continue
        if ($stmt) {
            // execute code
            // show confirmation
            redirectAndExit('confirm.php'); //Change confirm.php so that it shows for ~5 sec
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
        <hr>
	    <div class="row">
          <div class="four columns"><br></div> 
  				<div class="four columns">
  					<form class="forgotPass-form" method="post">
  						<label for="email" class="u-pull-left">Email </label>
  						<input type="text" class="u-full-width" placeholder="Email Address" id="email" name="email">
                        
  						
                        <br><br>
                        <!--     comment the next line and use the commented one in actual c                               -->
                        <a href=confirm.php class="button button-primary" style="margin-left: 2px;">Submit</a>
<!--                            
Uncomment the next line in actual program
Blank field won't get checked right now-->
  						
<!--<input class="button-primary" type="submit" value="Submit" id="forgot-pwd" data-role="none">-->
  					</form>
  				</div>
            <div class="four columns"><br></div>  
        </div>  

    </div>
  </div>
