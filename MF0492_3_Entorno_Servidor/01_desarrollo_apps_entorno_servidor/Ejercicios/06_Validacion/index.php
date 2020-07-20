<?php

include "./classes/class.Validacion.php";
$Validacion = new Validacion();


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $provincia = !empty($_POST["provincia"]) ? $_POST["provincia"] : "";
    
    $Validacion->envioFormulario(
        $_POST["nombre_usuario"],
        $provincia
    );
}

$existeValidacion = !empty($Validacion) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false;
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
    <title>Enviar Formulario</title>
</head>
<body>
    <h1>Enviar Formulario</h1>

    <?php
        $hayerrores = $Validacion->hayErrores();
        
        if ($hayerrores === false) {
            $nombreUsuario = $Validacion->guardarArchivo();
            file_put_contents("./nombres_de_usuario.txt", $nombreUsuario, FILE_APPEND);
        } else {
            echo "<p>Hay errores, por favor revisa el formulario.</p>";
        }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <!-- INPUT NOMBRE -->
        <div class="grupo">
            <!-- PRIMERO COMPROBAR QUE SE HA ENVIADO Y HAY ERROR -->
            <?php if ($existeValidacion && !empty($Validacion->errores["nombre_usuario"])) : ?>

                <!-- SEGUNDO COMPROBAR QUE ERROR ES (VACIO O ERRONEO) -->
                <!-- MOSTRAR EL ERROR DE MANERA ACORDE -->
                <?php if (!empty($Validacion->errores["nombre_usuario"]["vacio"])) : ?>
                    <input class="error-input" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre">
                    <?php echo $Validacion->mensajes_error["nombre_usuario"]["vacio"]; ?>

                <?php else : ?>
                    <input class="error-input" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre" value="<?php echo $Validacion->nombre_usuario; ?>">
                    <?php echo $Validacion->mensajes_error["nombre_usuario"]["erroneo"]; ?>

                <?php endif; ?>

            <?php elseif ($existeValidacion && empty($Validacion->errores["nombre_usuario"])) : ?>
                <input class="valid-input" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre" value="<?php echo $Validacion->nombre_usuario; ?>">

            <?php else : ?>
                <input type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre">
            
            <?php endif; ?>
        </div>

        <!-- Provincia -->
        <div class="grupo"> 
            <?php if ($existeValidacion && !empty($Validacion->errores["provincia"])) : ?>
                <p style="color: red;">Distribución</p>

                <!-- SEGUNDO COMPROBAR QUE ERROR ES (VACIO O ERRONEO) -->
                <!-- MOSTRAR EL ERROR DE MANERA ACORDE -->
                <?php if (!empty($Validacion->errores["provincia"]["vacio"])) : ?>
                    <p><?php echo $Validacion->mensajes_error["provincia"]["vacio"]; ?></p>
                    
                <?php else : ?>
                    <p><?php echo $Validacion->mensajes_error["provincia"]["erroneo"]; ?></p>
                
                <?php endif; ?>

            <?php else : ?>
                <p>Distribución</p>
            <?php endif; ?>

            <?php foreach ($Validacion->provincias_validas as $key => $value) : ?>
                <div class="grupo grupo-radio">
                    <input
                        type="radio"
                        id="<?php echo $key; ?>"
                        value="<?php echo $key; ?>"
                        name="provincia"
                        <?php echo $Validacion->provincia === $key ? "checked" :  "" ?>
                    />
                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit">Enviar</button>
    </form>

</body>
</html>