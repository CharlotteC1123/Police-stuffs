<?php
$page_title = "Report Stolen";
require('../../globalFiles/publicHeader.php');
?>

<?php if (isset($_SESSION['firstName']) && !empty($_SESSION['firstName'])) {
    //check if the user is loggin in
?>
    <form id="formReportStolen" action="ReportStolenDAO.php" method="POST">
        <!--Title-->
        <h2>Enter a registered bike to report</h2>
        <h3>If you haven't previously registered your bike go to register bike page</h3>
        <!--style line on page-->
        <hr />
        <form method="get" action="ReportStolenDAO.php">
            <!--Comment for user-->
            <h4>Select a bike to report missing</h4>
            <?php
            include '../../globalFiles/config.php';
            //this gets the email from the person that is logged in
            $userID = $_SESSION['email'];
            //the table is then searched so that all bikes that are registered by the person loggedd in are selected
            $result = mysqli_query($connection, "SELECT bikeID, brand, model FROM tbl_bikes WHERE user_id = '" . $userID . "'");
            //this creates the dropdown which will be filled with data from the table
            echo "<select class='browser-default custom-select' id = 'bikeID'>";
            echo "<option>ID - brand - model</option>";
            while ($row = mysqli_fetch_Array($result)) {
                //this prints out the bike ID, the brand and model for all the bikes registered by the user
                echo "<option>$row[bikeID] - $row[brand] - $row[model] </option>";
            }
            echo "</select>";
            //close database connection
            mysqli_close($connection);
            ?>
        </form><br />

        <h4>When was your bike stolen:</h4>
        <!--creates the calendar that the user can enter a data into-->
        <input type="date" id="dateStolen" class="form-control text" name="dateStolen" value="2020-03-01" min="2019-01-01" max="2020-12-31" required>
        <script>
            //sets the variable today as a date
            var today = new Date();
            //gets todays day
            var day = today.getDate();
            //gets todays month
            var month = today.getMonth() + 1; //Need to add 1 because Januaury is one
            //gets todays year
            var year = today.getFullYear();
            if (day < 10) {
                //if the day is 1->9 adds a 0 so that it is 01 instead of 1
                day = '0' + day
            }
            if (month < 10) {
                //if the month is 1->9 adds a 0 so that it is 01 instead of 1
                month = '0' + month
            }
            //puts all the parts of the date together so that it forms a date
            today = year + '-' + month + '-' + day;
            //sets this date as teh max value that the user can enter
            document.getElementById("dateStolen").setAttribute("max", today);
        </script>
        <br>
        <h4>Where was your bike stolen:</h4>
        <form id="formInsertLocation">
            <!--sets the map and the size of it-->
            <div id="mapInput" style="width: 700px; height: 500px;"> </div> <br>
            <!--links to the necessary js file-->
            <script src="../ReportStolen/ReportStolen.js"></script>
            <input type="submit" class="btn btn-primary" id="btnSubmit"></input>
            <script>
                //when the submit button is pressed the js file will be called.
                document.getElementById("btnSubmit").addEventListener("click", myFunction);
                function myFunction() {
                    $.ajax({
                        url: "ReportStolenDAO.js"
                    })
                }
            </script>
        </form>
    </form>

<?php } else { ?>
    <!-- won't display form if user not logged in -->
    <div id="notLoggedIn">
        <h3>Please Log in to Report a Stolen Bike on our System</h3>
        <hr />
        <a class="btn btn-primary" href="..\Login\Login.php" role="button">Login as Public</a>
    </div>

<?php }
    //Add the footer to the page
    require('../../globalFiles/footer.php');
?>