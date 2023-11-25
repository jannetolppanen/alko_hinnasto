<?php
set_time_limit(600); // Increase the limit to 300 seconds (5 minutes)

// Database configuration
$host = 'niisku.lab.fi:3306';
$username = 'x115549';
$password = 'Koodaus1';
$dbname = 'user_x115549';

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Open the CSV file
$handle = fopen("alkon-hinnasto.csv", "r");

// Assuming headers are on the 4th line, skip the first 3 lines
for ($i = 0; $i < 3; $i++) {
    fgetcsv($handle); // skip lines
}
$headers = fgetcsv($handle, 1000, ";"); // Adjust delimiter if necessary

// Create the table
$tableName = "alko_hinnat";
$sqlCreate = "CREATE TABLE IF NOT EXISTS $tableName (";
foreach ($headers as $header) {
    // Sanitize and shorten the column names
    $columnName = preg_replace('/[^a-zA-Z0-9_]/', '_', $header);
    // Set specific data types for known columns
    if ($columnName == 'Numero') {
        $sqlCreate .= "`$columnName` INT PRIMARY KEY, ";
    } elseif ($columnName == 'Ryp__leet') {
        $sqlCreate .= "`$columnName` VARCHAR(500), ";
    } else {
        $sqlCreate .= "`$columnName` VARCHAR(255), ";
    }
}
$sqlCreate = rtrim($sqlCreate, ', ') . ");";

// Execute the create table query
if (!$conn->query($sqlCreate)) {
    die("Error creating table: " . $conn->error);
}

// Insert data
while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) { // Adjust delimiter if necessary
    $sqlInsert = "INSERT INTO $tableName VALUES (";
    foreach ($data as $key => $value) {
        if ($headers[$key] == 'Numero') {
            $sqlInsert .= $conn->real_escape_string($value) . ", ";
        } else {
            $sqlInsert .= "'" . $conn->real_escape_string($value) . "', ";
        }
    }
    $sqlInsert = rtrim($sqlInsert, ', ') . ");";
    if (!$conn->query($sqlInsert)) {
        die("Error inserting data: " . $conn->error);
    }
}

fclose($handle);
$conn->close();
?>
