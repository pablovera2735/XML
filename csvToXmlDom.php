<?php
//ToDo: Tomando como origen Pilotos.csv construir Pilotos.xml con Dom

const FICHEROCSV = __DIR__ . '/Pilotos.csv';
const FICHERO = 'Pilotos.xml';

$doc = new DOMDocument('1.0', 'UTF-8');
$raiz = $doc->createElement('Pilotos');
$doc->appendChild($raiz);

if (($gestor = fopen(FICHEROCSV, "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
        $piloto = $doc->createElement("Piloto");
        $attrId = $doc->createAttribute("id");
        $attrId->value = $datos[0];
        $piloto->appendChild($attrId);
        $attrNum = $doc->createAttribute("numero");
        $attrNum->value = $datos[4];
        $piloto->appendChild($attrNum);
        $piloto->appendChild(
            $doc->createElement("Nombre", $datos[1])
        );
        $piloto->appendChild(
            $doc->createElement("NombreCorto", $datos[2])
        );
        $piloto->appendChild(
            $doc->createElement("Escuderia", $datos[3])
        );
        $raiz->appendChild($piloto);
    }
    fclose($gestor);
}

print_r($doc->saveXML());

//Guardar cambios en disco
$doc->save(FICHERO);