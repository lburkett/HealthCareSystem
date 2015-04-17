<?php require 'templates/meta.php'; ?>
<!-- Enter any extra code that should go inside the <head> tag here! Do this ONLY if this page needs a script or something that the other pages do not. -->
<?php require 'templates/header.php'; 

?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->
       <?php
          /*  Just Testing retrieveNotfication and resolvePatiet(works!) .. feel free to manipualte code...*/
          require_once 'phpscripts/common.php';
          require_once 'classes/doctor.php';
          require_once 'classes/adminManager.php';
          
          $test = new Doctor;
          $manager = new adminManager;
          $test = $manager->retrieveDoctor();  //Retrieves name from the $_SESSION variable

        while($row = $test->fetch(PDO::FETCH_ASSOC)) {
    	echo "Name: " . $row['name']  . " Profession: "; 
        echo $row['profession'] . " Email: ";
        echo $row['email'];
		echo "<br>";    
   		 }


        ?>

		
<form action="phpscripts/checkFormAdmin.php" class="doctor-form" method="post">
     <div class="explanation">
			<h4>Add Doctor</h4>
			<p>Fill out new Doctor's info below:</p>
			</div>
			<hr>
			<div class="row">
				<div class="six columns">
					<label for="name">Name</label>
					<input type="text" class="u-full-width" placeholder="Dr. Bob" id="name" name="name">
				</div>
				<div class="six columns">
					<label for="profession">Profession</label>
					<input type="text" class="u-full-width" placeholder="Profession" id="profession" name="profession">
				</div>
			</div>
			<div class="row">
				<div class="six columns">
					<label for="email">Email</label>
					<input type="text" class="u-full-width" placeholder="xxxxx@yahoo.com" id="email" name="email">
				</div>
				<div class="six columns">
					<label for="password">Password</label>
					<input type="text" class="u-full-width" placeholder="Password" id="password" name="password">
				</div>
			</div>
			<hr>
			<input class="button-primary" type="submit" value="Submit" id="submit-button" data-role="none">
  	  </div>
  	</div>
</form>

<?php require 'templates/footer.php'; ?>
