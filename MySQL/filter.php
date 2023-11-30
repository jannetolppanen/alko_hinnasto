<?php
require_once 'make_query.php';

function valmistusmaa() {
    global $conn; // Use the connection from db_connect.php

    $sql = "SELECT DISTINCT valmistusmaa FROM alko_hinnat;";
    $result = makeQuery($sql);
    return $result;
}
?>
