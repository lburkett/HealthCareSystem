<?php require 'templates/meta.php'; ?>
<!-- Enter any extra code that should go inside the <head> tag here! Do this ONLY if this page needs a script or something that the other pages do not. -->

<?php require 'templates/headerDoctor.php'; ?>

  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->
        <div class="row">
          <div class="u-pull-right"><button disabled>Logout</button></div>
        </div>
        Notifications page
	<hr>
    <h4>List of all Patients Currently under Doctor's name</h4>
<?php
  /*  Just Testing retrieveNotfication and resolvePatiet(works!) .. feel free to manipualte code...*/
	require_once 'classes/patient.php';
  require_once 'classes/dbManager.php';
	require_once 'classes/notificationManager.php';
	require_once 'phpscripts/common.php';
	
	$kevin = 'Dr. Van'; // test data
  $name = 'd';    // test data, please change or will brake code
	$test = new Patient;
	$manager = new notificationManager;
	$test = $manager->retrieveNotification($kevin);
	//$manager->resolvePatient($kevin ,$name); 
  // works but commentted out for now, need to change to put real data
  //marks resolved, Parameters : (the current Doctor, Patient name)

	while($row = $test->fetch(PDO::FETCH_ASSOC)) {
    	echo "ID: " . $row['id']  . " First Name: "; 
        echo $row['fname'] . " Last Name: ";
        echo $row['lname'] . " Phone: ";
        echo $row['phone'] . " FilledOutBy: " . $row['filledOutBy'] . " doctorRequested: " . $row['doctorRequested'] . " Pain: ";
	echo $row['pain'] . " Nausea: " . $row['nausea'] . " Depression: " . $row['depression'] . " Anxiety: " . $row['anxiety'] . " Drowsiness: ";
	echo $row['drowsiness'] . " Average: " . $row['average'] . " Resolved: " . $row['resolved'];
	echo "<br>";    
    }
	

?>
        <p><button disabled>Logout</button></p>  
        <!-- CONTENT ENDS HERE! -->
    </div>
  </div>

<?php require 'templates/footer.php'; ?>
