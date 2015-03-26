<?php require 'templates/meta.php'; ?>
<!-- Enter any extra code that should go inside the <head> tag here! Do this ONLY if this page needs a script or something that the other pages do not. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).bind("mobileinit", function () {
    $.mobile.ajaxEnabled = false;
});
</script>
<!--<script type="text/javascript">
	// checks if any fields are empty
	function isEmpty() {
		var firstName = document.getElementByID("firstName");
		var lastName = document.getElementByID("lastName");
		var phoneNumber = document.getElementByID("phone");
		var filledOutBy = document.getElementByID("filledOutBy");
		if(firstName === "" || lastName === "" || phoneNumber === "" || filledOutBy === "") {
			alert("Fill out blank fields");
		}
	}
</script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
<link rel="stylesheet" href="scripts/jquery.mobile.readable.css">

<?php require 'templates/header.php'; ?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
		<!-- CONTENT GOES HERE! -->
		<img src="images/scroll.png" alt="Edmonton Symptom Assessment Form" style="width: 100px; height: 100px; margin-bottom: 1.0rem; margin-top: 1rem; ">
		<h3>Symptom Assessment Form</h3>
		<p>Welcome to the Edmonton Symptom Assessment Form! This system will ask first for some quick information and then for some input related to a few common symptoms. Please answer as accurately as possible.</p>
		
		<hr>

		<form action="phpscripts/checkForm.php" class="symptoms-form" method="post">
			<!-- PERSONAL INFO -->
			<div class="explanation">
				<h4>Personal Information</h4>
				<p>First, some quick info:</p>
			</div>
			<div class="row">
				<div class="four columns">
					<label for="firstName">First Name</label>
					<input type="text" class="u-full-width" placeholder="First Name" id="firstName" name="firstName">
				</div>
				<div class="four columns">
					<label for="lastName">Last Name</label>
					<input type="text" class="u-full-width" placeholder="Last Name" id="lastName" name="lastName">
				</div>
				<div class="four columns">
					<label for="phone">Phone Number</label>
					<input type="text" class="u-full-width" placeholder="Phone Number" id="phone" name="phone">
				</div>
			</div>

			<hr>
			<!-- SYMPTOMS -->
			<div class="explanation">
				<h4>Symptoms</h4>
				<p>We would like to know how you're feeling so we can help you better! Please rate the following 5 symptoms on a scale of 0 to 10. 0 means no pain, 10 signifies extreme pain.</p>
			</div>
			<div class="row">
				<label for="pain">Pain:</label>
				<input type="range" name="pain" id="pain" min="0" max="10" value="0" data-highlight="true" class="u-full-width">
			</div>
			<div class="row">
				<label for="nausea">Nausea:</label>
					<input type="range" name="nausea" id="nausea" min="0" max="10" value="0" data-highlight="true" class="u-full-width">
			</div>
			<div class="row">
				<label for="depression">Depression:</label>
				<input type="range" name="depression" id="depression" min="0" max="10" value="0" data-highlight="true" class="u-full-width">
			</div>
			<div class="row">
				<label for="anxiety">Anxiety:</label>
				<input type="range" name="anxiety" id="anxiety" min="0" max="10" value="0" data-highlight="true" class="u-full-width">
				
			</div>
			<div class="row">
				<label for="drowsiness">Drowsiness:</label>
				<input type="range" name="drowsiness" id="drowsiness" min="0" max="10" value="0" data-highlight="true" class="u-full-width">
			</div>
			
			<hr>
			<!-- EXTRA -->
			<div class="explanation">
				<h4>A few final things</h4>
				<p>Please enter the name of the person who filled out the form, and make sure to select the doctor you wish to see.</p>
			</div>
			<div class="row">
				<div class="six columns">
					<label for="filledOutBy">Filled out by:</label>
					<input type="text" class="u-full-width" placeholder="Filled out by" id="filledOutBy" name="filledOutBy" data-role="none">
				</div>
				<div class="six columns">
					<label for="doctorRequested">Doctor Requested:</label>
					<select class="u-full-width" id="doctorRequested" data-role="none" name="doctorRequested">
						<option value="">N/A</option>
						<option value="Doctor Van">Doctor Van - Pediatrics</option>
						<option value="Doctor Bywater">Doctor Bywater - Optometry</option>
						<option value="Doctor Maddox">Doctor Maddox - Podiatrist</option>
						<option value="Doctor Burkett">Doctor Burkett - Sports medicine</option>
						<option value="Doctor Bhambhani">Doctor Bhambhani - Cardiology</option>
					</select>
				</div>
			</div>
			
			<br>
			<!-- SUBMIT -->
			<p>Double check your information and press submit!</p>
			<input class="button-primary" type="submit" value="Submit" id="submit-button" data-role="none">
		</form>



    </div>
  </div>

<?php require 'templates/footer.php'; ?>
