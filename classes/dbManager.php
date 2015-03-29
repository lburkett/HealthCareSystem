<?php
    require_once 'patient.php';
    require_once   '../data/common.php'; 

    class DatabaseManager {
		/* Initialize new database file */
        
        //create new database
         protected $db; 
        
        
  
        
		//constructor
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
                                               newPatient->getAverage(),0); ");
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
        
        //needs data from doctor class i presume
		public function resolvePatient($id) {
            
		}
	}
?>