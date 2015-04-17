<h4>Form Data inserted:</h4>
<?php
	require_once 'common.php';
	require_once '../classes/doctor.php';
    require_once '../classes/adminManager.php';
    require_once 'password.php';

	$newDoctor = new Doctor;
    $manager = new adminManager;

	// Sets new doctor information
	$newDoctor->setname($_POST['name']);
	$newDoctor->setprofession($_POST['profession']);
	$newDoctor->setemail($_POST['email']);
	$password = $_POST['password'];
	$hash = password_hash($password, PASSWORD_DEFAULT)
	//$newDoctor->setpassword($hash);

	//$check = password_verify($_POST['password'], $hash);
	echo $hash;

	// Prints out new doctor information
	//$newDoctor->__toString();
    
    // Inserts a patient and tests a query
    $manager->addDoctor($newDoctor);

    //redirectAndExit("../adminHome.php");
?>
