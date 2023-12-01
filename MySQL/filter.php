<?php
require_once 'make_query.php';

function valmistusmaa() {
    global $conn;

    $sql = "SELECT DISTINCT valmistusmaa FROM alko_hinnat;";
    $result = makeQuery($sql);
    return $result;
}
?>
