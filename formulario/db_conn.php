<?php
// Database credentials
$servername = "172.17.0.1";
$username = "root";
$password = "rootpassword";
$dbname = "redsalud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>