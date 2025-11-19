<?php

const JSON = 'aditivos.json';
const XML = 'aditivos.xml';

$json = json_decode(file_get_contents(JSON), true);

$aditivosAgrupados = [];

foreach ($json as $item) {
    $aditivosAgrupados[$item['peligrosidad']][] = [
        "nombre" => $item['name'],
        'comentario' => $item['comentario']
    ];
}

$xml = simplexml_load_string('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Aditivos></Aditivos>');

foreach ($aditivosAgrupados as $k => $aditivos) {
    $nodoAditivos = $xml->addChild("Aditivo");
    $nodoAditivos->addAttribute("tipo", $k);
    foreach ($aditivos as $aditivo) {
        $nodoAditivo = $nodoAditivos->addChild("Elemento");
        $nodoAditivo->addChild("Nombre", $aditivo['nombre']);
        $nodoAditivo->addChild("Comentario", $aditivo['comentario']);
    }
}

print_r($xml->asXML());
file_put_contents(XML, $xml->asXML());

