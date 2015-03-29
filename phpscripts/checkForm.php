<?php
	require_once '../classes/patient.php';
    require_once '../classes/dbManager.php'; 

	$newPatient = new Patient;
    $manager = new DatabaseManager;

	// Sets new patient information
	$newPatient->setFirstName($_POST['firstName']);
	$newPatient->setLastName($_POST['lastName']);
	$newPatient->setPhoneNumber($_POST['phone']);
	$newPatient->setFilled($_POST['filledOutBy']);
	$newPatient->setDoctor($_POST['doctorRequested']);

	$newPatient->setPain($_POST['pain']);
	$newPatient->setNausea($_POST['nausea']);
	$newPatient->setDepression($_POST['depression']);
	$newPatient->setAnxiety($_POST['anxiety']);
	$newPatient->setDrowsiness($_POST['drowsiness']);
	$newPatient->calculateAverage();
	$newPatient->setResolved(0);

	// Prints out new patient information
	$newPatient->__toString();
    
    // Inserts a patient and tests a query
    $manager->addPatient($newPatient);
    $newPatient = $manager->retrievePatient();
    
    // Prints out the fname and lname column for each patient in the database
    while($row = $newPatient->fetch(PDO::FETCH_ASSOC)) {   
        echo $row['fname'] . " ";
        echo $row['lname'] . "<br>";
    }
?>