<?php
//ToDo : Tomando como origen Pilotos.csv construir Pilotos.xml con SimpleXml

const FICHEROCSV = __DIR__ . '/Pilotos.csv';
const FICHERO = 'Pilotos.xml';


$xml = simplexml_load_string('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Pilotos></Pilotos>');

if (($gestor = fopen(FICHEROCSV, "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
        $piloto = $xml->addChild('Piloto');
        $piloto->addAttribute("id", $datos[0]);
        $piloto->addAttribute("numero", $datos[4]);
        $piloto->addChild("Nombre", $datos[1]);
        $piloto->addChild("NombreCorto", $datos[2]);
        $piloto->addChild("Escuderia", $datos[3]);
    }
    fclose($gestor);
}
print_r($xml->asXML());
file_put_contents(FICHERO, $xml->asXML());