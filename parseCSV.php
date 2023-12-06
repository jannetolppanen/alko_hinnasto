<?php
require_once 'getData.php';

function getTitle($filePath)
{
    if (($handle = fopen($filePath, "r")) !== FALSE) {
        // Luetaan vain ensimmäinen rivi
        $FirstTitle = fgetcsv($handle, 0, ',');

        if (!$FirstTitle) {
            fclose($handle);
            return null;
        }

        fclose($handle);

        return $FirstTitle;
    } else {
        die('failed');
    }
}

function parseCSV($filePath)
{
    if (($handle = fopen($filePath, "r")) !== FALSE) {
        
        fgets($handle);
        fgets($handle);
        fgets($handle);

        $objects = [];
        $keys = fgetcsv($handle, 0, ','); // Hae otsikkorivi

        if (!$keys) {
            fclose($handle);
            return null;
        }
        
        while (($data = fgetcsv($handle, 0, ',')) !== FALSE) {
            // Tarkista, että rivi sisältää tarvittavan määrän sarakkeita
            if (count($data) === count($keys)) {
                // Convert the encoding of each item to UTF-8 if necessary
                $encodedData = array_map(function ($item) {
                    // Attempt to detect encoding and convert to UTF-8 if not already
                    $encoding = mb_detect_encoding($item, mb_detect_order(), true);
                    return $encoding == "UTF-8" ? $item : utf8_encode($item);
                }, $data);

                $rowArray = array_combine($keys, $encodedData);
                $objects[] = (object)$rowArray;
            }
        }
        fclose($handle);

        return $objects;
    } else {
        die('failed');
    }
}