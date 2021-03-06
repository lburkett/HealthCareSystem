<?php
	require_once 'common.php';
	require_once 'password.php';

	/* Attemps to authenticate the doctor based on their username.
	   Returns True if the login attempt succeeds. */
	function loginAttempt($usernameToCheck, $passwordToCheck) {
		$pdo = getPDO();

		$stmt = $pdo->prepare("SELECT
									password
							   FROM
									doctor
							   WHERE
									email = :username");

		$stmt->bindParam(':username', $username);
		$username = $usernameToCheck;

		$stmt->execute();

		$hash = $stmt->fetchColumn();
		$confirm = passwordCheck($passwordToCheck, $hash);

		return $confirm;
	}

	/* Checks if the given strings are the same.
	   Very primative, no password hashing. */
	function passwordCheck($passwordToCheck, $hash) {
		if (password_verify($passwordToCheck, $hash))
			return true;
		else
			return false;
	}

	/* Looks up the name associated with the username
	   and returns it. */
	function nameLookup($usernameToLookup) {
		$pdo = getPDO();

		$stmt = $pdo->prepare("SELECT
									name
							   FROM
							   		doctor
							   WHERE
							   		email = :username");

		$stmt->bindParam(':username', $username);
		$username = $usernameToLookup;

		$stmt->execute();
		$name = $stmt->fetchColumn();

		return $name;
	}

	function idLookup($usernameToLookup) {
		$pdo = getPDO();

		$stmt = $pdo->prepare("SELECT
									id
							   FROM
							   		doctor
							   WHERE
							   		email = :username");

		$stmt->bindParam(':username', $username);
		$username = $usernameToLookup;

		$stmt->execute();
		$id = $stmt->fetchColumn();

		return $id;
	}

	/* Sets up the session variable with the doctor's username
	   and actual name for database useage later. */
	function login($username, $name, $id) {
		session_regenerate_id();

		$_SESSION['logged_in_username'] = $username;
		$_SESSION['logged_in_doctor'] = $name;
		$_SESSION['logged_in_id'] = $id;
	}

	/* Unsets the session variables which logs the user out */
	function logout() {
		unset($_SESSION['logged_in_username']);
		unset($_SESSION['logged_in_doctor']);
		unset($_SESSION['logged_in_id']);
	}

	/* Returns the currently logged in doctor if there is one */
	function getDoctor() {
		if (isLoggedIn()) {
			// Might need to be an array with both the logged_in_username and logged_in_doctor
			return $_SESSION['logged_in_doctor'];
		}
		else {
			return null;
		}
	}

	function getDoctorUsername() {
		if (isLoggedIn()) {
			// Might need to be an array with both the logged_in_username and logged_in_doctor
			return $_SESSION['logged_in_username'];
		}
		else {
			return null;
		}
	}
	/* Checks if there is a doctor logged in */
	function isLoggedIn() {
		return isset($_SESSION['logged_in_username']);
	}
?>
