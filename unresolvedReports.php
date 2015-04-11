<?php require 'templates/meta.php'; 
  session_start();
  $name = $_SESSION['logged_in_doctor'];
?>
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
        <h3>Unresolved Reports</h3>
        <p><strong>Patient reports for all doctors</p>
        <hr>
        <?php
          /*  Just Testing retrieveNotfication and resolvePatiet(works!) .. feel free to manipualte code...*/
          require_once 'classes/patient.php';
          require_once 'classes/dbManager.php';
          require_once 'classes/unresolvedManager.php';
          require_once 'phpscripts/common.php';
          
          $test = new Patient;
          $manager = new unresolvedManager;
          $test = $manager->retrieveUnresolved($name);
        ?>
        <?php //Begin pulling patients from the database ?>
        <?php 
          $looped = false;
          //BEGIN LOOP
          while($row = $test->fetch(PDO::FETCH_ASSOC)) { 
            $looped = true;
        ?>
        <div class="row">
          <div class="twelve columns patient-info">
              <div class="twelve columns info-cont">
                <div class="three columns patient-name">
                  <a class="close-expand">+</a>
                  <span class="u-vert p-name"><?php echo $row['fname']. " " . $row['lname']; ?></span>
                </div>
                <div class="two columns patient-name phone-num">
                  <span class="u-vert phone"><?php echo $row['phone']; ?></span>
                </div>
                <div class="two columns avg"><span class="symptoms-title">Severity</span><span class="u-vert"><?php echo $row['average']; ?></span></div>
                <div class="three columns doctor-name">
                  <span class="u-vert"><?php echo $row['doctorRequested']; ?></span>
                </div>
                <div class="two columns u-pull-right">
                  <form>
                    <input type="text" value=<?php echo "\"" . $row['id'] . "\""; ?> style="display: none;">
                    <input type="button" class="button button-primary" value="Resolve">
                  </form>
                </div>
              </div>
            <!--Extra details regarding symptoms -->
            <div class="twelve columns patient-details">
              <div class="two columns mobile-no"><div class="symptoms-title">Average</div><?php echo $row['average']; ?></div>
              <div class="two columns"><div class="symptoms-title">Pain</div><?php echo $row['pain']; ?></div>
              <div class="two columns"><div class="symptoms-title">Nausea</div><?php echo $row['nausea']; ?></div>
              <div class="two columns"><div class="symptoms-title">Depression</div><?php echo $row['depression']; ?></div>
              <div class="two columns"><div class="symptoms-title">Anxiety</div><?php echo $row['anxiety']; ?></div>
              <div class="two columns"><div class="symptoms-title">Drowsiness</div><?php echo $row['drowsiness']; ?></div>
            </div>
          </div>
        </div>
        <?php } //END LOOP
          if (!$looped) {
            echo "There appear to be no patients requiring immediate assistance. Keep up the good work!";
          }
        ?>
    </div>
  </div>

<?php require 'templates/footer.php'; ?>