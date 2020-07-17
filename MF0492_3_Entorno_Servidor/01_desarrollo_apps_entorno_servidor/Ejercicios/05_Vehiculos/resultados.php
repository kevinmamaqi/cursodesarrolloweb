<?php

// 1. Procesar los datos
// 2. Mostrar un resultado

// Variables de nombre, apellidos peso y altura.
// Mostraremos un mensaje acorde.

// $nombre = $_POST["nombre"];
// $apellidos = $_POST["apellidos"];
// $peso = $_POST["peso"];
// $altura = $_POST["altura"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados calculo IMC</title>
</head>
<body>
    <?php if (
        empty($nombre) ||
        empty($apellidos) ||
        empty($peso) ||
        empty($altura)
    ) : ?>
        <p>No podemos realizar el calculo, faltan datos.</p>
    <?php endif; ?>

    <?php if (!empty($nombre) && !empty($apellidos) && !empty($peso) && !empty($altura)) : ?>
        <?php echo '<p>Tu resultado: ' . ($peso / pow(($altura / 100), 2)) . '</p>'; ?>
    <?php endif; ?>
</body>
</html>