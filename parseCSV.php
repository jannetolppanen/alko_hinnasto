<?php

// Parsitaan csv muuttujaan
function parseCSV($filePath)
{
    if (($handle = fopen($filePath, "r")) !== FALSE) {
        $objects = [];
        $keys = fgetcsv($handle, 0, ';');

        if (!$keys) {
            return null;
        }

        while (($data = fgetcsv($handle, 0, ';')) !== FALSE) {
            // Convert the encoding of each item to UTF-8 if necessary
            $encodedData = array_map(function ($item) {
                // Attempt to detect encoding and convert to UTF-8 if not already
                $encoding = mb_detect_encoding($item, mb_detect_order(), true);
                return $encoding == "UTF-8" ? $item : utf8_encode($item);
            }, $data);

            $rowArray = array_combine($keys, $encodedData);
            $objects[] = (object) $rowArray;
        }
        fclose($handle);

        return $objects;
    } else {
        return null;
    }
}