<?php
require_once 'parseCSV.php';

function filter($tyyppi = null, $valmistusmaa = null, $pullokoko = null, $hintamin = null, $hintamax = null, $energiamin = null, $energiamax = null)
{
    $data = parseCSV('./data/alkon-hinnasto-tekstitiedostona.csv');
    if ($valmistusmaa) {
        $data = array_filter($data, function ($row) use ($valmistusmaa) {
            // Use stripos for case-insensitive and partial match
            return stripos($row->Valmistusmaa, $valmistusmaa) !== false;
        });
    }
    return $data;
};
