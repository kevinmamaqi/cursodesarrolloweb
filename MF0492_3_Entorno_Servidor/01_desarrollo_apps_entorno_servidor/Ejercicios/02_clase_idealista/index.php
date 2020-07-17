<?php

include "./classes/class.EnvioPropiedad.php";
include "./templates/header.php";

$envioVacio = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        empty($_POST['tipo_inmueble'])
        // empty($_POST['operacion']) ||
        // empty($_POST['provincia']) ||
        // empty($_POST['direccion']) ||
        // empty($_POST['codigo_postal']) ||
        // empty($_POST['ocultar_direccion']) ||
        // empty($_POST['planta']) ||
        // empty($_POST['puerta']) ||
        // empty($_POST['bloque_portal']) ||
        // empty($_POST['urbanizacion']) ||
        // empty($_POST['email']) ||
        // empty($_POST['telefono']) ||
        // empty($_POST['telefono_extranjero']) ||
        // empty($_POST['nombre']) ||
        // empty($_POST['metodo_contacto']) ||
        // empty($_POST['estado']) ||
        // empty($_POST['m2_construidos']) ||
        // empty($_POST['m2_utiles']) ||
        // empty($_POST['m2_superficie_minima']) ||
        // empty($_POST['fachada_inmueble']) ||
        // empty($_POST['distribucion']) ||
        // empty($_POST['uso_exclusivo_oficinas']) ||
        // empty($_POST['n_banos_aseos']) ||
        // empty($_POST['tipo_de_banos']) ||
        // empty($_POST['ubicacion_banos']) ||
        // empty($_POST['certificacion-energetica'])
        // empty($_POST['n_ascensores']) ||
        // empty($_POST['aire_acondicionado']) ||
        // empty($_POST['puerta_seguridad']) ||
        // empty($_POST['sistemas_alarma_cerrado']) ||
        // empty($_POST['control_accesos']) ||
        // empty($_POST['extintores']) ||
        // empty($_POST['agua_caliente']) ||
        // empty($_POST['calefaccion']) ||
        // empty($_POST['cocina_office']) ||
        // empty($_POST['almacen']) ||
        // empty($_POST['doble_acristalamiento'])
    ) {
        $envioVacio = true;
    }
}



if ($_SERVER["REQUEST_METHOD"] === "POST" && $envioVacio === false) {
    $NuevoEnvio = new EnvioPropiedad();
    $NuevoEnvio->validarPropiedades(
        $_POST['tipo_inmueble']
        // $_POST['operacion'],
        // $_POST['provincia'],
        // $_POST['direccion'],
        // $_POST['codigo_postal'],
        // $_POST['ocultar_direccion'],
        // $_POST['planta'],
        // $_POST['puerta'],
        // $_POST['bloque_portal'],
        // $_POST['urbanizacion'],
        // $_POST['email'],
        // $_POST['telefono'],
        // $_POST['telefono_extranjero'],
        // $_POST['nombre'],
        // $_POST['metodo_contacto'],
        // $_POST['estado'],
        // $_POST['m2_construidos'],
        // $_POST['m2_utiles'],
        // $_POST['m2_superficie_minima'],
        // $_POST['fachada_inmueble'],
        // $_POST['distribucion'],
        // $_POST['uso_exclusivo_oficinas'],
        // $_POST['n_banos_aseos'],
        // $_POST['tipo_de_banos'],
        // $_POST['ubicacion_banos'],
        // $_POST['certificacion-energetica'],
        // $_POST['n_ascensores'],
        // $_POST['aire_acondicionado'],
        // $_POST['puerta_seguridad'],
        // $_POST['sistemas_alarma_cerrado'],
        // $_POST['control_accesos'],
        // $_POST['extintores'],
        // $_POST['agua_caliente'],
        // $_POST['calefaccion'],
        // $_POST['cocina_office'],
        // $_POST['almacen'],
        // $_POST['doble_acristalamiento']
    );
}

$formularioEnviado = empty($NuevoEnvio) ? false : true;
?>



<h1>Formulario publicar propiedad</h1>
<hr>

<?php $enviarProp = new EnvioPropiedad(); ?>

<?php if ($_SERVER["REQUEST_METHOD"] === 'POST' && $envioVacio === true) {
        echo "Revisa el formulario, hay algun campo vacio.";
} ?>

<?php if ($formularioEnviado && !$NuevoEnvio->hayErrores()) {
    echo "No hay errores";
} elseif ($formularioEnviado && $NuevoEnvio->hayErrores()) {
    print_r($NuevoEnvio->errores);
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="mi-formulario">
    <!-- ENVIA -->
    <button type="submit">Enviar</button>
    <?php
var_dump($_POST['tipo_inmueble']);

        // Primera parte llega hasta ¿Cómo prefieres que te contacten?
        include "./templates/formulario.Parte1.php";
    ?>
    <?php
        // Segunda parte llega hasta el final.
        include "./templates/formulario.Parte2.php";
    ?>        

   
</form>

<?php include "./templates/footer.php"; ?>