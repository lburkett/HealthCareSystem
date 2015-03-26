<?php require 'templates/meta.php'; ?>

<!-- The landing page is a bit different so we don't include header.php here. -->
</head>
<body>

  <!-- HEADING-LANDING section -->
  <div class="section heading-landing">
    <div class="container">
      <h1 class="fit-title">Efferent Patient Care System</h1>
    </div>
  </div>

  <!-- WELCOME section -->
  <div class="landing-content">
  <div class="section welcome">
    <div class="container">
      <h4 class="wlcm">Welcome!</h4>
    </div>
  </div>

  <!-- DIRECT section -->
  <div class="section direct">
    <div class="container">
      <div class="row">
        <div class="four columns"><br></div>
        <div class="four columns navigate">
          <h5>I'm a...</h5>
          <a href="form.php" class="button button-primary" style="margin-left: 2px;">Patient</a>
          <br>
          <!-- <a href="#" class="button button-primary">*NOT DONE* Doctor</a> -->
          <!-- NOTE!: the button below is just to show it's disabled (cleaner-looking). Replace it with the above^ commented-out
               tag <a href...> when doctor page is made, then delete the button below. :D -->
          <button disabled>Doctor</button>

        </div>
        <div class="four columns"><br></div>
      </div>
    </div>
  </div>
  </div>

<?php require 'templates/footer.php'; ?>
