<?php
	require_once 'common.php';

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

		$confirm = passwordCheck($stmt->fetchColumn(), $passwordToCheck);

		return $confirm;
	}

	/* Checks if the given strings are the same.
	   Very primative, no password hashing. */
	function passwordCheck($password, $passwordToCheck) {
		if ($password === $passwordToCheck)
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

	/* Sets up the session variable with the doctor's username
	   and actual name for database useage later. */
	function login($username, $name) {
		session_regenerate_id();

		$_SESSION['logged_in_username'] = $username;
		$_SESSION['logged_in_doctor'] = $name;
	}
?>