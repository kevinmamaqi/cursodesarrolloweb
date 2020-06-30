<?php
// Que son los bucles
// Los bucles permiten ejecutar un bloque de código
// (el bloque puede ser funciones, condicionales, asignaciones...)
// varias veces.

// Las veces que se ejecuta el bucle
// viene determinado por la condición que imponemos.
// RESPONSABILIDAD: No podemos utilizar condiciones
// que permitan que se ejecute infinitamente.

// Que significa ++
// Incrementa en una unidad por cada ciclo.

// for ($i = 0; $i < 5; $i++) {
//     echo $i . PHP_EOL;
// }

// $listaDeClase = [
//     "Raul",
//     "Cristina",
//     ["Kevin", "Maria"],
//     ["Marcos", "Pedro"],
// ];

// // Length nos devuelve el número de elementos del ARRAY.
// for ($i = 0; $i < count($listaDeClase); $i++) {
//     if (gettype($listaDeClase[$i]) === "array") {
        
//         $subLista = $listaDeClase[$i];
        
//         for ($a = 0; $a < count($subLista); $a++) {
//             $nombre = $subLista[$a];
//             echo $nombre . PHP_EOL;
//         }
//     } else {
//         echo $listaDeClase[$i] . PHP_EOL;
//     }
// }

// BUCLE WHILE (MIENTRAS)
// $i = 0;
// while ($i < 10) {
//     echo "Hola " . $i . " veces" . PHP_EOL;
//     $i++;
// }

// // DO WHILE (HAZ MIENTRAS)
// $x = 0;
// do {
//     echo "Hola " . $x . " veces" . PHP_EOL;
//     $x++;
// } while ($x < 10);

$x = 0;
while ($x < 10) {
    echo "Hola " . $x . " veces" . PHP_EOL;
    $x++;
}
