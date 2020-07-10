<?php
// ¿Qué son los condicionales?
// Las declaraciones condicionales y se utilizan
// para ejecutar distintas acciones.

// EL COLEGIO ABRE A LAS 9
// Si son antes de las 9, el colegio esta cerrado.
// Si son después de las 9, el colegio esta abierto.

function comprobarColegioAbierto($consulta)
{
    if ($consulta < 9) {
        echo "El colegio esta cerrado." . PHP_EOL;
    } elseif ($consulta > 17) {
        echo "El colegio esta cerrado" . PHP_EOL;
    } else {
        echo "El colegio esta abierto" . PHP_EOL;
    }
}

comprobarColegioAbierto(23);

function switchPrueba($consulta)
{
    switch ($consulta) {
        case "Sabado":
            echo "El colegio esta cerrado." . PHP_EOL;
            break;

        case "Domingo":
            echo "El colegio esta cerrado." . PHP_EOL;
            break;

        default:
            echo "NO existe" . PHP_EOL;
    }
}

switchPrueba("Sasdfsdgsdfgsbado");
