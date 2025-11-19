<?php

const FICHERO = '/datos/nominas.xml';

//Cargar del disco al objeto
$doc = new DOMDocument();
$doc->load(FICHERO);

//Ver el objeto
//print_r($doc);

//Ver el contenido en formato string
//print_r($doc->saveXML());


//IMPORTANTE: obtener el nodo raíz
$raiz = $doc->documentElement;

//Ver todas las piezas
/*foreach ($raiz->childNodes as $nomina) {
    foreach ($nomina->childNodes as $empleado) {
        if ($empleado->nodeType == XML_ELEMENT_NODE) {
            echo $empleado->nodeName . " >>>> ";
            echo $empleado->nodeValue . PHP_EOL;
        }
    }
}*/

//Ver todas las piezas
/*foreach ($raiz->childNodes as $nomina) {
    if ($nomina->nodeType == XML_ELEMENT_NODE) {
        echo $nomina->getElementsByTagName("nombre")->item(0)->nodeValue . " ";
        echo $nomina->getElementsByTagName("fechaAlta")->item(0)->nodeValue . " ";
        echo $nomina->getElementsByTagName("bruto")->item(0)->nodeValue . " ";
        echo $nomina->getElementsByTagName("irpf")->item(0)->nodeValue . PHP_EOL;
    }
}*/

//Cambiar el valor de una pieza
/*foreach ($raiz->childNodes as $nomina) {
    foreach ($nomina->childNodes as $empleado) {
        if ($empleado->nodeType == XML_ELEMENT_NODE) {
            if ($empleado->nodeName == "irpf") {
                $empleado->nodeValue = $empleado->nodeValue * 1.15;
            }
        }
    }
}
print_r($doc->saveXML());*/

//Borrar un elemento
/*$nodosBorrar = [];
foreach ($raiz->childNodes as $nomina) {
    foreach ($nomina->childNodes as $empleado) {
        if ($empleado->nodeType == XML_ELEMENT_NODE) {
            if ($empleado->nodeName == "irpf" && $empleado->nodeValue == 15.6) {
                $nodosBorrar[] = $nomina;
            }
        }
    }
}
foreach ($nodosBorrar as $nodo) {
    $nodo->parentNode->removeChild($nodo);
}
print_r($doc->saveXML());*/

//Insertar elemento
$nomina = $doc->createElement("nomina");
$nomina->appendChild(
    $doc->createElement("nombre", "Nuevo desde dom")
);
$nomina->appendChild(
    $doc->createElement("fechaAlta", "2010/05/20")
);
$nomina->appendChild(
    $doc->createElement("bruto", "2571.45")
);
$nomina->appendChild(
    $doc->createElement("irpf", "14.5")
);
$doc->appendChild($nomina);
print_r($doc->saveXML());

//Guardar cambios en disco
//$doc->save(FICHERO);
