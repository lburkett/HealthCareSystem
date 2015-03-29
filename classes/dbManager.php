<?php
	require_once 'patient.php';
  require_once '../data/common.php'; 

  class DatabaseManager {
    //create new database
    protected $db; 
        
    /* Initialize new database file */
    public function __construct(){
      $this->db =  getPDO();
    }
    /* Receives Patient object then inserts it into the database */
    public function addPatient($newPatient) {
      $this->db->exec("INSERT INTO patient(fname, lname, phone, filledOutBy, 
                                            doctorRequested, pain, nausea, 
                                            depression, anxiety, drowsiness, 
                                            average, resolved)
                                            VALUES (newPatient->getFirstName(), 
                                            newPatient->getLastName(), 
                                            newPatient->getPhoneNumber(),
                                            newPatient->getFilled(), 
                                            newPatient->getDoctor(), newPatient->getPain(), 
                                            newPatient->getNausea(), 
                                            newPatient->getDepression(), 
                                            newPatient->getAnxiety(), 
                                            newPatient->getDrowsiness(), 
                                            newPatient->getAverage(), 0);");
		}
		/* Queries the database for a specific doctor name and returns all patient information */
		public function retrievePatient() {
			$patient = $this->db->query(
        'SELECT *
				FROM patient'
			);
			return $patient;
		}
		/* Marks the patient id entered as resolved */
		public function resolvePatient($id) {
            
		}
	}
?>