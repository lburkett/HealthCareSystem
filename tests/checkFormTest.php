<?php
require_once 'patient.php';

class checkFormTest extends PHPUnit_Framework_TestCase{
	
	public function calculateAverageTest(){
			$pati = new Patient();
			
			$pati->setPain(5);
			$pati->setNausea(5);
			$pati->setDepression(5);
			$pati->setAnxiety(5);
			$pati->setDrowsiness(5);

			$result = $pati->calculateAverage();
			$this->assertEquals(5, $result);
	}
	
	public function notCalculateAverageTest(){
		$pati = new Patient();
			
			$pati->setPain(5);
			$pati->setNausea(5);
			$pati->setDepression(5);
			$pati->setAnxiety(5);
			$pati->setDrowsiness(5);

			$result = $pati->calculateAverage();
			$this->assertEquals(10, $result);
	}
	}
}