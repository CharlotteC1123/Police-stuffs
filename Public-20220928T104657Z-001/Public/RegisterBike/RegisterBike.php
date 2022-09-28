<?php 
$page_title = "Register A Bike";
require('../../globalFiles/publicHeader.php');
?>

<?php if (isset($_SESSION['firstName']) && !empty($_SESSION['firstName'])) {
  ?>
    <div id='bikeReg'>
      <h3> Enter the Details of your Bike </h3> <hr/>
      <!-- form for users to register their bike(s) on the system -->
      <form  method="post" enctype="multipart/form-data" id="formRegBike">
        <div>
          <label> Manufacturer Part Number (MPN) </label> <br />
          <input type="text" class="form-control text testdata" id="txtMPN" name="mpn" placeholder="Manufacturer Part Number" required="required"> <br />
        </div>
        <div>
          <label> Brand </label> <br />
          <input type="text" class="form-control text testdata" id="txtBrand" name="brand" placeholder="Brand" required="required">
          <br />
        </div>
        <div>
          <label> Model </label> <br />
          <input type="text" class="form-control text testdata" id="txtModel" name="model" placeholder="Model" required="required">
          <br />
        </div>
        <div>
          <label> Type </label> <br />
          <input type="text" class="form-control text testdata" id="txtType" name="bType" placeholder="Type" required="required">
          <br />
        </div>
        <div>
          <label> Wheel Size (inches) </label> <br />
          <input type="int" class="form-control text testdata" id="intWhlSize" name="whlSize" placeholder="Wheel Size" required="required"> <br />
        </div>
        <div>
          <label> Colour </label> <br />
          <input type="text" class="form-control text testdata" id="txtColour" name="colour" placeholder="Colour" required="required"> <br />
        </div>
        <div>
          <label> Number of Gears </label> <br />
          <input type="int" class="form-control text testdata" id="intNumGear" name="numGear" placeholder="Number of Gears" required="required"> <br />
        </div>
        <div>
          <label> Brake Type </label> <br />
          <input type="text" class="form-control text testdata" id="txtBrkType" name="brkType" placeholder="Brake Type" required="required"> <br />
        </div>
        <div>
          <label> Suspension </label> <br />
          <input type="text" class="form-control text testdata" id="txtSusp" name="susp" placeholder="Suspension" required="required"> <br />
        </div>
        <div>
          <!-- select gender from dropdown -->
          <label> Gender </label> <br />
          <select id="genderSelect" name="gSelect" class="browser-default custom-select">
            <option value="0">Select a Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="unisex">Unisex</option>
          </select>
          <br />&nbsp;
          <br />
        </div>
        <div>
          <label> Age Group </label> <br />
          <input type="text" class="form-control text testdata" id="txtAgeGrp" name="ageGroup" placeholder="Age Group (Child/Adult/6-8) " required="required"> <br />
        </div>

        <!-- image upload -->
        <div>
          <label for="file">Choose image(s) to upload</label>
          <input type="file" class="form-control-file" id="fileBikeImages" multiple name="images[]"> <br />
          <img src="" alt="Image preview..." id="bannerImg" width="50%" height="50%"> <br /><br />
        </div>
        <input type="submit" class="btn btn-primary" id="btnRegBike" value="Register">
      </form>
    </div>

    <script src="bikeUpload.js"></script>

  <?php } else { ?>
    <!-- won't display form if user not logged in -->
    <div id="notLoggedIn">
      <h3>Please Log in to Register a Bike on our System</h3><hr/>
      <a class="btn btn-primary" href="..\Login\Login.php" role="button">Login as Public</a>
    </div>

  <?php } 
  require('../../globalFiles/footer.php');
  ?>