<?php
	  require_once 'patient.php';
	  require_once 'dbManager.php';
   	class notificationManager {
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
	/* Queries the database for a specific doctor name and returns all patient information */
	public function retrieveNotification($Doc) {
	return $this->db->query("SELECT * FROM patient WHERE doctorRequested = '".$Doc."' OR doctorRequested = 'Any'");
		}
	/* Marks the patient id entered as resolved */
	public function resolvePatient($doc, $p) {
    
    $stmt = $this->db->prepare("UPDATE patient SET resolved = 1 WHERE doctorRequested = '".$doc."' AND fname = '".$p."'");
    $stmt->execute();

        }
	

	}
?>
