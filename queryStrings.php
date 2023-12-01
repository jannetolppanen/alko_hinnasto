<?php
    // Poimitaan query parametrit jos annettu
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (!empty($_POST['tyyppi'])) {
        $tyyppi = $_POST['tyyppi'];
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