<?php 
	require_once 'common.php';
	require_once '../classes/notificationManager.php';

	$manager = new notificationManager;

	$id = $_POST['patient-id'];

	//echo $id;

	$manager->resolvePatient($id);

	redirectAndExit("../doctorHome.php");
 ?>
 <br>
 <a href="../doctorHome.php">Return home</a>