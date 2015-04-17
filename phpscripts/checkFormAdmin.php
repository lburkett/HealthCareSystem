<h4>Form Data inserted:</h4>
<?php
	require_once 'common.php';
	require_once '../classes/doctor.php';
    require_once '../classes/adminManager.php';

	$newDoctor = new Doctor;
    $manager = new adminManager;

	// Sets new patient information
	$newDoctor->setname($_POST['name']);
	$newDoctor->setprofession($_POST['profession']);
	$newDoctor->setemail($_POST['email']);
	$newDoctor->setpassword($_POST['password']);

	// Prints out new patient information
	$newDoctor->__toString();
    
    // Inserts a patient and tests a query
    $manager->addDoctor($newDoctor);

    redirectAndExit("../adminHome.php");
?>
