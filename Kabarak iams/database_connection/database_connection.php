<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "IASMS";

// Establish a connection to the database
$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>
