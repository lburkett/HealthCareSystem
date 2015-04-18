<?php
	require 'templates/meta.php'; 
    require_once 'phpscripts/common.php';
    require_once 'phpscripts/authenticate.php';
	require_once 'classes/doctor.php';
	require_once 'classes/adminManager.php';

	session_start();

	// No user logged in, redirects to login
    if(!isLoggedIn())
    	redirectAndExit('login.php');
	// Doctor logged in, redirects to doctor home
	if($_SESSION['logged_in_username'] != "admin")
    	redirectAndExit('doctorHome.php');
	
	$test = new Doctor;
	$manager = new adminManager;
	$test = $manager->retrieveDoctor();  //Retrieves name from the $_SESSION variable
?>
<!-- Enter any extra code that should go inside the <head> tag here! Do this ONLY if this page needs a script or something that the other pages do not. -->
<?php require 'templates/header.php';?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
    	<!-- CONTENT GOES HERE! -->
	    <div class="row">
	    	<div class="u-pull-right logout-row"><a href="phpscripts/logout.php" class="button button-primary u-full-width">Logout</a></div>
	    </div>
	    <h3>Admin</h3>
	    <p>Listed below are all doctors currently in the database. Use the form below to add a <em>new</em> doctor.</p>
      	<hr>
      	<div class="row">
      		<div class="explanation">
      			<h4>List of all Current Doctors</h4>
      			<p>Here is a list of all the doctors currently in the database.</p>
      		</div>
      		<table class="u-full-width doctor-list">
      			<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Profession</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
		        <?php
			        while($row = $test->fetch(PDO::FETCH_ASSOC)) {
			        	echo "<tr>";
			        	echo "<td>" . $row['id'] . "</td>";
				    	echo "<td>" . $row['name']  . "</td>"; 
				        echo "<td>" . $row['profession'] . "</td>";
				        echo "<td>" . $row['email'] . "</td>";
						echo "</tr>";    
			   		 }
		        ?>
		        </tbody>
	        </table>
        </div>
			<br>
			<div class="explanation">
      			<h4>Add a New Doctor</h4>
      			<p>Fill out and submit the form below to add a new doctor to the roster.</p>
      		</div>
			<form action="phpscripts/checkFormAdmin.php" class="doctor-form" method="post">
				<div class="row">
					<div class="three columns">
						<label for="name">Name</label>
						<input type="text" class="u-full-width" placeholder="Dr. Name" id="name" name="name">
					</div>
					<div class="three columns">
						<label for="profession">Profession</label>
						<input type="text" class="u-full-width" placeholder="Profession" id="profession" name="profession">
					</div>
				
					<div class="three columns">
						<label for="email">Email</label>
						<input type="text" class="u-full-width" placeholder="you@example.com" id="email" name="email">
					</div>
					<div class="three columns">
						<label for="password">Password</label>
						<input type="password" class="u-full-width" placeholder="Password" id="password" name="password">
					</div>
				</div>
				<input class="button-primary" type="submit" value="Create New Doctor" id="submit-button" data-role="none">
			</form>
		</div>
	</div>


<?php require 'templates/footer.php'; ?>
