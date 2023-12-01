<!-- Nämä jäi tänne kun ehdin hieman aloittaa mutta ei käytettykään mysql -->

<?php
$host = 'niisku.lab.fi:3306';
$username = 'x115549';
$password = 'Koodaus1';
$dbname = 'user_x115549';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function closeDbConnection($conn) {
  $conn->close();
}
?>
