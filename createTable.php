<?php
// require 'parseCSV.php';
require 'filterResults.php';

// Set the current page; default is 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 25; // Number of records per page
$offset = ($page - 1) * $limit; // Calculate the starting point

// $result = parseCSV('./data/alkon-hinnasto-tekstitiedostona.csv');
$result = filter('n');

if ($result) {
  $pageResults = array_slice($result, $offset, $limit);

    // Pagination buttons
    if ($page > 1) {
      echo "<a class='nes-btn' href='?page=" . ($page - 1) . "'>Edellinen</a> ";
    }
    if ($offset + $limit < count($result)) {
      echo "<a class='nes-btn' href='?page=" . ($page + 1) . "'>Seuraava</a>";
    }

  echo "<div class='nes-table-responsive'>
    <table class='nes-table is-bordered is-centered'>
      <thead>
        <tr>
          <th>Numero</th>
          <th>Nimi</th>
          <th>Valmistaja</th>
          <th>Pullokoko</th>
          <th>Hinta</th>
          <th>Litrahinta</th>
          <th>Tyyppi</th>
          <th>Valmistusmaa</th>
        </tr>
      </thead>
      <tbody>";

  foreach ($pageResults as $row) {
    echo
      "<tr><td>" . htmlspecialchars($row->Numero) .
      "</td><td>" . htmlspecialchars($row->Nimi) .
      "</td><td>" . htmlspecialchars($row->Valmistaja) .
      "</td><td>" . htmlspecialchars($row->Pullokoko) .
      "</td><td>" . htmlspecialchars($row->Hinta) .
      "</td><td>" . htmlspecialchars($row->Litrahinta) .
      "</td><td>" . htmlspecialchars($row->Tyyppi) .
      "</td><td>" . htmlspecialchars($row->Valmistusmaa) .
      "</td></tr>";
  }
  
  echo "</tbody></table></div>";
} else {
  echo "Could not parse the CSV file.";
}
?>
