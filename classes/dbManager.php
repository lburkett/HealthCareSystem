<?php

	class DatabaseManager {
		/* Initialize new database file */
		public function __construct() {
			
		}
		/* Receives Patient object then inserts it into the database */
		public function addPatient($newPatient) {

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
		public function resolvePatient($id) {

		}
	}
?>