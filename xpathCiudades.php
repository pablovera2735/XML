<?php

//Pedir un nombre o trozo de nombre de ciudad.
//Mostrar las ciudad/es de la consulta con xpath.

$xmlFile = __DIR__ . '/Ciudades.xml';

if (!empty($argv[1]) && (intval($argv[1])) == 0) {
    $patron = $argv[1];
    $dom = new DOMDocument();
    $dom->load($xmlFile);
    $xpath = new DOMXPath($dom);
    // //Ciudad[contains(City,'aixi')]
    foreach ($xpath->query("//Ciudad$patron']") as $result) {
        print_r($result->ownerDocument->saveXML($result));
        die();
    }

} else {
    echo "indique el patrón de búsqueda a continuación del script" . PHP_EOL;
}