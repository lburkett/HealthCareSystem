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
	$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$newDoctor->setpassword($hash);

	//$check = password_verify($_POST['password'], $hash);

	// Prints out new doctor information
	//$newDoctor->__toString();
    
    // Inserts a doctor and tests a query
    $manager->addDoctor($newDoctor);

    redirectAndExit("../adminhome.php");
?>
