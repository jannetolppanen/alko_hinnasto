<?php
require 'filterResults.php';

function table()
{
  // Hankitaan query parametrit ja parsitaan ne

  $tyyppi = isset($_GET['tyyppi']) ? $_GET['tyyppi'] : null;

  $valmistusmaa = isset($_GET['valmistusmaa']) ? $_GET['valmistusmaa'] : null;

  $pullokoko_min = isset($_GET['pullokoko_min']) ? $_GET['pullokoko_min'] : null;
  if ($pullokoko_min !== null) {
    $pullokoko_min = str_replace(',', '.', $pullokoko_min);
    $pullokoko_min = floatval($pullokoko_min);
  }

  $pullokoko_max = isset($_GET['pullokoko_max']) ? $_GET['pullokoko_max'] : null;
  if ($pullokoko_max !== null) {
    $pullokoko_max = str_replace(',', '.', $pullokoko_max);
    $pullokoko_max = floatval($pullokoko_max);
  }

  $hintavali_min = isset($_GET['hintavali_min']) ? $_GET['hintavali_min'] : null;
  if ($hintavali_min !== null) {
    $hintavali_min = str_replace(',', '.', $hintavali_min);
    $hintavali_min = floatval($hintavali_min);
  }
  $hintavali_max = isset($_GET['hintavali_max']) ? $_GET['hintavali_max'] : null;
  if ($hintavali_max !== null) {
    $hintavali_max = str_replace(',', '.', $hintavali_max);
  }
  $energiamaara_min = isset($_GET['energiamaara_min']) ? $_GET['energiamaara_min'] : null;
  if ($energiamaara_min !== null) {
    $energiamaara_min = str_replace(',', '.', $energiamaara_min);
  }
  $energiamaara_max = isset($_GET['energiamaara_max']) ? $_GET['energiamaara_max'] : null;
  if ($energiamaara_max !== null) {
    $energiamaara_max = str_replace(',', '.', $energiamaara_max);
  }


  // Pagination
  $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
  $limit = 25;
  $offset = ($page - 1) * $limit;

  $result = filter(tyyppi: $tyyppi, valmistusmaa: $valmistusmaa, pullokoko_min: $pullokoko_min, pullokoko_max: $pullokoko_max, hintavali_min: $hintavali_min, hintavali_max: $hintavali_max, energiamaara_min: $energiamaara_min, energiamaara_max: $energiamaara_max);

  if ($result) {
    $pageResults = array_slice($result, $offset, $limit);

    echo "<div class='pagination-container'>";
    $queryParams = $_GET;

    // Edellinen
    if ($page > 1) {
      $queryParams['page'] = $page - 1;
      $prevPageLink = http_build_query($queryParams);
      echo "<a class='nes-btn' href='?$prevPageLink'>Edellinen</a> ";
    }

    // Seuraava
    if ($offset + $limit < count($result)) {
      $queryParams['page'] = $page + 1;
      $nextPageLink = http_build_query($queryParams);
      echo "<a class='nes-btn' href='?$nextPageLink'>Seuraava</a>";
    }
    echo "</div>";

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
    <th>Vuosikerta</th>
    <th>Alkoholi-%</th>
    <th>kcal/100 ml</th>
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
        "</td><td>" . htmlspecialchars($row->Vuosikerta) .
        "</td><td>" . htmlspecialchars($row->Alkoholi) .
        "</td><td>" . htmlspecialchars($row->Energia) .
        "</td></tr>";
    }

    echo "</tbody></table></div>";
  } else {
    echo "Ei tuloksia";
  }
}
?>