<?php
	//include the file to link to database
	include "../../globalFiles/config.php"; 
	//if there are some values passed through then
	if (isset($_GET["w1"]) && isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"])) {
		//This gets all the values from previous pages and stores it in variables to be put into the table
		$bikelat = $_GET["w1"];
		$bikelong = $_GET["w2"];
		$bikeid = $_GET["w3"];
		$datestolen = $_GET["w4"];
	}
	//This is the SQL which will add the id, lat, long and date to the table report stolen
	$sql = "INSERT INTO `report_stolen`".
		"values".
		"('$bikeid', '$bikelat', '$bikelong', '$datestolen')"; 
	if(mysqli_query($connection, $sql, $sql2)) {
		//if the query works successfully this alert is shown
		echo "<script language='javascript'>";
        echo 'alert("This bike has been reported stolen");';
        echo 'window.location.replace("ReportStolen.php");';
        echo "</script>";
    } else {
		//This is will happen if the bike that is being reported is already in the database
		echo "<script language='javascript'>";
        echo 'alert("Error: This bike has already been reported stolen");';
        echo 'window.location.replace("ReportStolen.php");';
        echo "</script>";
	}
	//this query updates the relevant row in the database to set the bike as stolen
	$sql2 = "UPDATE tbl_bikes SET stolen='1' WHERE bikeID = '" . $bikeid."'";
	//if query isnt successful
	if(!mysqli_query($connection, $sql2)) {
		echo 'False 2';
	} else {
		//if it is successful
		echo 'true';
	}
	//close the connection with database
	mysqli_close($connection);	
	exit; 
?>