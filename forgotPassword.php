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

<?php require 'templates/footer.php'; ?>
<<<<<<< HEAD

<?php
require_once 'phpscripts/common.php';
require 'phpscripts/password.php';
session_start();

		$pdo = getPDO();     
        		
			
            //Create unique identifier
           $id = md5(uniqid(rand(), 1));
            
        //Get user's email id
            $address = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
            //Find email in the database
//            $stmt = $pdo->prepare("SELECT
//                                            *
//                                       FROM
//                                            doctor
//                                       WHERE
//                                            email = '".$email."'");
//    
//                $stmt->execute();
//                if email not found
//                if(){}
                    
               // else{
                $query=$pdo->prepare(" UPDATE 
                                                password                
                                        SET
                                                hash=
                                        WHERE
                                                email=" 
                                    );
                $query->bind_param('ss', $id, $address);
                $query->execute();
                $email = <<<email
                
                Dear User,
                Click on the following link to reset your password:
                http://patientcar.spencerbywater.me/resetPassword.php?id=$id
                email;
                    
                    //Email user password reset options
                    mail($address, "Password Recovery", $email, "From: services@patientcare.spencerbywater.me");
                   // echo "<p>Instructions regarding 
                
//           // if($email == $stmt)
//            
//                //$query = "SELECT email FROM doctor WHERE email = '.$email."'";
//                $newpassword = $this->random_ascii_string(64);
//                $sha1 = sha1($newpassword);
//                $query = "SELECT username, token FROM doctor WHERE email = '$email'";
//                $username = "";
//                $token = "";
// //               foreach($this->database->query($query) as $data) { $username = $data["username"]; $token = $data["token"]; break; }
//                // step 2a: if there was no user to reset a password for, stop.
//                if($username == "" || $token == "") return false;
//                // step 2b: if there was a user to reset a password for, reset it.
//                $dbpassword = $this->token_hash_password($username, $sha1, $token);
//                $update = "UPDATE doctor SET password = '$dbpassword' WHERE email= '$email'";
//                $this->database->exec($update);
//                // step 3: notify the user of the new password
//                $from = User::MAILER_NAME;
//                $replyto = User::MAILER_REPLYTO;
//                $domain_name = User::DOMAIN_NAME;
//                $subject = User::DOMAIN_NAME . " password reset request";
//                $body = <<<EOT
//        Hi,
//        this is an automated message to let you know that someone requested a password reset for the $domain_name user account with user name "$username", which is linked to this email address.
//        We've reset the password to the following 64 character string, so make sure to copy/paste it without any leading or trailing spaces:
//        $newpassword
//        If you didn't even know this account existed, now is the time to log in and delete it. How dare people use your email address to register accounts! Of course, if you did register it yourself, but you didn't request the reset, some jerk is apparently reset-spamming. We hope he gets run over by a steam shovel driven by rabid ocelots or something.
//        Then again, it's far more likely that you did register this account, and you simply forgot the password so you asked for the reset yourself, in which case: here's your new password, and thank you for your patronage at $domain_name!
//        - the $domain_name team
//    EOT;
//                $headers = "From: $from\r\n";
//                $headers .= "Reply-To: $replyto\r\n";
//                $headers .= "X-Mailer: PHP/" . phpversion();
//                mail($email, $subject, $body, $headers);
//		
        
    
    
            

?>
=======
>>>>>>> origin/master
