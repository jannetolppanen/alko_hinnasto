<?php

function parseCSV($filePath) {
    // Open the CSV file
    if (($handle = fopen($filePath, "r")) !== FALSE) {
        // Initialize an array to hold your objects
        $objectsArray = [];

        // Get the first row and use it as keys
        $keys = fgetcsv($handle, 0, ';');

        // Check if keys are correctly retrieved, if not exit the function
        if (!$keys) {
            return null;
        }

        // Loop through each subsequent row of the CSV
        while (($data = fgetcsv($handle, 0, ';')) !== FALSE) {
            // Convert the encoding of each item to UTF-8 if necessary
            $encodedData = array_map(function($item) {
                // Attempt to detect encoding and convert to UTF-8 if not already
                $encoding = mb_detect_encoding($item, mb_detect_order(), true);
                return $encoding == "UTF-8" ? $item : utf8_encode($item);
            }, $data);

            // Combine the keys and the row data into an associative array
            $rowArray = array_combine($keys, $encodedData);

            // Add the associative array as an object to the final array
            $objectsArray[] = (object)$rowArray;
        }

        // Close the file
        fclose($handle);

        // Return the array of objects
        return $objectsArray;
    } else {
        // Return null if file can't be opened
        return null;
    }
}