<?php
	require once 'patient.php';

	class DatabaseManager {
		/* Initialize new database file */
		public function __construct() {
			
		}
		/* Receives Patient object then inserts it into the database */
		public function addPatient($newPatient) {

		}
		/* Queries the database for specific doctor name and returns a Patient object */
		public function retrievePatient($doctor) {


			return $patient;
		}
		/* Marks the patient id entered as resolved */
		public function resolvePatient($id) {

		}
	}
?>