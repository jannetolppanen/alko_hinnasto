<?php
require_once 'db_connect.php';

function makeQuery($sql) {
    global $conn;

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        echo "no results";
        return null;
    }
}
?>
