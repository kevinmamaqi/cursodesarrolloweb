<?php

$title = "Añadir nuevo propietario";
include "./templates/header.php";
include "./classes/class.ProcesarDatos.php";




if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $EnviarPropietario = new ProcesarDatos();
    $EnviarPropietario->envioFormularioPropietario(
        $_POST["nombre"],
        $_POST["apellidos"],
        $_POST["matricula"],
        $_POST["edad"]
    );


    $datosPropietario = $EnviarPropietario->guardarPropietarioJSON();
    $datosPropietario = json_encode($datosPropietario);

    // Cojo el JSON
    $ficheroJSON = "./data/propietarios.json";
    $cogerDatos = file_get_contents($ficheroJSON);
    $arrayPropietarios = array();

    if ($cogerDatos !== "") {
        // SINO ESTA VACIO

        // LEO DATOS DEL FICHERO
        $arrayPropietarios = $cogerDatos;
        // DECODIFICO EL JSON PARA USAR COMO ARRAY EN PHP
        $arrayPropietarios = json_decode($arrayPropietarios);
        // INTRODUZCO CON ARRAY_PUSH NUEVO OBJETO AL FINAL DEL ARRAY
        array_push($arrayPropietarios, $datosPropietario);
        // CODIFICO ANTES DE GUARDAR
        $arrayPropietarios = json_encode($arrayPropietarios);
        // GUARDO EL FICHERO
        file_put_contents($ficheroJSON, $arrayPropietarios);
    } else {
        // SI ESTA VACIO, NO LEO DATOS DATOS DEL FICHERO
        // INTRODUZCO EL OBJETO ENVIADO
        array_push($arrayPropietarios, $datosPropietario);
        // CODIFICO ANTES DE GUARDAR
        $arrayPropietarios = json_encode($arrayPropietarios);
        // GUARDO EL FICHERO
        file_put_contents($ficheroJSON, $arrayPropietarios);
    }
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
    <input type="text" name="matricula" id="matricula" placeholder="Matricula">
    <input type="text" name="edad" id="edad" placeholder="Edad">
    <button type="submit">Enviar</button>
</form>

<?php include "./templates/footer.php"; ?>
