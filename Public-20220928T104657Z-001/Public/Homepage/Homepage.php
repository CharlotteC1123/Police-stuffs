<?php
$page_title = "Home";
require('../../globalFiles/publicHeader.php');
?>
<script>
  $('.title').hide();
</script>

<div class="d-flex justify-content-between">
  <img class="img" src="../Images/Logo.jpg" style="width: 100px; height: 100px;">
  <h1>Gloucestershire Constabulary Bike Theft</h1>
  <img class="img" src="../Images/Logo.jpg" style="width: 100px; height: 100px; float: right;">
</div>
<link rel="stylesheet" type="text/css" href="Homepage.css">

<!--slideshow positioned in the center and will transition between the two images-->
<div class="slider">
  <div class="slide-viewer">
    <div class="slide-group">
      <div class="slide slide-1"> <img src="..\Images\Slide4.jpg"></div>
      <div class="slide slide-2"><img src="..\Images\Slide3.jpg"></div>
      <div class="slide slide-3"><img src="..\Images\Slide4.jpg"></div>
      <div class="slide slide-4"><img src="..\Images\Slide3.jpg"></div>
    </div>
  </div>
</div>

<!--the layout of the gird that will appear underneath the slidshow. Some of them have links to other pages on the website-->
<!--the layout of the gird that will appear underneath the slidshow. Some of them have links to other pages on the website-->
<div class="gridLayout">
  <a href=..\RegisterBike\RegisterBike.php>
    <div class="box item1">
      <h2>Register</h2>
      <p>Register a bike onto our system to help reduce bike crime when conducting further investigations.</p>
    </div>
  </a>
  <a href="..\ReportStolen\ReportStolen.php">
    <div class="box item2">
      <h2>Report</h2>
      <p>Report a potentially stolen bike and we will compare it to our registered bikes already existing on the
        system.</p>
    </div>
  </a>
  <a href="..\CheckInvestigationStatus\CheckInvestigationStatus.php">
    <div class="box item3">
      <h2>Check Your Status</h2>
      <p>Check the status of your report and how the investigation is currently going.</p>
    </div>
  </a>
  <div class="box item4">
    <a href="../About/About.php">
      <h2>About Us</h2>
    </a>
    <p></p>
  </div>
</div>

<script src="Homepage.js"></script>

<?php
require('../../globalFiles/footer.php');
?>