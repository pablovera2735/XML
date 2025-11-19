<?php
const FICHEROCSV = __DIR__ . '/Pilotos.csv';

if (($gestor = fopen(FICHEROCSV, "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ";")) !== FALSE) {
        print_r($datos);
    }
    fclose($gestor);
}