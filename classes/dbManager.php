<?php
    require 'patient.php';

    class DatabaseManager {
		/* Initialize new database file */
        
        //create new database
         protected $db = new PDO('sqlite:patientDb_PDO.sqlite');
        
        //entries
        protected $sql="CREATE TABLE Patients(
                id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                fname VARCHAR NOT NULL,
                lname VARCHAR NOT NULL,
                phone VARCHAR NOT NULL,
                filledOutBy VARCHAR NOT NULL,
                doctorRequested VARCHAR, 

                /* SYMPTOMS */
                 pain INTEGER NOT NULL,
                nausea INTEGER NOT NULL,
                depression INTEGER NOT NULL,
                anxiety INTEGER NOT NULL,
                drowsiness INTEGER NOT NULL,
                average REAL NOT NULL,

                resolved INTEGER NOT NULL /* 0 - FALSE, 1 - TRUE */)";
                
                protected $resolved=0;
  
        
		/* Receives Patient object then inserts it into the database */
		public function addPatient($newPatient) {
            newPatient = new Patient;
                $fname = $newPatient->setFirstName($_POST['firstName']);
	           $lname = $newPatient->setLastName($_POST['lastName']);
	           $phone = $newPatient->setPhoneNumber($_POST['phone']);
	           $filledBy = $newPatient->setFilled($_POST['filledOutBy']);
	           $doctorRequested = $newPatient->setDoctor($_POST['doctorRequested']);

	           $pain = $newPatient->setPain($_POST['pain']);
	           $nausea = $newPatient->setNausea($_POST['nausea']);
	           $depression = $newPatient->setDepression($_POST['depression']);
	           $anxiety = $newPatient->setAnxiety($_POST['anxiety']);
	           $drowsiness = $newPatient->setDrowsiness($_POST['drowsiness']);
	           $average = $newPatient->calculateAverage();
               
               $db->exec("INSERT INTO patients(fname, lname, phone, filledOutBy, 
                                                doctorRequested, pain, nausea, 
                                                depression, anxiety, drowsiness, 
                                                average, resolved 
                                               VALUES ($fname, $lname, $phone, $filledBy, 
                                               $doctorRequested, $pain, $nausea, 
                                               $depression, $anxiety, $drowsiness, 
                                               $average, $resolved) )";
		}
		/* Queries the database for a specific doctor name and returns all patient information */
		public function retrievePatient($doctor) {
			$pdo = getPDO();
			$patient = $pdo->query(
				'SELECT *
				FROM patient
				WHERE doctorRequested == $doctor'
			);
			return $patient;
		}
		/* Marks the patient id entered as resolved */
        //needs data from doctor class i presume
		public function resolvePatient($id) {
            
		}
	}
?>