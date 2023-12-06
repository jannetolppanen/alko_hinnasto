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
  <?php
  require_once 'dropdownMenuValues.php';
  require_once 'createTable.php';
  require_once 'queryStrings.php';
  require_once 'parseCSV.php'; 


  $FirstTitle = getTitle('./data/alkon-hinnasto-tekstitiedostona.csv');
    ?>

  <div class="nes-container with-title is-centered container-frontpage">
  <p class="title"><?php echo ($FirstTitle[0]); ?></p>

    <!-- Filtterit -->
    <form method="get" action="">
      <div class="filter">

        <div class="nes-container with-title filter-flex-item-large">
          <p class="title">Tyyppi</p>
          <div class="nes-select">
            <select name="tyyppi" id="tyyppi_select">
              <option value="" disabled selected hidden>Select...</option>
              <?php
              foreach ($kategoriat as $kategoria) {
                echo "<option value='" . htmlspecialchars($kategoria) . "'>" . htmlspecialchars($kategoria) . "</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <div class="nes-container with-title filter-flex-item-large">
          <p class="title">Valmistusmaa</p>
          <div class="nes-select">
            <select name="valmistusmaa" id="valmistusmaa_select">
              <option value="" disabled selected hidden>Select...</option>
              <?php
              foreach ($maat as $maa) {
                echo "<option value='" . htmlspecialchars($maa) . "'>" . htmlspecialchars($maa) . "</option>";
              }
              ?>
            </select>
          </div>
        </div>

        <div class="nes-container with-title filter-flex-item-small">
          <p class="title">Pullokoko</p>
          <div class="nes-field is-inline">
            <input type="text" name="pullokoko_min" id="pullokoko_min_field" class="nes-input is-success"
              placeholder="Minimi">
          </div>
          <div class="nes-field is-inline">

            <input type="text" name="pullokoko_max" id="pullokoko_max_field" class="nes-input is-error"
              placeholder="Maksimi">
          </div>
        </div>

        <div class="nes-container with-title filter-flex-item-small">
          <p class="title">Hintaväli</p>
          <div class="nes-field is-inline">
            <input type="text" name="hintavali_min" id="hintavali_min_field" class="nes-input is-success"
              placeholder="Minimi">
          </div>
          <div class="nes-field is-inline">
            <input type="text" name="hintavali_max" id="hintavali_max_field" class="nes-input is-error"
              placeholder="Maksimi">
          </div>
        </div>

        <div class="nes-container with-title filter-flex-item-small">
          <p class="title">Energiamääräväli</p>
          <div class="nes-field is-inline">
            <input type="text" name="energiamaara_min" id="energiamaara_min_field" class="nes-input is-success"
              placeholder="Minimi">
          </div>
          <div class="nes-field is-inline">
            <input type="text" name="energiamaara_max" id="energiamaara_max_field" class="nes-input is-error"
              placeholder="Maksimi">
          </div>
        </div>
      </div>

      <!-- Hakunappi -->
      <button type="submit" class="nes-btn is-primary">Päivitä</button>
    </form>
    <!-- Taulukko -->
    <?php table(); ?>

    </tbody>
    </table>
  </div>
  </a>
  </div>
</body>

</html>