<?php
    include "./classes/class.Validacion.php";
    include "./templates/header.php";
?>
<div class="caja-contenedora">
    <div class="caja-contenido">
        <div class="caja-cabecera">
            <h1>Directorio Casas</h1>
            <a class="button" href="/anadir-propiedad.php">Añadir nueva</a>
        </div>
        <hr />

        <?php
            $ClasePropiedades = new Validacion();
            $propiedades = $ClasePropiedades->obtenerPropiedades();
            foreach ($propiedades as $propiedad) {
                $propiedad = $propiedad;
                echo "<pre>";
                print_r($propiedad);
                echo "</pre>";
                include "./templates/propiedad.php";
            }
        ?>
    </div>
</div>
<?php include "./templates/footer.php"; ?>