<?php
$conn = mysqli_connect('localhost', 'root', '', 'crudoperation');
if(!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
