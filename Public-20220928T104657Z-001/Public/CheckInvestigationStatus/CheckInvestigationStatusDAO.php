<?php
include "../../globalFiles/config.php";

//retrieve status update where selected bike id matches
$bikeID = ($_POST['bike']);
$sql = "SELECT invStatus, msg FROM invUpdates WHERE bikeID = '$bikeID'";
$result = mysqli_query($connection, $sql);

//determine colour of div based on which status is selected
while ($row = mysqli_fetch_Array($result)) {
    if (strpos($row[0], 'Not') !== false) {
        $color = 'grey';
    } else if (strpos($row[0], 'Ongoing') !== false) {
        $color = 'yellow';
    } else if (strpos($row[0], 'Found') !== false) {
        $color = 'green';
    } else if (strpos($row[0], 'Missing') !== false) {
        $color = 'red';
    }
    //display results in div
    echo "<div style='border-radius: 5px; padding: 10px; background-color: $color'> <b>$row[0]</b><hr/> $row[1]</div>";
}
