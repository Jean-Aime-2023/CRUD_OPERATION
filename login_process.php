<?php
// login_process.php

include 'connect.php';

if(isset($_POST['submit'])){
    // retrieve the user's input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // validate the user's credentials
    $sql = "SELECT * FROM `crud` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        // handle query error
        echo "<p>Query error: " . mysqli_error($conn) . "</p>";
    } else {
        $row = mysqli_fetch_assoc($result);
        if($row){
            // start new session
            session_start();

            // set session variables
            $_SESSION['email'] = $email;

            // redirect the user to the homepage
            header("Location: homepage.php");
            exit(); // Make sure to add an exit() function to stop further script execution
        } else {
            // display an error message
            echo "<p>Invalid email or password</p>";
        }
    }
}

?>
