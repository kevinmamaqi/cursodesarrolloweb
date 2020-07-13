<?php

include "./classes/class.EnvioPropiedad.php";
include "./templates/header.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $NuevoEnvio = new EnvioPropiedad();
}

$formularioEnviado = empty($NuevoEnvio) ? false : true;

?>


<h1>Formulario publicar propiedad</h1>
<hr>

<?php $enviarProp = new EnvioPropiedad(); ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mi-formulario">
    <?php
        // Primera parte llega hasta ¿Cómo prefieres que te contacten?
        include "./templates/formulario.Parte1.php";
    ?>
    <?php
        // Segunda parte llega hasta el final.
        include "./templates/formulario.Parte2.php";
    ?>        

    <!-- ENVIA -->
    <button type="submit">Enviar</button>
</form>

<?php include "./templates/footer.php"; ?>