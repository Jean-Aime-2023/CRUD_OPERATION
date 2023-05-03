<?php

include 'connect.php';

// Define the filename for the Excel file
$filename = 'users.xls';

// Set the HTTP headers to download the Excel file
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Get the data from the database
$sql = "SELECT * FROM `crud`";
$result = mysqli_query($conn, $sql);

// Create the Excel file
$excel = '<table>';
$excel .= '<tr><th>ID</th><th>Fname</th><th>Lname</th><th>Email</th></tr>';

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];

        $excel .= '<tr><td>' . $id . '</td><td>' . $fname . '</td><td>' . $lname . '</td><td>' . $email . '</td></tr>';
    }
}

$excel .= '</table>';

// Output the Excel file
echo $excel;
exit;

?>
