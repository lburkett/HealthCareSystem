<?php
	  require_once 'patient.php';
	  require_once 'dbManager.php';
   	class patientHistoryManager {
        protected $db; 
        
        /* Connect to database file */
        public function __construct() {
            try {
                $this->db = getPDO();
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        /* Disconnect the database file */
        public function __destruct() {
            $this->db = NULL;
        }
	    /* Queries the database and returns all patient information */
        public function retrieveHistory() {
            return $this->db->query("SELECT * FROM patient ORDER BY id DESC LIMIT 20");
        }

        //NOT NEEDED BECAUSE notificationManager ALREADY HAS THIS FUNCTION
        /* Marks the patient id entered as resolved 
        public function resolvePatient($doc, $p) {
            $stmt = $this->db->prepare("UPDATE patient SET resolved = 1 WHERE doctorRequested = '".$doc."' AND fname = '".$p."'");
            $stmt->execute();
        }
        */

	}
?>
