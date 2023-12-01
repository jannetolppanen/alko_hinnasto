<?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Initialize variables with default values
      $tyyppi = $valmistusmaa = null;

      // Check if 'tyyppi' is set and not empty, then retrieve the form data
      if (!empty($_POST['tyyppi'])) {
        $tyyppi = $_POST['tyyppi']; // Ensure the select name is 'tyyppi'
      }

      if (!empty($_POST['valmistusmaa'])) {
        $valmistusmaa = $_POST['valmistusmaa'];
      }

      if (!empty($_POST['pullokoko_min'])) {
        $pullokoko_min = $_POST['pullokoko_min'];
      }

      if (!empty($_POST['pullokoko_max'])) {
        $pullokoko_max = $_POST['pullokoko_max'];
      }

      if (!empty($_POST['hintavali_min'])) {
        $hintavali_min = $_POST['hintavali_min'];
      }

      if (!empty($_POST['hintavali_max'])) {
        $hintavali_max = $_POST['hintavali_max'];
      }

      if (!empty($_POST['energiamaara_min'])) {
        $energiamaara_min = $_POST['energiamaara_min'];
      }

      if (!empty($_POST['energiamaara_max'])) {
        $energiamaara_max = $_POST['energiamaara_max'];
      }
    }
    ?>