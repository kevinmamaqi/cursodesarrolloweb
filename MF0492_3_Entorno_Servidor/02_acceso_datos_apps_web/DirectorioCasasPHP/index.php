<?php include "./templates/header.php"; ?>

<?php
    $mysqli = new mysqli("localhost", "root", "", "directorio_casas");
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    // echo $mysqli->host_info . "\n";
    $mysqli->query("
        INSERT INTO
        directorio_casas.PROPIEDADES(propietario, certificacion, n_habitaciones, m2, aacondicionado)
        VALUES
        (1, 1, 3, 39, true)");

        echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    ?>


<div class="caja-contenedora">
    <div class="caja-contenido">
        <div class="caja-cabecera">
            <h1>Directorio Casas</h1>
            <a class="button" href="/anadir-propiedad.php">Añadir nueva</a>
        </div>
        <hr />
        <?php include "./templates/propiedad.php"; ?>
    </div>
</div>
<?php include "./templates/footer.php"; ?>