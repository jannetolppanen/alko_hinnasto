<?php
// Database configuration
$host = 'niisku.lab.fi:3306';
$username = 'x115549';
$password = 'Koodaus1';
$dbname = 'user_x115549';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Close db connection
function closeDbConnection($conn) {
  $conn->close();
}
?>
