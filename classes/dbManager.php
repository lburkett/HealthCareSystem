<?php
	require_once 'patient.php';

    class DatabaseManager {
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
        /* Receives Patient object then inserts it into the database */
        public function addPatient($newPatient) {
            // Prepare INSERT INTO statement
            $stmt = $this->db->prepare("INSERT INTO patient (fname, lname, phone, filledOutBy, 
                                            doctorRequested, pain, nausea, depression, anxiety, 
                                            drowsiness, average, resolved) 
                                        values (:fname, :lname, :phone, :filledOutBy, :doctorRequested, 
                                            :pain, :nausea, :depression, :anxiety, :drowsiness, 
                                            :average, :resolved)");

            // Bind parameters from the statement to the attributes of $newPatient
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':filledOutBy', $fill);
            $stmt->bindParam(':doctorRequested', $doctor);
            $stmt->bindParam(':pain', $pain);
            $stmt->bindParam(':nausea', $nausea);
            $stmt->bindParam(':depression', $depression);
            $stmt->bindParam(':anxiety', $anxiety);
            $stmt->bindParam(':drowsiness', $drowsiness);
            $stmt->bindParam(':average', $average);
            $stmt->bindParam(':resolved', $resolved);

            $fname = $newPatient->getFirstName();
            $lname = $newPatient->getLastName();
            $phone = $newPatient->getPhoneNumber();
            $fill = $newPatient->getFilled();
            $doctor = $newPatient->getDoctor();
            $pain = $newPatient->getPain();
            $nausea = $newPatient->getNausea();
            $depression = $newPatient->getDepression();
            $anxiety = $newPatient->getAnxiety();
            $drowsiness = $newPatient->getDrowsiness();
            $average = $newPatient->getAverage();
            $resolved = $newPatient->getResolved();

            // Execute the prepared statement
            $stmt->execute();
		}

		/* Queries the database for a specific doctor name and returns all patient information */
		public function retrievePatient() {
			return $this->db->query("SELECT
                                        *
                                     FROM
                                        patient");
		}

		/* Marks the patient id entered as resolved */
		public function resolvePatient($id) {
            
		}

        // Queries the database for a list of all doctors
        public function getDoctorList() {
            return $this->db->query("SELECT
                                        *
                                     FROM
                                        doctor
                                     WHERE
                                        name <> 'admin'");
        }
        public function getDoctorPasswordHash($username) {
            $doctor = $this->db->query("SELECT * FROM doctor WHERE email = '". $username ."'");
            if ($doctor === false) {
                echo "query sucks";
            }
            $row = $doctor->fetch(PDO::FETCH_ASSOC);
            return $row['password'];

        }
        public function setDoctorPassword($username, $password) {
            $stmt = $this->db->prepare("UPDATE doctor SET password = '". $password ."' WHERE email = '". $username ."' ");
            $stmt->execute();
        }
	}
?>