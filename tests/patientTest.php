<?php 
//-------------------------------------------------------
//	TEST OF patient.php BY Spencer Bywater
//-------------------------------------------------------
require_once '../classes/patient.php';

class patientTest extends PHPUnit_Framework_TestCase {
	// Testing the validation aspect of a Patient object
	public function testBelowRange() {
		$patient = new Patient;
		$symptom = -200;

		$result = $patient->symptomValidation($symptom);
		$this->assertEquals(0, $result);
	}

	public function testAboveRange() {
		$patient = new Patient;
		$symptom = 2000;

		$result = $patient->symptomValidation($symptom);
		$this->assertEquals(10, $result);
	}

	public function testWithinRange() {
		$patient = new Patient;
		$symptom = 5;

		$result = $patient->symptomValidation($symptom);
		$this->assertEquals(5, $result);
	}
}

?>