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
            <?php if ($existeIMC && !empty($CalculoIMC->errores["apellidos"])) : ?>
                <input class="error-input" type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                <?php echo $CalculoIMC->mensajes_error["apellidos"]; ?>
            
            <?php elseif ($existeIMC && empty($CalculoIMC->errores["apellidos"])) : ?>
                <input class="valid-input" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?php echo $CalculoIMC->apellidos; ?>">
            
            <?php else : ?>
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
            
            <?php endif; ?>
                
        </div>

        <!-- INPUT PESO -->
        <div class="grupo">
            <?php if ($existeIMC && !empty($CalculoIMC->errores["peso"])) : ?>
                <input class="error-input" type="text" name="peso" id="peso" placeholder="Peso" value="<?php echo $CalculoIMC->peso; ?>">
                <?php echo $CalculoIMC->mensajes_error["peso"]; ?>
            
            <?php elseif ($existeIMC && empty($CalculoIMC->errores["peso"])) : ?>
                <input class="valid-input" type="text" name="peso" id="peso" placeholder="Peso" value="<?php echo $CalculoIMC->peso; ?>">

            <?php else : ?>
                <input type="text" name="peso" id="peso" placeholder="Peso">

            <?php endif; ?>
        </div>
        
        <!-- INPUT ALTURA -->
        <div class="grupo">
            <?php if ($existeIMC && !empty($CalculoIMC->errores["altura"])) : ?>
                <input class="error-input" type="text" name="altura" id="altura" placeholder="Altura" value="<?php echo $CalculoIMC->altura; ?>">
                <?php echo $CalculoIMC->mensajes_error["altura"]; ?>
            
            <?php elseif ($existeIMC && empty($CalculoIMC->errores["altura"])) : ?>
                <input class="valid-input" type="altura" name="altura" id="altura" placeholder="Altura" value="<?php echo $CalculoIMC->altura; ?>">

            <?php else : ?>
                <input type="text" name="altura" id="altura" placeholder="Altura">

            <?php endif; ?>
        </div>

        <button type="submit">Calcular IMC</button>
    </form>

    <?php if ($existeIMC && empty($CalculoIMC->errores)) : ?>
        <hr>
        <h2>Resultado</h2>
        <?php
            // $CalculoIMC->devolverCalculoIMC();

            // https://www.php.net/manual/es/function.file-put-contents.php
            $resultado = $CalculoIMC->guardarResultados();
            file_put_contents("resultadosIMC.txt", $resultado, FILE_APPEND);
        ?>
    <?php endif; ?>
</body>
</html>