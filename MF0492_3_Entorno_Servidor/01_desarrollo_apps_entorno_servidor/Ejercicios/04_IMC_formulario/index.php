<?php

// Tiene que contener el formulario.
// Campos del formulario: nombre, apellidos, peso y altura.
// Botón de enviar, lo llamaremos Calcular IMC.

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IMC</title>
</head>
<body>
    <form action="resultados.php" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
        <input type="number" name="peso" id="peso" placeholder="Peso">
        <input type="number" name="altura" id="altura" placeholder="Altura">
        <button type="submit">Calcular IMC</button>
    </form>
</body>
</html>