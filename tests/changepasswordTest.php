<?php
// Test done by Lowell Burkett
require_once '../phpscripts/authenticate.php';
require_once '../classes/dbManager.php';

class changepasswordTest extends PHPUnit_Framework_TestCase {
	/* Test login */
	public function testValidLogin() {
		$username = "laburket@asu.edu";
		$password = "password";

		$result = loginAttempt($username, $password);
		$this->assertTrue($result);
	}
	public function testInvalidLogin() {
		$username = "laburkett@asu.edu";
		$password = "passwordy";

		$result = loginAttempt($username, $password);
		$this->assertFalse($result);
	}
	/* Test password_verify */
	public function testPasswordVerify() {
		$manager = new DatabaseManager;
		$oldpwd = "password";
		$oldHash = $manager->getDoctorPasswordHash(2);

		$result = password_verify($oldpwd, $oldHash);
		$this->assertTrue($result);
	}
	public function testPasswordNotVerify() {
		$manager = new DatabaseManager;
		$oldpwd = "password2";
		$oldHash = $manager->getDoctorPasswordHash(2);

		$result = password_verify($oldpwd, $oldHash);
		$this->assertFalse($result);
	}
	/* Test change password */
	public function testSetPassword() {
		$manager = new DatabaseManager;
		$manager->setDoctorPassword(2, "password2");
		$newhash = $manager->getDoctorPasswordHash(2);

		$result = password_verify("password2", $newhash);
		$this->assertTrue($result);
	}
	public function testReSetPassword() {
		$manager = new DatabaseManager;
		$manager->setDoctorPassword(2, "password");
		$newhash = $manager->getDoctorPasswordHash(2);

		$result = password_verify("password", $newhash);
		$this->assertTrue($result);
	}
}
?>