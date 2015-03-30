<?php
	class Patient {
		/* Information */
		protected $id;
		protected $fname;
		protected $lname;
		protected $phone;
		protected $filledOutBy;
		protected $doctorRequested;
		/* Symptoms */
		protected $pain;
		protected $nausea;
		protected $depression;
		protected $anxiety;
		protected $drowsiness;
		protected $average;
		protected $resolved;

		/* Set variable functions */
		public function setID($newVar) {
			$this->id = $newVar;
		}
		public function setFirstName($newVar) {
			$this->fname = $newVar;
		}
		public function setLastName($newVar) {
			$this->lname = $newVar;
		}
		public function setPhoneNumber($newVar) {
			$this->phone = $newVar;
		}
		public function setFilled($newVar) {
			$this->filledOutBy = $newVar;
		}
		public function setDoctor($newVar) {
			$this->doctorRequested = $newVar;
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
			$this->average = ($this->pain + $this->nausea + $this->depression + $this->anxiety + $this->drowsiness) / 5;
		}
		public function setResolved($newVar) {
			$this->resolved = $newVar;
		}

		/* Get variable functions */
		public function getID() {
			return $this->id;
		}
		public function getFirstName() {
			return $this->fname;
		}
		public function getLastName() {
			return $this->lname;
		}
		public function getPhoneNumber() {
			return $this->phone;
		}
		public function getFilled() {
			return $this->filledOutBy;
		}
		public function getDoctor() {
			return $this->doctorRequested;
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
		public function getResolved() {
			return $this->resolved;
		}

		/* Prints out all viariables */
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
			echo "Resolved: " . $this->getResolved() . "<br>";
		}	
	}
?>