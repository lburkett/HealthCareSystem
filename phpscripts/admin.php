<?php
	require_once 'common.php';
	require_once '../classes/doctor.php';
    require_once '../classes/adminManager.php';

	$newDoctor = new Doctor;
    $manager = new adminManager;

	// Sets new patient information
	$newDoctor->setName($_POST['name']);
	$newDoctor->setProfession($_POST['profession']);
	$newDoctor->setEmail($_POST['email']);
	$newDoctor->setPassword($_POST['password']);
    
    // Inserts a doctor and tests a query
    $manager->addDoctor($newDoctor);
    $newDoctor = $manager->retrieveDoctor();
    
    // Returns to the adminview
    redirectAndExit("../formReturn.php");

    // The contents should be moved to the admin view after the admin is logged in
?>
