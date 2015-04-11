<?php require 'templates/meta.php';
  session_start();
  $name = $_SESSION['logged_in_doctor'];
?>
<!-- Enter any extra code that should go inside the <head> tag here! Do this ONLY if this page needs a script or something that the other pages do not. -->

<?php require 'templates/headerDoctor.php'; ?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->
      	<div class="row">
          <div class="u-pull-right"><a href="phpscripts/logout.php" class="button button-primary u-full-width" >Logout</a></div>
        </div>
        <div class="section">
            <h3>Welcome, <?php echo $name ?>!</h3>
            <hr>
            <div class="row doctor-home">
                <div class="four columns">&nbsp;</div>
                <div class="four columns">
	                <!-- Notifications button -->
	                <a href="notifications.php" class="button button-primary u-full-width " >Notifications</a>
	                
	                <!-- View Unresolved Reports button -->
	                <a href="unresolvedReports.php" class="button button-primary u-full-width" >View Unresolved Reports</a>
	                
	                <!-- View Patient History button -->
	                <a href="patientHistory.php" class="button button-primary u-full-width" >View Patient History</a>
	                
	                <!-- Logout button -->
	               <!-- <input class="button-primary" type="submit" value="Logout" id="submit-button" data-role="none">-->
	                <a href="phpscripts/logout.php" class="button button-primary u-full-width" >Logout</a>
                </div>
                <div class="four columns">&nbsp;</div>
            </div>
        </div>
        <!-- CONTENT ENDS HERE! -->
    </div>
  </div>

<?php require 'templates/footer.php'; ?>
