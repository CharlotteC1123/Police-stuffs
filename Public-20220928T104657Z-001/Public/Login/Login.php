<?php
$page_title = "Public Login";
require('../../globalFiles/publicHeader.php');
?>

<head>
  <link rel="stylesheet" type="text/css" href="Login.css">
</head>
<!--Form login for the username and passwrod to the rest of the control panel-->
<form name="login" action="LoginDAO.php" method="POST">
  <div class="margin">
    <fieldset>
      <legend>Login</legend></br>
      <?php if (isset($_SESSION['firstName']) && !empty($_SESSION['firstName'])) {
      ?>
        You are already logged in<br /><br />
        <a class="btn btn-outline-secondary" href="../../globalFiles/Logout.php">Logout</a>
      <?php } else { ?>

        Enter Email:<br>
        <input type="text" class="form-control" id="Email" name="Email" placeholder="Email">
        </br>
        <br>

        Enter Password:<br>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
        </br>
        <br>
        <br>

        <input type="submit" class="btn btn-primary" value="Login" />
        <a class="btn btn-outline-secondary" href="../RegisterPersonalDetails/RegisterPersonalDetails.html">Register</a>
      <?php } ?>
    </fieldset>
  </div>

</form>


<?php
require('../../globalFiles/footer.php');
?>