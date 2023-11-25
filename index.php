<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alkon hinnasto</title>
</head>

<body>
  <div class="nes-container with-title is-centered container-frontpage">
    <p class="title">Alkon hinnasto 2023</p>


    <!-- Filtteri -->
    <div class="filter">

      <div class="nes-container with-title filter-flex-item">
        <p class="title">Tyyppi</p>

        <div class="nes-select">
          <select required id="default_select">
            <option value="" disabled selected hidden>Select...</option>
            <option value="0">To be</option>
            <option value="1">Not to be</option>
          </select>
        </div>
      </div>

      <div class="nes-container with-title filter-flex-item">
        <p class="title">Valmistusmaa</p>
        <div class="nes-select">
          <select required id="default_select">
            <option value="" disabled selected hidden>Select...</option>
            <option value="0">To be</option>
            <option value="1">Not to be</option>
          </select>
        </div>
      </div>

      <div class="nes-container with-title filter-flex-item">
        <p class="title">Pullokoko</p>
        <div class="nes-select">
          <select required id="default_select">
            <option value="" disabled selected hidden>Select...</option>
            <option value="0">To be</option>
            <option value="1">Not to be</option>
          </select>
        </div>
      </div>

      <div class="nes-container with-title filter-flex-item">
        <p class="title">Hintaväli</p>
        <div class="nes-field is-inline">
          <input type="text" id="inline_field" class="nes-input is-success" placeholder="Minimi">
        </div>
        <div class="nes-field is-inline">

          <input type="text" id="error_field" class="nes-input is-error" placeholder="Maksimi">
        </div>
      </div>

      <div class="nes-container with-title filter-flex-item">
        <p class="title">Energiamääräväli</p>
        <div class="nes-field is-inline">
          <input type="text" id="inline_field" class="nes-input is-success" placeholder="Minimi">
        </div>
        <div class="nes-field is-inline">
          <input type="text" id="error_field" class="nes-input is-error" placeholder="Maksimi">
        </div>
      </div>
    </div>

    <!-- Hakunappi -->
    <button type="button" class="nes-btn is-primary">Päivitä</button>


    <div class="nes-table-responsive">
      <table class="nes-table is-bordered is-centered">
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
        <tbody>
          <?php
          require 'make_query.php';

          $sql = "SELECT Numero, Nimi, Valmistaja, Pullokoko, Hinta, Litrahinta, Tyyppi, Valmistusmaa FROM alko_hinnat WHERE Valmistusmaa='Suomi' LIMIT 25";
          $result = makeQuery($sql);

          if ($result) {
            while ($row = $result->fetch_assoc()) {
              echo
                "<tr><td>" . $row["Numero"] .
                "</td><td>" . $row["Nimi"] .
                "</td><td>" . $row["Valmistaja"] .
                "</td><td>" . $row["Pullokoko"] .
                "</td><td>" . $row["Hinta"] .
                "</td><td>" . $row["Litrahinta"] .
                "</td><td>" . $row["Tyyppi"] .
                "</td><td>" . $row["Valmistusmaa"] .
                "</td></tr>";
            }
          }
          closeDbConnection($conn);
          ?>
        </tbody>
      </table>
    </div>
    </a>
  </div>
</body>

</html>