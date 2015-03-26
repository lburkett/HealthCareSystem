<?php

	class Patient {
		// Information
		protected $firstName;
		protected $lastName;
		protected $phoneNumber;
		protected $filled;
		protected $doctor;
		// Symptoms
		protected $pain;
		protected $nausea;
		protected $depression;
		protected $anxiety;
		protected $drowsiness;
		protected $average;

		// Set functions
		public function setFirstName($newVar) {
			$this->firstName = $newVar;
		}
		public function setLastName($newVar) {
			$this->lastName = $newVar;
		}
		public function setPhoneNumber($newVar) {
			$this->phoneNumber = $newVar;
		}
		public function setFilled($newVar) {
			$this->filled = $newVar;
		}
		public function setDoctor($newVar) {
			$this->doctor = $newVar;
		}
		public function setPain($newVar) {
			$this->pain = $newVar;
		}
		public function setNausea($newVar) {
			$this->nausea = $newVar;
		}
		public function setDepression($newVar) {
			$this->depression = $newVar;
		}
		public function setAnxiety($newVar) {
			$this->anxiety = $newVar;
		}
		public function setDrowsiness($newVar) {
			$this->drowsiness = $newVar;
		}
		public function calculateAverage() {
			$this->average = ($this->pain + $this->nausea + $this->depression + $this->anxiety + $this->drowsiness) / 2;
		}

		// Get functions
		public function getFirstName() {
			return $this->firstName;
		}
		public function getLastName() {
			return $this->lastName;
		}
		public function getPhoneNumber() {
			return $this->phoneNumber;
		}
		public function getFilled() {
			return $this->filled;
		}
		public function getDoctor() {
			return $this->doctor;
		}
		public function getPain() {
			return $this->pain;
		}
		public function getNausea() {
			return $this->nausea;
		}
		public function getDepression() {
			return $this->depression;
		}
		public function getAnxiety() {
			return $this->anxiety;
		}
		public function getDrowsiness() {
			return $this->drowsiness;
		}
		public function getAverage() {
			return $this->average;
		}

		// Other functions
		public function __toString() {
			echo "First Name: " . $this->getFirstName() . "<br>";
			echo "Last Name: " . $this->getLastName() . "<br>";
			echo "Phone Number: " . $this->getPhoneNumber() . "<br>";
			echo "Filled Out By: " . $this->getFilled() . "<br>";
			echo "For Doctor: " . $this->getDoctor() . "<br>";
			echo "Pain: " . $this->getPain() . "<br>";
			echo "Nausea: " . $this->getNausea() . "<br>";
			echo "Depression: " . $this->getDepression() . "<br>";
			echo "Anxiety: " . $this->getAnxiety() . "<br>";
			echo "Drowsiness: " . $this->getDrowsiness() . "<br>";
			echo "Average: " . $this->getAverage() . "<br>";
		}	
	}

?>