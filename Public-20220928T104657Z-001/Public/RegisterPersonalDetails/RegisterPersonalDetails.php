<?php
$page_title = "Register A Bike";
require('../../globalFiles/publicHeader.php');
?>

<form id="formUserReg" action="RegisterPersonalDetailsDAO.php" method="POST">
    <div class="margin">
        <fieldset>
            <legend>Register new user</legend>
            <input id="firstName" name="firstName" type="text" class="form-control" placeholder="Enter your First Name" required="Required">
            <br />
            <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Enter Last Name" required="Required">
            <br />
            <input id="email" name="email" type="email" class="form-control" placeholder="Enter Email Address" required="Required">
            <br />
            <input id="password" name="password" type="password" class="form-control" placeholder="Create a password" required="Required">
            <br />
            <input type="password" name="ConPassword" id="ConPass" class="form-control" placeholder="Confirm password" required="Required">
            <br />
            <input id="btnUserform" class="btn btn-primary" type="Submit" onclick="return Confirm()">

            <a class="btn btn-outline-secondary" href=..\Login\Login.php>Login</a>
        </fieldset>
    </div>
</form>

<script type="text/javascript">
    function Confirm() {
        var pass = document.getElementById("password").value;
        var ConPass = document.getElementById("ConPass").value;
        if (pass != ConPass) { // if the password are not the same on entry
            alert("Sorry, the passwords do not match"); // alert the user it does not match
            return false;
        }
        return true;
    }
</script>

<?php
require('../../globalFiles/footer.php');
?>