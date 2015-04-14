<h4>Form Data inserted:</h4>
<?php
	require_once 'common.php';
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
    ?>
    <hr>
    <h4>List of all Patients Currently in the database</h4>
    <?php  
    // Prints out the fname and lname column for each patient in the database
    // (We can format this better but for now it works)
    /*
    while($row = $newPatient->fetch(PDO::FETCH_ASSOC)) {
    	echo "ID: " . $row['id']  . " First Name: "; 
        echo $row['fname'] . " Last Name: ";
        echo $row['lname'] . " Phone: ";
        echo $row['phone'] . " FilledOutBy: " . $row['filledOutBy'] . " doctorRequested: " . $row['doctorRequested'] . " Pain: ";
		echo $row['pain'] . " Nausea: " . $row['nausea'] . " Depression: " . $row['depression'] . " Anxiety: " . $row['anxiety'] . " Drowsiness: ";
		echo $row['drowsiness'] . " Average: " . $row['average'] . " Resolved: " . $row['resolved'];
		echo "<br>";    
    }
    echo "<hr>";
    echo "<a href=\"../index.php" . "\">Return to home</a>";
    */
    redirectAndExit("../formReturn.php");
?>
