<?php
	require_once 'common.php';
	require_once 'authenticate.php';

	session_start();
	logout();
	redirectAndExit('index.php');
?>