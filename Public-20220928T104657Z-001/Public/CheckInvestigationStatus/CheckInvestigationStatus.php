<?php
$page_title = "Check Status";
require('../../globalFiles/publicHeader.php');
?>

<?php if (isset($_SESSION['firstName']) && !empty($_SESSION['firstName'])) {
?>
    <h3>Select a Bike to Check the Status of</h3>
    
    <form id="chkStatus">
        <?php
        $userID = $_SESSION['email'];
        //retrieve only bikes the user has registered if exist in the invUpdates table
        $result = mysqli_query($connection, "SELECT invUpdates.bikeID, tbl_bikes.brand, tbl_bikes.model, tbl_bikes.colour FROM invUpdates INNER JOIN tbl_bikes ON invUpdates.bikeID = tbl_bikes.bikeID WHERE tbl_bikes.user_id = '$userID'");
        echo "<hr/>";
        echo "<select class='browser-default custom-select' id='bikeSelect'>";
        echo "<option value='0'>Select a Bike</option>";
        while ($row = mysqli_fetch_Array($result)) {
            echo "<option value='$row[bikeID]'>$row[bikeID] - $row[brand] - $row[model] - $row[colour]</option>"; //display bikeID and some bike info to distiguish the bike
        }
        echo "</select>";
        ?>

        <input type="submit" class="btn btn-success" id="btnCheckInv" value="Go">
    </form><br />

    <div id="statusUpdate" style="width: 300px; ">

    </div>

    <script>
        //action of the form
        $('#chkStatus').on('submit', function(e) {
            var formData = new FormData(this);

            //add val of bike dropdown to form data to be posted to DAO
            var bike = $('#bikeSelect').val();
            formData.append('bike', bike);

            if ($('#bikeSelect').val() === '0') { //guard against empty selection input
                alert("Please Select a Bike");
                return false;
            }

            //ajax to post data from form and alert user on success
            e.preventDefault();
            $.ajax({
                url: "CheckInvestigationStatusDAO.php",
                method: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $("#statusUpdate").html(response);
                }
            });

        });
    </script>

<?php } else { ?>
    <!-- won't display form if user not logged in -->
    <div id="notLoggedIn">
        <h3>Please Log in to Check a Bike Status through our System</h3>
        <hr />
        <a class="btn btn-primary" href="..\Login\Login.php" role="button">Login as Public</a>
    </div>

<?php }
require('../../globalFiles/footer.php');
?>