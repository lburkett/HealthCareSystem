
<!--
*******************************************************
*                                                     *    
*            Test Case: Mark Resolved                 *
*            Completed by: Nikita Bhambhani           *
*                                                     *        
*******************************************************
-->

<?php

require_once '../phpscripts/authenticate.php';
require_once '../classes/unresolvedManager.php';
require_once '../classes/notificationManager.php';
require_once '../classes/patient.php';

class MarkResolvedTest extends PHPUnit_Framework_TestCase
{
  
    //authentication check
  public function testLogin()
  {
     
      $username = 'nbhambha@asu.edu';      
      $rightPass = 'newpass';
      $wrongPass = 'abcd';
      $wrongUser = 'abc@gmail.com';
      //checks for the existing doctor
      $this->assertTrue(loginAttempt($username, $rightPass ));
      
      //checks for right username but wrong password
      $this->assertFalse(loginAttempt($username, $wrongPass )); 
      
      //checks for doctor who doesn't exist
      $this->assertFalse(loginAttempt($wrongUser, $wrongPass )); 
    
  }
    
    //checking unresolved flag for patient
    public function testUnresolvedReports()
    {
        $test = new Patient;
        $manager = new unresolvedManager;
        $test = $manager->retrieveUnresolved();
        $row = $test->fetch(PDO::FETCH_ASSOC);
        
        $nameRight = 'Bat';
        $nameWrong = 'Bobby';
        $name = 'Nisha';
                
        //patient who is unresolved
        $this->assertEquals($nameRight, $row['fname']);   
        
        //patient who is resolved
        $this->assertNotEquals($nameWrong, $row['fname']);
        
        //patient who doesn't exist
        $this->assertNotEquals($name, $row['fname']);
        
    
    }

    
   public function testResolved()
    {   
        $data = new DatabaseManager;      
        $nm = new notificationManager;    
               
        //patient who is  already resolved
        $p1 = $data->getResolve(1);
        $this->assertEquals(1, $p1);
        
        //test resolvePatient function with an unresolved patient
        $nm->resolvePatient(5);
        $p2 = $data-> getResolve(5);
        $this->assertEquals(1, $p2);
        
    }
}
?>