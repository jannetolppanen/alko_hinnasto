<?php
require_once 'db_connect.php'; // Include the database connection

function makeQuery($sql) {
    global $conn; // Use the connection from db_connect.php

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result; // Return the result for further processing
    } else {
        echo "no results";
        return null;
    }
}
?>
