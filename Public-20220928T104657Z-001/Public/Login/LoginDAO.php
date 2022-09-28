 <?php

include "../../globalFiles/config.php";

session_start();// starts the session
if(isset($_POST['Email'])){
    
    $Email = $_POST['Email']; // gets the email input 
    $pass = $_POST['pass']; // get the password input 

    //prevents the user input 
    $uname = strip_tags(mysqli_real_escape_string($connection,trim($Email)));
    $pass = strip_tags(mysqli_real_escape_string($connection,trim($pass)));

    $query = "SELECT * FROM user_login WHERE email='".$Email."'"; // finds row with the email input mtching the database input 
    $tbl = mysqli_query($connection,$query);
    if(mysqli_num_rows($tbl)>0){

        $row = mysqli_fetch_array($tbl); // looks trough the hashes
        $pass_hash = $row['password'];
        if(password_verify($pass, $pass_hash)){ // if the password matches the hash 
            //logs user into website 
            $First = $row['firstName'];
            $Email =$row['email'];
            $_SESSION['firstName'] = $First;
            $_SESSION['email'] = $Email;

            header("Location: https://s1903359-ct4009.uogs.co.uk/Public/Homepage/Homepage.php"); 

        }
        else {
            echo "<script language='javascript'>";
            echo 'alert("Invalid Email or Password");';
            echo 'window.location.replace("Login.php");';
            echo "</script>";
        }
        

    }
    else {
        echo "<script language='javascript'>";
        echo 'alert("Invalid Email or Password");';
        echo 'window.location.replace("Login.php");';
        echo "</script>";
    }
}

?>