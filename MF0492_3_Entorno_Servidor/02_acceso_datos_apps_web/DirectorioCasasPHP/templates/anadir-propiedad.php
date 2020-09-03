<?php

include "./classes/class.Validacion.php";
$Validacion = new Validacion();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // COMPROBAMOS SI SE HA ENVIADO PROVINCIA Y LO ENVIAMOS 
    $aire_acondicionado = !empty($_POST["aire_acondicionado"]) ? $_POST["aire_acondicionado"] : "";
    $ascensor = !empty($_POST["ascensor"]) ? $_POST["ascensor"] : "";
    $garaje = !empty($_POST["garaje"]) ? $_POST["garaje"] : "";
    $amueblada = !empty($_POST["amueblada"]) ? $_POST["amueblada"] : "";
    $jardin = !empty($_POST["jardin"]) ? $_POST["jardin"] : "";
    $sotano = !empty($_POST["sotano"]) ? $_POST["sotano"] : "";
    $certificacion = !empty($_POST["certificacion"]) ? $_POST["certificacion"] : "";
    $usuario = !empty($_POST["usuario"]) ? $_POST["usuario"] : "";

    $Validacion->envioFormulario(
        $_FILES["foto_casa"],
        $_POST["titulo"],
        $_POST["descripcion"],
        $_POST["n_habitaciones"],
        $_POST["metros_cuadrados"],
        $aire_acondicionado,
        $ascensor,
        $_POST["n_banios"],
        $garaje,
        $amueblada,
        $jardin,
        $_POST["n_pisos"],
        $sotano,
        $certificacion,
        $usuario
    );
}

$existeValidacion = !empty($Validacion) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false;
$hayerrores = $Validacion->hayErrores();
?>
<form
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
    method="post"
    enctype="multipart/form-data">

    <!-- FOTOGRAFÍA -->
    <div class="grupo">
        <label for="foto_casa">Fotografía</label>
        <input
            type="file"
            name="foto_casa"
            id="foto_casa"
            accept="image/*"
        />
        
    </div>

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

    <!-- TEXTAREA -->
    <div class="grupo">
        <label for="descripcion">Descripción</label>
       
        <!-- PRIMERO COMPROBAR QUE SE HA ENVIADO Y HAY ERROR -->
        <?php if ($existeValidacion && !empty($Validacion->errores["titulo"])) : ?>

            <!-- SEGUNDO COMPROBAR QUE ERROR ES (VACIO O ERRONEO) -->
            <!-- MOSTRAR EL ERROR DE MANERA ACORDE -->
            <?php if (!empty($Validacion->errores["titulo"]["vacio"])) : ?>
             
                <textarea class="error-input" name="descripcion" id="descripcion"><?php echo $Validacion->descripcion; ?></textarea>
                <?php echo $Validacion->mensajes_error["descripcion"]["vacio"]; ?>

            <?php else : ?>
                <textarea class="error-input" name="descripcion" id="descripcion"><?php echo $Validacion->descripcion; ?></textarea>
                <?php echo $Validacion->mensajes_error["descripcion"]["erroneo"]; ?>

            <?php endif; ?>

        <?php elseif ($existeValidacion && empty($Validacion->errores["descripcion"])) : ?>
            <textarea class="valid-input" name="descripcion" id="descripcion"><?php echo $Validacion->descripcion; ?></textarea>

        <?php else : ?>
            <textarea name="descripcion" id="descripcion"></textarea>
        
        <?php endif; ?>
    </div>


    <!-- INPUT NÚMERO DE HABITACIONES -->
    <div class="grupo">
        <label for="n_habitaciones">Número de habitaciones</label>
       
        <!-- PRIMERO COMPROBAR QUE SE HA ENVIADO Y HAY ERROR -->
        <?php if ($existeValidacion && !empty($Validacion->errores["n_habitaciones"])) : ?>

            <!-- SEGUNDO COMPROBAR QUE ERROR ES (VACIO O ERRONEO) -->
            <!-- MOSTRAR EL ERROR DE MANERA ACORDE -->
            <?php if (!empty($Validacion->errores["n_habitaciones"]["vacio"])) : ?>
                <input class="error-input" type="number" name="n_habitaciones" id="n_habitaciones" placeholder="Número de habitaciones">
                <?php echo $Validacion->mensajes_error["n_habitaciones"]["vacio"]; ?>

            <?php else : ?>
                <input class="error-input" type="number" name="n_habitaciones" id="n_habitaciones" placeholder="Número de habitaciones" value="<?php echo $Validacion->n_habitaciones; ?>">
                <?php echo $Validacion->mensajes_error["n_habitaciones"]["erroneo"]; ?>

            <?php endif; ?>

        <?php elseif ($existeValidacion && empty($Validacion->errores["n_habitaciones"])) : ?>
            <input class="valid-input" type="number" name="n_habitaciones" id="n_habitaciones" placeholder="Número de habitaciones" value="<?php echo $Validacion->n_habitaciones; ?>">

        <?php else : ?>
            <input type="number" name="n_habitaciones" id="n_habitaciones" placeholder="Número de habitaciones">
        
        <?php endif; ?>
    </div>

    <!-- INPUT METROS CUADRADOS -->
    <div class="grupo">
        <label for="m_cuadrados">Metros cuadrados</label>
       
        <!-- PRIMERO COMPROBAR QUE SE HA ENVIADO Y HAY ERROR -->
        <?php if ($existeValidacion && !empty($Validacion->errores["m_cuadrados"])) : ?>

            <!-- SEGUNDO COMPROBAR QUE ERROR ES (VACIO O ERRONEO) -->
            <!-- MOSTRAR EL ERROR DE MANERA ACORDE -->
            <?php if (!empty($Validacion->errores["m_cuadrados"]["vacio"])) : ?>
                <input class="error-input" type="number" name="m_cuadrados" id="m_cuadrados" placeholder="Metros cuadrados">
                <?php echo $Validacion->mensajes_error["m_cuadrados"]["vacio"]; ?>

            <?php else : ?>
                <input class="error-input" type="number" name="m_cuadrados" id="m_cuadrados" placeholder="Metros cuadrados" value="<?php echo $Validacion->m_cuadrados; ?>">
                <?php echo $Validacion->mensajes_error["m_cuadrados"]["erroneo"]; ?>

            <?php endif; ?>

        <?php elseif ($existeValidacion && empty($Validacion->errores["m_cuadrados"])) : ?>
            <input class="valid-input" type="number" name="m_cuadrados" id="m_cuadrados" placeholder="Metros cuadrados" value="<?php echo $Validacion->m_cuadrados; ?>">

        <?php else : ?>
            <input type="number" name="m_cuadrados" id="m_cuadrados" placeholder="Metros cuadrados">
        
        <?php endif; ?>
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

    <div class="grupo grupo-checkbox">
        <input
            type="checkbox"
            id="ascensor"
            value="ascensor"
            name="ascensor"
            <?php echo $Validacion->ascensor ? "checked" :  "" ?>
        />
        <label for="ascensor">¿Dispone de ascensor?</label>
    </div>

    <!-- INPUT METROS CUADRADOS -->
    <div class="grupo">
        <label for="n_banios">Baños</label>
       
        <!-- PRIMERO COMPROBAR QUE SE HA ENVIADO Y HAY ERROR -->
        <?php if ($existeValidacion && !empty($Validacion->errores["n_banios"])) : ?>

            <!-- SEGUNDO COMPROBAR QUE ERROR ES (VACIO O ERRONEO) -->
            <!-- MOSTRAR EL ERROR DE MANERA ACORDE -->
            <?php if (!empty($Validacion->errores["n_banios"]["vacio"])) : ?>
                <input class="error-input" type="number" name="n_banios" id="n_banios" placeholder="Baños">
                <?php echo $Validacion->mensajes_error["n_banios"]["vacio"]; ?>

            <?php else : ?>
                <input class="error-input" type="number" name="n_banios" id="n_banios" placeholder="Baños" value="<?php echo $Validacion->n_banios; ?>">
                <?php echo $Validacion->mensajes_error["n_banios"]["erroneo"]; ?>

            <?php endif; ?>

        <?php elseif ($existeValidacion && empty($Validacion->errores["n_banios"])) : ?>
            <input class="valid-input" type="number" name="n_banios" id="n_banios" placeholder="Baños" value="<?php echo $Validacion->n_banios; ?>">

        <?php else : ?>
            <input type="number" name="n_banios" id="n_banios" placeholder="Baños">
        
        <?php endif; ?>
    </div>

    <div class="grupo grupo-checkbox">
        <input
            type="checkbox"
            id="garaje"
            value="garaje"
            name="garaje"
            <?php echo $Validacion->garaje ? "checked" :  "" ?>
        />
        <label for="garaje">¿Tiene garaje?</label>
    </div>

    <div class="grupo grupo-checkbox">
        <input
            type="checkbox"
            id="amueblada"
            value="amueblada"
            name="amueblada"
            <?php echo $Validacion->amueblada ? "checked" :  "" ?>
        />
        <label for="amueblada">¿Esta amueblada?</label>
    </div>

    <div class="grupo grupo-checkbox">
        <input
            type="checkbox"
            id="jardin"
            value="jardin"
            name="jardin"
            <?php echo $Validacion->jardin ? "checked" :  "" ?>
        />
        <label for="jardin">¿Tiene jardín?</label>
    </div>

    <!-- INPUT NÚMERO DE PISOS -->
    <div class="grupo">
        <label for="n_banios">Número de pisos</label>
       
        <!-- PRIMERO COMPROBAR QUE SE HA ENVIADO Y HAY ERROR -->
        <?php if ($existeValidacion && !empty($Validacion->errores["n_pisos"])) : ?>

            <!-- SEGUNDO COMPROBAR QUE ERROR ES (VACIO O ERRONEO) -->
            <!-- MOSTRAR EL ERROR DE MANERA ACORDE -->
            <?php if (!empty($Validacion->errores["n_pisos"]["vacio"])) : ?>
                <input class="error-input" type="number" name="n_pisos" id="n_pisos" placeholder="Pisos">
                <?php echo $Validacion->mensajes_error["n_pisos"]["vacio"]; ?>

            <?php else : ?>
                <input class="error-input" type="number" name="n_pisos" id="n_pisos" placeholder="Pisos" value="<?php echo $Validacion->n_pisos; ?>">
                <?php echo $Validacion->mensajes_error["n_pisos"]["erroneo"]; ?>

            <?php endif; ?>

        <?php elseif ($existeValidacion && empty($Validacion->errores["n_pisos"])) : ?>
            <input class="valid-input" type="number" name="n_pisos" id="n_pisos" placeholder="BañPisosos" value="<?php echo $Validacion->n_pisos; ?>">

        <?php else : ?>
            <input type="number" name="n_pisos" id="n_pisos" placeholder="Pisos">
        
        <?php endif; ?>
    </div>

     <div class="grupo grupo-checkbox">
        <input
            type="checkbox"
            id="sotano"
            value="sotano"
            name="sotano"
            <?php echo $Validacion->sotano ? "checked" :  "" ?>
        />
        <label for="sotano">¿Tiene sotano?</label>
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

    <div class="grupo">
        <label for="usuario">Selecciona usuario:</label>
        <select name="usuario" id="usuario">
            <option value="" selected disabled>--Por favor escoge un usuario --</option>
            <option value="1">Kevin Mamaqi</option>
            <option value="2">Barack Obama</option>
            <option value="3">Donald Trump</option>
        </select>
    </div>

    <button type="submit" class="submit">Enviar propiedad</div>
</form>