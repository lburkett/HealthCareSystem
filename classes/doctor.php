<?php

	class Doctor {
		/* Information */
		protected $id;
		protected $name;
		protected $profession;
		protected $email;
		protected $password;

		/* Set variable functions */
		public function setID($newVar) {
			$this->id = $newVar;
		}
		public function setName($newVar) {
			$this->name = $newVar;
		}
		public function setProfession($newVar) {
			$this->profession = $newVar;
		}
		public function setEmail($newVar) {
			$this->email = $newVar;
		}
		public function setPassword($newVar) {
			$this->password = $newVar;
		}

		/* Get variable functions */
		public function getID() {
			return $this->id;
		}
		public function getName() {
			return $this->name;
		}
		public function getProfession() {
			return $this->profession;
		}
		public function getEmail() {
			return $this->email;
		}
		public function getPassword() {
			return $this->password;
		}

		/* Prints out all viariables */
		public function __toString() {
			echo "Name: " . $this->getName() . "<br>";
			echo "Profession: " . $this->getProfession() . "<br>";
			echo "Email: " . $this->getEmail() . "<br>";
			echo "Password: " . $this->getPassword() . "<br>";
		}	
	}
?>
