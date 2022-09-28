<?php
session_start(); // starts the session
?>
<!DOCTYPE html>
<html>
<head>
	<title>Public Login </title>
	<link rel="stylesheet" type="text/css" href="Login.css">
	<script>
	window.history.forward();// stops the user going back
	</script>
</head>
<body>
<ul class="navigation">
		<li>
			<a>Gloucestershire Constabulary</a>
		</li>
	</ul>
<br><br>
<!--Form login for the username and passwrod to the rest of the control panel-->
<form name="login" action="Login.php" method="POST">
	<div class="margin">
		<fieldset>
			<legend>Login</legend>
			<!--
			Enter your username:<br>
			<input type="text" id="uname" name="uname">
			</br>
			<br>
			-->
			Enter Email:<br>
			<input type="text" id="Email" name="Email">
			</br>
			<br> 

			Enter Password:<br>
  			<input type="password" id="pass" name="pass">
			</br>
			<br>
			
			Confirm Password:<br>
			<input type="password" name="ConPassword" id="ConPass">
			</br>
			<br>
			
  			<input type="submit" value="Login" onclick="return Confirm()"/>
  			<a href="../RegisterPersonalDetails/RegisterPersonalDetails.html">Register</a>

   	    </fieldset>
	</div>

</form>

<script type="text/javascript">
	function Confirm(){
		var pass = document.getElementById("pass").value;
		var ConPass = document.getElementById("ConPass").value;
		if(pass != ConPass){ // if the password are not the same on entry
			alert("Sorry, the passwords do not match"); // alert the user it does not match
			return false;
		}
		return true;
	}

</script>
</body>
</html>