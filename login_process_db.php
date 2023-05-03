<?php
session_start();
include 'connect.php';

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    //validate user's info
    if($email && $password) {
        $sql = "SELECT * FROM `crud` WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1) {
            //set  session variables
            $_SESSION['email'] = $email;

            //redirect the user to the homepage
            header('Location: homepage.php');
            exit();
        } else {
            //display error message
            echo "<p>Invalid email or password</p>";
        }
    } else {
        echo "<p>Please enter your credentials</p>";
    }
}
?>

<!-- Your login form here -->

