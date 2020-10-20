<?php

/*
 PROBLEMAS:
 1. Al enviar un checkbox no-seleccionado, este no se guarda en el array.
 2. Al enviar un checkbox seleccionado, este se guarda como string "on".

 Si lo que deseo es guardar en la Base de Datos un tipo BOOLEAN, necesito
 transformar el string "on" a 1, y si no existe, pasar un 0.

 Para hacerlo debo comprobar si el checkbox se ha seleccionado. Es decir,
 si existe como índice (key) en el array asociativo.

 Si existe (independientemente de como se llame) pasare verdadero. 1
 Si no existe, pasare falseo. 0

 array_key_exists('millave', $array_donde_buscar) -> Devuelve 1 (si exsite) o 0 (si no existe).

*/

// PRUEBA
$miArray = [
    'x' => 'hola',
    'y' => 'adios'
];

$resultadoX = array_key_exists('x', $miArray) ? 1 : 0;
$resultadoZ = array_key_exists('z', $miArray) ? 1 : 0;


echo "El valor de X es: " . $resultadoX . ", y el valor de Z es: " . $resultadoZ . "." . PHP_EOL;
