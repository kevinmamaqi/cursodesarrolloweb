<?php

function validarString($input) {
    $input = trim($input);
    $input = htmlspecialchars($input);
    return $input;
}
$formulario_enviado = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $formulario_enviado = true;
}

if ($formulario_enviado) {
    $errores = [];
    $nombre = validarString($_POST["nombre"]);
    $apellidos = validarString($_POST["apellidos"]);
    $peso = filter_var($_POST["peso"], FILTER_VALIDATE_INT);
    $altura = filter_var($_POST["altura"], FILTER_VALIDATE_INT);

    var_dump($peso);
    if ($peso === false) {
        $errores["peso"] = "El peso que has enviado no es valido.";
    }
    var_dump($altura);

    echo '<p>' . $peso . '</p>';
    echo '<p>' . $altura . '</p>';
}
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
    <?php if ($formulario_enviado) {
        $peso_valor = $_POST["peso"];
        $error_peso_mensaje = '<p style="color: #FF0000;">El peso que has enviado es incorrecto.</p>';
    } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="grupo">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        </div>

        <div class="grupo">
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
        </div>

        <!-- INPUT PESO -->
        <div class="grupo">
            <?php if (!empty($errores["peso"])) : ?>
                <input class="error-input" type="text" name="peso" id="peso" placeholder="Peso" value="<?php echo $peso_valor; ?>">
                <?php echo $error_peso_mensaje; ?>

            <?php elseif ($formulario_enviado && empty($errores["peso"])) : ?>
                <input class="valid-input" type="text" name="peso" id="peso" placeholder="Peso" value="<?php echo $peso_valor; ?>">
            
            <?php else : ?>
                <input type="text" name="peso" id="peso" placeholder="Peso">
            
            <?php endif; ?>
        </div>

        <div class="grupo">
            <input type="text" name="altura" id="altura" placeholder="Altura">
        </div>

        <button type="submit">Calcular IMC</button>
    </form>
</body>
</html>