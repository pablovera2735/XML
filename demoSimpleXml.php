<?php

const FICHERO = '/datos/nominas.xml';

//Cargar del disco al objeto
$xml = simplexml_load_file(FICHERO);

//Ver el objeto
//print_r($xml);

//Ver una pieza
//echo $xml->nomina[0]->irpf . PHP_EOL;

//Ver todas las piezas
//foreach ($xml->nomina as $nomina) {
//echo $nomina->nombre . " " . $nomina->fechaAlta . " " . $nomina->bruto . " " . $nomina->irpf . PHP_EOL;
//}

//Cambiar el valor de una pieza
//$xml->nomina[1]->irpf = 25;

//Borrar un elemento
//unset($xml->nomina[0]);

/*<nombre>Ana Sánchez</nombre>
        <fechaAlta>2020/01/10</fechaAlta>
        <bruto>2230.15</bruto>
        <irpf>18.4</irpf>
*/
//Insertar un elemento
$nomina = $xml->addChild('nomina');
$nomina->addChild("nombre", "Nuevo empleado");
$nomina->addChild("fechaAlta", "2018/10/15");
$nomina->addChild("bruto", "1874.25");
$nomina->addChild("irpf", "15.6");

//Guardar cambios en disco
file_put_contents(FICHERO, $xml->asXML());