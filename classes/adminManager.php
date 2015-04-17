<?php
	require_once 'doctor.php';

    class adminManager {
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
        /* Receives Doctor object then inserts it into the database */
        public function addDoctor($newDoctor) {
            // Prepare INSERT INTO statement
            $stmt = $this->db->prepare("INSERT INTO doctor (name, profession, email, password) 
                                        values (:name, :profession, :email, :password)");

            // Bind parameters from the statement to the attributes of $newDoctor
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':profession', $profession);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            $name = $newDoctor->getName();
            $profession = $newDoctor->getProfession();
            $email = $newDoctor->getEmail();
            $password = $newDoctor->getPassword();

            // Execute the prepared statement
            $stmt->execute();
		}

		/* Queries the database for a specific doctor name and returns all patient information */
		public function retrieveDoctor() {
			return $this->db->query("SELECT
                                        *
                                     FROM
                                        doctor");
		}
	}
?>