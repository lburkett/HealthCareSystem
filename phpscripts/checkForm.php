<?php
	//require '../classes/patient.php';
    require '../classes/dbManager.php'; 

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

	// Prints out new patient information
	$newPatient->__toString();
    
    $manager->addPatient($newPatient);
    $newPatient=$manager->retrievePatient();
    
    while($row = $newPatient->fetch(PDO::FETCH_ASSOC))
    {   
        echo $row['fname'];
        echo $row['lname'];
    }

?>