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
  <?php require_once 'dropdownMenuValues.php'; ?>

  <div class="nes-container with-title is-centered container-frontpage">
    <p class="title">Alkon tuotekatalogi 30.11.2023</p>


    <!-- Filtteri -->
    <div class="filter">

      <div class="nes-container with-title filter-flex-item-large">
        <p class="title">Tyyppi</p>
        <div class="nes-select">
          <select required id="default_select">
            <option value="" disabled selected hidden>Select...</option>
            <?php
            foreach ($kategoriat as $index => $kategoria) {
              echo "<option value='" . htmlspecialchars($index) . "'>" . htmlspecialchars($kategoria) . "</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="nes-container with-title filter-flex-item-large">
        <p class="title">Valmistusmaa</p>
        <div class="nes-select">
          <select required id="default_select">
            <option value="" disabled selected hidden>Select...</option>
            <?php
            foreach ($maat as $index => $maa) {
              echo "<option value='" . htmlspecialchars($index) . "'>" . htmlspecialchars($maa) . "</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="nes-container with-title filter-flex-item-small">
        <p class="title">Pullokoko</p>
        <div class="nes-field is-inline">
          <input type="text" id="inline_field" class="nes-input is-success" placeholder="Minimi">
        </div>
        <div class="nes-field is-inline">

          <input type="text" id="error_field" class="nes-input is-error" placeholder="Maksimi">
        </div>
      </div>

      <div class="nes-container with-title filter-flex-item-small">
        <p class="title">Hintaväli</p>
        <div class="nes-field is-inline">
          <input type="text" id="inline_field" class="nes-input is-success" placeholder="Minimi">
        </div>
        <div class="nes-field is-inline">

          <input type="text" id="error_field" class="nes-input is-error" placeholder="Maksimi">
        </div>
      </div>

      <div class="nes-container with-title filter-flex-item-small">
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


    <!-- Taulukko -->
    <?php require_once 'createTable.php'; ?>
    </tbody>
    </table>
  </div>
  </a>
  </div>
</body>

</html>