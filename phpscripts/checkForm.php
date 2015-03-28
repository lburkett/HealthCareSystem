<?php
	require '../classes/patient.php';

	$newPatient = new Patient;

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

?>