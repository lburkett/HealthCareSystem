<?php
    require 'templates/meta.php';
?>

<!-- Enter any extra code that should go inside the <head> tag here! Do this ONLY if this page needs a script or something that the other pages do not. -->

<?php require 'templates/header.php'; ?>
  <!-- Any content should go inside the container where indicated -->
  <div class="section content">
    <div class="container">
      <!-- CONTENT GOES HERE! -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
// Prevents the jQuery mobile handler from taking over screen switching. 
$(document).bind("mobileinit", function () {
    $.mobile.ajaxEnabled = false;
});
</script> 
        <br><br>
<!-- In actual program, check the email address with databse entry and post the following statement       -->
        <p><b>Please check your email for the link to reset password.</b></p>
    </div>
  </div>

<?php require 'templates/footer.php'; ?>
