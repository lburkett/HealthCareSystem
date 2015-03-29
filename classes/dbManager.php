<?php
    require 'patient.php';

    class DatabaseManager {
		/* Initialize new database file */
        
        //create new database
         protected $db; 
        //entries
        protected $sql;
        //
        protected $resolved;
  
        
		//constructor
        public function __construct(){
            $db =  new PDO('sqlite:patientDb_PDO.sqlite');
            $sql = "CREATE TABLE Patients(
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
            $resolved = 0;
        }
        
        /* Receives Patient object then inserts it into the database */
		public function addPatient($newPatient) {
                
               
               $db->exec("INSERT INTO patients(fname, lname, phone, filledOutBy, 
                                                doctorRequested, pain, nausea, 
                                                depression, anxiety, drowsiness, 
                                                average, resolved 
                                               VALUES ($newPatient->getPatient(), $newPatient->getLastName(), $newPatient->getPhoneNumber(),
                                               $newPatient->getFilled(), $newPatient->getDoctor(), $newPatient->getPain(), $newPatient->getNausea(), 
                                               $newPatient->getDepression(), $newPatient->getAnxiety(), $newPatient->getDrowsiness(), 
                                               $newPatient->getAverage(), $resolved); ";
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