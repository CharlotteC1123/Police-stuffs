<?php
    session_start();
    include "../../globalFiles/config.php"; // include the database configuration file
    $upload_folder = "../bikeImages/"; //define file path for images to be inserted into

    //assign form data to variables
    $userID = $_SESSION['email'];
    $dateReg = date('Y-m-d H:i:s');
    $txtMPN = $_POST['mpn'];
    $txtBrand = $_POST['brand'];
    $txtModel = $_POST['model'];
    $txtType = $_POST['bType'];
    $intWhlSize = $_POST['whlSize'];
    $txtColour = $_POST['colour'];
    $intNumGear = $_POST['numGear'];
    $txtBrkType = $_POST['brkType'];
    $Susp = $_POST['susp'];
    $genderSelect = $_POST['gSelect']; 
    $txtAgeGroup = $_POST['ageGroup'];
    $imgID = 1;
    
    //insert form data into db
    $sql1 = "INSERT INTO `tbl_bikes`".
        "values". 
        "('$userID', '', '$dateReg', '$txtMPN', '$txtBrand', '$txtModel', '$txtType', '$intWhlSize', '$txtColour',".
        "'$intNumGear', '$txtBrkType', '$Susp', '$genderSelect', '$txtAgeGroup', '')";

    if(!mysqli_query($connection, $sql1)) {
        echo 'False 1';
        echo mysqli_error($connection);
    }
        
    $insertedBikeID = mysqli_insert_id($connection);

    //name and relocate image file to upload folder
    foreach($_FILES["images"]["name"] as $key => $file_name) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $ext = end((explode(".", $file_name)));
        $imgID = $insertedBikeID . "_" . $key . "." . $ext; //final name of image file

        //insert name into db with corresponding bikeID
        $sql2 = "INSERT INTO tbl_bikeImages (bikeID, imgID) VALUES
            ('$insertedBikeID', '$imgID')";
        if(!mysqli_query($connection, $sql2)) {
            echo 'False 2';
        } else {
            echo "<script language='javascript'>";
            echo 'alert("success");';
            echo "</script>";
        }
        move_uploaded_file($tmp_name, $upload_folder.$imgID);
        
    }
    
    echo 'True';
    

    mysqli_close($connection);
?>