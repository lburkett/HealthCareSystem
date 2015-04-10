<?php
	session_unset();
	header('Location: ../index.php');
	die("Logging Out");
?>