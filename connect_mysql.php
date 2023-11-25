<?php
// Database configuration
$host = 'localhost';
$username = 'your_username';
$password = 'your_password';
$dbname = 'your_database';

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Open the CSV file
$handle = fopen("path/to/your/file.csv", "r");

// Read the first line to get the headers (assuming 4th line is headers)
for ($i = 0; $i < 3; $i++) {
    fgetcsv($handle); // skip lines
}
$headers = fgetcsv($handle);

// Create the table
$tableName = "YourTableName";
$sqlCreate = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY, ";
foreach ($headers as $header) {
    // Modify this part according to your CSV header specifics
    $sqlCreate .= $header . " VARCHAR(255), ";
}
$sqlCreate = rtrim($sqlCreate, ', ') . ");";
$conn->query($sqlCreate);

// Insert data
while (($data = fgetcsv($handle)) !== FALSE) {
    $sqlInsert = "INSERT INTO $tableName VALUES (NULL, ";
    foreach ($data as $value) {
        $sqlInsert .= "'" . $conn->real_escape_string($value) . "', ";
    }
    $sqlInsert = rtrim($sqlInsert, ', ') . ");";
    $conn->query($sqlInsert);
}

fclose($handle);
$conn->close();
?>
