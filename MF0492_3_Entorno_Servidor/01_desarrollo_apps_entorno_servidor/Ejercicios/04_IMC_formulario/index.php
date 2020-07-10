<?php

include "./classes/class.FormularioIMC.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $CalculoIMC = new CalcularIMC(
        $_POST["nombre"],
        $_POST["apellidos"],
        $_POST["peso"],
        $_POST["altura"]
    );
}

$existeIMC = empty($CalculoIMC) ? false : true;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/light.min.css"
    />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Calcular IMC</title>
</head>
<body>
   
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <!-- INPUT NOMBRE -->
        <div class="grupo">
            <?php if ($existeIMC && !empty($CalculoIMC->errores["nombre"])) : ?>
                <input class="error-input" type="text" name="nombre" id="nombre" placeholder="Nombre">
                <?php echo $CalculoIMC->mensajes_error["nombre"]; ?>

            <?php elseif ($existeIMC && empty($CalculoIMC->errores["nombre"])) : ?>
                <input class="valid-input" type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $CalculoIMC->nombre; ?>">

            <?php else : ?>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            
            <?php endif; ?>
        </div>

        <!-- INPUT APELLIDOS -->
        <div class="grupo">
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
        </div>

        <!-- INPUT PESO -->
        <div class="grupo">
            <input type="text" name="peso" id="peso" placeholder="Peso">
        </div>
        
        <!-- INPUT ALTURA -->
        <div class="grupo">
            <input type="text" name="altura" id="altura" placeholder="Altura">
        </div>

        <button type="submit">Calcular IMC</button>
    </form>
</body>
</html>