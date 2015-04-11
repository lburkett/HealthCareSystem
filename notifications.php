<?php require 'templates/meta.php'; ?>
<!-- Enter any extra code that should go inside the <head> tag here! Do this ONLY if this page needs a script or something that the other pages do not. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>
$(function() {
  $("a.close-expand").click(function() {
    $(this).parent().parent().siblings(".patient-details").slideToggle("linear");
  });
});
</script>
<?php require 'templates/headerDoctor.php'; ?>

  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->
        <div class="row">
          <div class="u-pull-right logout-row"><button disabled>Logout</button></div>
        </div>
        <h3>Notifications</h3>
        <p>Patient reports specific to you, or reports sent to <i>any</i> doctor.</p>
        <hr>
        <div class="row">
          <div class="twelve columns patient-info">
              <div class="twelve columns info-cont">
                <div class="three columns patient-name">
                  <a class="close-expand">+</a>
                  <span class="u-vert p-name">Bobby Tables</span>
                </div>
                <div class="two columns patient-name phone-num">
                  <span class="u-vert phone">123-456-1111</span>
                </div>
                <div class="two columns avg"><span class="symptoms-title">Severity</span><span class="u-vert">5.1</span></div>
                <div class="three columns doctor-name">
                  <span class="u-vert">Doctor Bywater</span>
                </div>
                <div class="two columns u-pull-right">
                  <form>
                    <input type="text" value="INSERT-PATIENT-ID-HERE-WITH-PHP" style="display: none;">
                    <input type="button" class="button button-primary" value="Resolve">
                  </form>
                </div>
              </div>
            <!--Extra details regarding symptoms -->
            <div class="twelve columns patient-details">
              <div class="two columns mobile-no"><div class="symptoms-title">Average</div>5.1</div>
              <div class="two columns"><div class="symptoms-title">Pain</div>5</div>
              <div class="two columns"><div class="symptoms-title">Nausea</div>0</div>
              <div class="two columns"><div class="symptoms-title">Depression</div>7</div>
              <div class="two columns"><div class="symptoms-title">Anxiety</div>3</div>
              <div class="two columns"><div class="symptoms-title">Drowsiness</div>10</div>
            </div>
          </div>
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
	
	$kevin = 'Dr. Bywater'; // test data
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

        
        <div class="row">
          <div class="twelve columns patient-info">
              <div class="twelve columns info-cont">
                <div class="three columns patient-name">
                  <a class="close-expand">+</a>
                  <span class="u-vert p-name">Bobby Tables</span>
                </div>
                <div class="two columns patient-name phone-num">
                  <span class="u-vert phone">123-456-1111</span>
                </div>
                <div class="two columns avg"><span class="symptoms-title">Severity</span><span class="u-vert">5.1</span></div>
                <div class="three columns doctor-name">
                  <span class="u-vert">Doctor Bywater</span>
                </div>
                <div class="two columns u-pull-right">
                  <form>
                    <input type="text" value="INSERT-PATIENT-ID-HERE-WITH-PHP" style="display: none;">
                    <input type="button" class="button button-primary" value="Resolve">
                  </form>
                </div>
              </div>
            <!--Extra details regarding symptoms -->
            <div class="twelve columns patient-details">
              <div class="two columns mobile-no"><div class="symptoms-title">Average</div>5.1</div>
              <div class="two columns"><div class="symptoms-title">Pain</div>5</div>
              <div class="two columns"><div class="symptoms-title">Nausea</div>0</div>
              <div class="two columns"><div class="symptoms-title">Depression</div>7</div>
              <div class="two columns"><div class="symptoms-title">Anxiety</div>3</div>
              <div class="two columns"><div class="symptoms-title">Drowsiness</div>10</div>
            </div>
          </div>
        </div>

        <!-- CONTENT ENDS HERE! -->
    </div>
  </div>

<?php require 'templates/footer.php'; ?>
