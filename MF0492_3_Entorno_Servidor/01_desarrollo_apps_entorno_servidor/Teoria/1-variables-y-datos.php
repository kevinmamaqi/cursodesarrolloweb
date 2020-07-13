<?php

// Las variables son contenedores (lugar en la memoria)
// que se utiliza para almacenar datos.
// Declarar variables

// Variables númericas
$x = 3;
$y = 5;
$z = $x + $y;
// echo $z . PHP_EOL;
// $decimales = 0.003;
// echo $decimales . PHP_EOL;
// $exponencial = 100e3;
// echo $exponencial . PHP_EOL;

// // Cadenas (frases, caracteres)
$dia = "Buenos días ";
$noche = "Buenas noches ";
$nombre = "Kevin";
echo $dia . $nombre . PHP_EOL; // Concatenación de frases
echo $noche . $nombre . PHP_EOL; // Concatenación de frases

// // // Probar a unir números y frases
// echo $dia . $x . PHP_EOL;

// // Sobreescribir variables
// echo $x . PHP_EOL;
// $x = 9;
// echo $x . PHP_EOL;

// // Let y Const
// // VARIABLE CONSTANTE no puedo reasignarle un valor
// const nombre = "Kevin";

define("barcelona", "Barcelona");
echo barcelona . PHP_EOL;

// Array (lista, o matriz)
$listaDeClase = [
    "Cer 1",
    "Cer 2",
    "Cer 3",
    "Cer 4"
];
print_r($listaDeClase[0][1]);

// Objetos de javascript son arrays asociativos en PHP.
$alumno = [
    "cer1" => "Cer 1",
    "cer2" => "Cer 2",
    [
        "errores" => "mi error",
        "vacio" => "esta vacio"
    ]
];
print_r($alumno["apellidos"]);

// // Variables undefined en PHP seria la variable NULL, que significa una variable sin valor.
$datosUsuario = NULL;

if ($datosUsuarios === NULL) {
    echo "esta vacio";
}

var_dump($datosUsuario);


// BOOLEANS
$verdadero = true;
$falso = false;
