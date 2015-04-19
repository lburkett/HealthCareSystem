<?php
require_once 'password.php';
require_once 'common.php';

//random password
function randomPass(){   
    // Creates a random password
    $alpha = range(ord('A'), ord('z'));
    $alphaLength = count($alpha);

    $password = '';
    for($i = 0; $i < 10; $i++) {
        $letterCode = $alpha[rand(0, $alphaLength - 1)];
        $password .= chr($letterCode);
    }
            
    return $password;
}

//updates the database with hashed password
/*function updb($password, $email) {
    $pdo = getPDO();

    $hash = password_hash($password, PASSWORD_DEFAULT);

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
}*/

/*function sendEmail($email, $password){      
    
        $to      = '$email';
        $subject = 'Temp Password';
        $message = 'Password is: '. '$password';
        $headers = 'From: patientcare.spencerbywater.me' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
       
  
}*/
?>
