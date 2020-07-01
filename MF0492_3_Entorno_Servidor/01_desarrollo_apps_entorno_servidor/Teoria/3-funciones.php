<?php

// FUNCIONES
// Bloques de código "paquetizados" para realizar una tarea especifica.

// 1. Como crear (declarar una función)
// 2. Como invocar esa función.

// 1. Como crear (declarar una función)
function indiceMasaCorporal($peso, $altura, $edad)
{
    return (($peso / $altura) * 0.25) / $edad . PHP_EOL;
}
$indiceMasa = indiceMasaCorporal(80, 1.80, 80);
echo $indiceMasa;

function evaluarPaciente($edad, $nombre, $peso, $altura)
{
    $resultado = indiceMasaCorporal($peso, $altura, $edad);

    if ($resultado > 0.25) {
        return "El paciente " . $nombre . " tiene que salir a correr.";
    } else {
        return "El paciente " . $nombre . " esta sano.";
    }
}

$resultadoPaciente = evaluarPaciente(50, "ZXY", 80, 1.80);
echo $resultadoPaciente;

function suma($x, $y) {
    return $x + $y;
}


// function miFuncion($parametro1, $parametro2, ..., $parametroN) {
//     return $parametro1 + $parametro2;
// }
