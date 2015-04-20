<?php
    require 'templates/meta.php';
    require_once 'phpscripts/common.php';
    require_once 'phpscripts/forgot.php';
    require_once 'phpscripts/password.php';
    require_once 'classes/class.phpmailer.php';
    require_once 'classes/class.smtp.php';

    $tempPass = '';
    $sent = false;

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
        if ($stmt && $email != 'admin') {
            $tempPass = randomPass();
            //sendEmail($email, $tempPass);
            $mail = new PHPMailer;
            $mail->isSMTP();
            //$mail->SMTPDebug = 2;   //Uncomment if something is going wrong--used for debug messages.
            
            require 'phpscripts/details.php';
            /*IN ORDER FOR forgotPassword.php TO WORK, YOU MUST MAKE YOUR OWN detail.php FILE,
            FORMATTED AS FOLLOWS:
            $mail->Host = 'smtphost';
            $mail->SMTPAuth = true;
            $mail->Username = 'username';
            $mail->Password = 'password';
            //$mail->SMTPSecure = 'tls';
            $mail->Port = 587; //most commonly 587
            $mail->From = 'from@email.com';
            */

            $mail->FromName = 'Efferent Patient Care';
            $mail->addAddress($email,$email);
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset - Efferent Patient Care System';
            $mail->Body = 'Your new temporary password is: ' . $tempPass . "<br><a href=\"http://patientcare.spencerbywater.me\">Return to Efferent Patient Care System</a>";
            $mail->AltBody = 'Your new temp pwd is: ' . $tempPass;
            if(!$mail->send()) {
              //echo 'Email fail' . $mail->ErrorInfo;
            } else {
              $sent = true;
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
            }   
        }
        //$sent = false already so no need for else statement
    }
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>    
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
<?php require 'templates/header.php'; ?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->   
      <h3>Forgot Password</h3>
      <p>Please enter the email linked with your username:</p>
      <hr>
      <?php 
        if ($sent && $tempPass) { ?>
          <div style="border: 1px solid #66ff66; padding: 6px; margin: 5px;">Your password has been reset, check your email to view the new password.</div>
      <?php
        } else if ($_POST && !$sent) { ?>
          <div style="border: 1px solid #ff6666; padding: 6px; margin: 5px;">Something went wrong. Make sure your email was entered in properly, or try again later.</div>
      <?php
        }
      ?>
      <br>
	    <div class="row">
          <div class="four columns"><br></div> 
  				<div class="four columns">
  					<form class="forgotPass-form" method="post">
  						<label for="email" class="u-pull-left">Email </label>
  						<input type="text" class="u-full-width" placeholder="Email Address" id="email" name="email">
              <br><br>
              <input class="button-primary" type="submit" value="Submit" id="forgot-pwd" data-role="none">
  					</form>
  				</div>
          <div class="four columns"><br></div>  
        </div>  

    </div>
  </div>
