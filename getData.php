<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;


$excelUrl = 'https://www.alko.fi/INTERSHOP/static/WFS/Alko-OnlineShop-Site/-/Alko-OnlineShop/fi_FI/Alkon%20Hinnasto%20Tekstitiedostona/alkon-hinnasto-tekstitiedostona.xlsx';

$excelData = file_get_contents($excelUrl);

if ($excelData === false) {
    die('Datan hakeminen urlista ei onnistunut');
}
$tempFile = tempnam(sys_get_temp_dir(), 'excel_');
if ($tempFile === false) {
    die('Luonti ei onnistunut');
}
if (file_put_contents($tempFile, $excelData) === false) {
    die('Datan kirjoitus ei onnistunut');
}
$spreadsheet = IOFactory::load($tempFile);
$csvFileName = __DIR__ . '/data/alkon-hinnasto-tekstitiedostona.csv';
$csvWriter = IOFactory::createWriter($spreadsheet, 'Csv');
$csvWriter->save($csvFileName);
?>