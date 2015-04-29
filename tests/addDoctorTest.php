<?php

require_once 'adminManager.php';

class addDoctorTest extends PHPUnit_Framework_TestCase
{
	
	public function testDoctor()
	{
		$doc = new Doctor;
		$manager = new adminManager;

		$doc->setname('a');
		$doc->setprofession('b');
		$doc->setemail('c');
		$doc->setpassword('d');

		$result = manager->addDoctor();
		$this->assertTrue(result);
	}

}
