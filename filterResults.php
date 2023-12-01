<?php
require_once 'parseCSV.php';

function filter($tyyppi = null, $valmistusmaa = null, $pullokoko_min = null, $pullokoko_max = null, $hintavali_min = null, $hintavali_max = null, $energiamaara_min = null, $energiamaara_max = null)
{
    $data = parseCSV('./data/alkon-hinnasto-tekstitiedostona.csv');
    if ($tyyppi) {
        $data = array_filter($data, function ($row) use ($tyyppi) {
            return stripos($row->Tyyppi, $tyyppi) !== false;
        });
    }

    if ($valmistusmaa) {
        $data = array_filter($data, function ($row) use ($valmistusmaa) {
            return stripos($row->Valmistusmaa, $valmistusmaa) !== false;
        });
    }

    if ($pullokoko_min) {
        $data = array_filter($data, function ($row) use ($pullokoko_min) {
            // Extract the numeric part and replace comma with dot, if necessary
            $pullokokoValue = preg_replace('/[^0-9,]/', '', $row->Pullokoko);
            $pullokokoValue = str_replace(',', '.', $pullokokoValue);
            $pullokokoFloat = floatval($pullokokoValue);
    
            // Compare with the minimum value
            return $pullokokoFloat >= $pullokoko_min;
        });
    }

    if ($pullokoko_max) {
        $data = array_filter($data, function ($row) use ($pullokoko_max) {
            // Extract the numeric part and replace comma with dot, if necessary
            $pullokokoValue = preg_replace('/[^0-9,]/', '', $row->Pullokoko);
            $pullokokoValue = str_replace(',', '.', $pullokokoValue);
            $pullokokoFloat = floatval($pullokokoValue);
    
            // Compare with the minimum value
            return $pullokokoFloat <= $pullokoko_max;
        });
    }
    if ($hintavali_min) {
        $data = array_filter($data, function ($row) use ($hintavali_min) {
            return $row->Hinta >= $hintavali_min;
        });
    }

    if ($hintavali_max) {
        $data = array_filter($data, function ($row) use ($hintavali_max) {
            return $row->Hinta <= $hintavali_max;
        });
    }

    if ($energiamaara_min) {
        $data = array_filter($data, function ($row) use ($energiamaara_min) {
            return isset($row->Energia) && $row->Energia >= $energiamaara_min;
        });
    }

    if ($energiamaara_max) {
        $data = array_filter($data, function ($row) use ($energiamaara_max) {
            return isset($row->Energia) &&  $row->Energia <= $energiamaara_max;
        });
    }
    return $data;
}
;
