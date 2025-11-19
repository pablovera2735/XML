<?php

//Validar Ciudades.xml contra Ciudades.xsd


$xsdFile = __DIR__ . '/Ciudades.xsd';
$xmlFile = __DIR__ . '/CiudadesFake.xml';


$dom = new DOMDocument();
$dom->load($xmlFile);

if ($dom->schemaValidate($xsdFile)) {
    echo "El archivo XML es válido" . PHP_EOL;
} else {
    echo "El archivo XML no es válido" . PHP_EOL;
}
