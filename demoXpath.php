<?php
const FICHERO = '/datos/Pilotos.xml';

//Cargar del disco al objeto
$doc = new DOMDocument();
$doc->load(FICHERO);

//Un valor único
$xpath = new DOMXPath($doc);
$piloto = $xpath->query('//Piloto[@id="4"]')->item(0);
echo $piloto->getElementsByTagName('Nombre')[0]->nodeValue . PHP_EOL;

//Conjunto de valores
$xpath = new DOMXPath($doc);
foreach ($xpath->query("//Piloto[Escuderia='Alpine']") as $pilotos) {
    echo $pilotos->getElementsByTagName('Nombre')[0]->nodeValue . PHP_EOL;
}

