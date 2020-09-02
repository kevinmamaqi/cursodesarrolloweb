<?php

include "./classes/class.Validacion.php";
$Validacion = new Validacion();



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // COMPROBAMOS SI SE HA ENVIADO PROVINCIA Y LO ENVIAMOS 
    $aire_acondicionado = !empty($_POST["aire_acondicionado"]) ? $_POST["aire_acondicionado"] : "";
    $certificacion = !empty($_POST["certificacion"]) ? $_POST["certificacion"] : "";
    
    $Validacion->envioFormulario(
        $_POST["titulo"],
        $_POST["descripcion"],
        $_POST["n_habitaciones"],
        $aire_acondicionado,
        $certificacion
    );
}

$existeValidacion = !empty($Validacion) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false;
$hayerrores = $Validacion->hayErrores();
?>

<?php
echo "<pre>";
var_dump($Validacion->aire_acondicionado);
var_dump($aire_acondicionado);
echo "</pre>";
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <!-- INPUT NOMBRE -->
    <div class="grupo">
        <label for="titulo">Título</label>
       
        <!-- PRIMERO COMPROBAR QUE SE HA ENVIADO Y HAY ERROR -->
        <?php if ($existeValidacion && !empty($Validacion->errores["titulo"])) : ?>

            <!-- SEGUNDO COMPROBAR QUE ERROR ES (VACIO O ERRONEO) -->
            <!-- MOSTRAR EL ERROR DE MANERA ACORDE -->
            <?php if (!empty($Validacion->errores["titulo"]["vacio"])) : ?>
                <input class="error-input" type="text" name="titulo" id="titulo" placeholder="Título">
                <?php echo $Validacion->mensajes_error["titulo"]["vacio"]; ?>

            <?php else : ?>
                <input class="error-input" type="text" name="titulo" id="titulo" placeholder="Título" value="<?php echo $Validacion->titulo; ?>">
                <?php echo $Validacion->mensajes_error["titulo"]["erroneo"]; ?>

            <?php endif; ?>

        <?php elseif ($existeValidacion && empty($Validacion->errores["titulo"])) : ?>
            <input class="valid-input" type="text" name="titulo" id="titulo" placeholder="Título" value="<?php echo $Validacion->titulo; ?>">

        <?php else : ?>
            <input type="text" name="titulo" id="titulo" placeholder="Título">
        
        <?php endif; ?>
    </div>

    <div class="grupo">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion"></textarea>
    </div>

    <div class="grupo">
        <label for="n_habitaciones">Número de habitaciones</label>
        <input type="number" name="n_habitaciones" id="n_habitaciones">
    </div>

    <div class="grupo grupo-checkbox">
        <input
            type="checkbox"
            id="aire_acondicionado"
            value="aire_acondicionado"
            name="aire_acondicionado"
            <?php echo $Validacion->aire_acondicionado ? "checked" :  "" ?>
        />
        <label for="aire_acondicionado">¿Tiene aire acondicionado?</label>
    </div>

    <div class="grupo">
        <label for="certificacion">Certificación energetica:</label>
        <select name="certificacion" id="certificacion">
            <option value="" selected disabled>--Por favor escoge una opción--</option>
            <option value="A">Certificación A</option>
            <option value="AA">Certificación AA</option>
            <option value="AAA">Certificación AAA</option>
        </select>
    </div>

    <button type="submit" class="submit">Enviar propiedad</div>
</form>