<?php

include "./templates/header.php";
include "./classes/class.forms.php";
include "./classes/class.db.php";

$FormularioCeina = new CeinaForms();
$enviarPaciente = new DBforms();

// COMPRUEBO SI ESTAMOS EN METODO POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $FormularioCeina->enviarFormulario($_POST);
}

// COMPRUEBO SI ESTAMOS EN METODO POST Y LA CLASE EXISTE
$existeValidacion = !empty($FormularioCeina) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false;
?>
<div class="caja-contenedora">
    <h3 style="margin-top: 30px;">Añadir Paciente</h3>
    <hr> 
    
    <form
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
        method="post"
    >
    <?php
    
        $FormularioCeina->showInput(
            $type = "text",
            $id = "nombre",
            $name = "nombre",
            $placeholder = "Introduzca su nombre",
            $label = "Nombre",
            $validacion = $existeValidacion
        );
        $FormularioCeina->showInput(
            $type = "text",
            $id = "apellidos",
            $name = "apellidos",
            $placeholder = "Introduzca sus apellidos",
            $label = "Apellidos",
            $validacion = $existeValidacion
        );
        $FormularioCeina->showInput(
            $type = "number",
            $id = "edad",
            $name = "edad",
            $placeholder = "Introduzca su edad",
            $label = "Edad",
            $validacion = $existeValidacion
        );
        echo '<hr>';
        $FormularioCeina->showInput(
            $type = "text",
            $id = "direccion",
            $name = "direccion",
            $placeholder = "Introduzca su direccion",
            $label = "Dirección",
            $validacion = $existeValidacion
        );
        $FormularioCeina->showInput(
            $type = "text",
            $id = "codigo_postal",
            $name = "codigo_postal",
            $placeholder = "Código postal",
            $label = "Código postal",
            $validacion = $existeValidacion
        );
        $FormularioCeina->showInput(
            $type = "text",
            $id = "ciudad",
            $name = "ciudad",
            $placeholder = "Ciudad",
            $label = "Ciudad",
            $validacion = $existeValidacion
        );
        $FormularioCeina->showInput(
            $type = "text",
            $id = "pais",
            $name = "pais",
            $placeholder = "País",
            $label = "País",
            $validacion = $existeValidacion
        );
        echo '<hr>';
        $FormularioCeina->showInput(
            $type = "select",
            $id = "hospitales",
            $name = "hospitales[]",
            $placeholder = "",
            $label = "Hospitales",
            $validacion = $existeValidacion,
            $options = $enviarPaciente->obtenerHospitales(),
            $multiple = true
        );

        echo '<hr>';
        $FormularioCeina->showInput(
            $type = "select",
            $id = "medicos",
            $name = "medicos[]",
            $placeholder = "",
            $label = "Medicos",
            $validacion = $existeValidacion,
            $options = $enviarPaciente->obtenerMedicos(),
            $multiple = true
        );
    ?>
        <button type="submit" class="submit">Enviar</button>
    </form>
</div>
<?php
    $errores = $FormularioCeina->hayErrores();

    if (!$errores && $existeValidacion) {
        // Enviar a la base de datos
        $idLocalizacion = $enviarPaciente->enviarLocalizacion(
            'ssss',
            $FormularioCeina->datosRecibidos['direccion'],
            $FormularioCeina->datosRecibidos['codigo_postal'],
            $FormularioCeina->datosRecibidos['ciudad'],
            $FormularioCeina->datosRecibidos['pais']
        );

        $idPaciente = $enviarPaciente->enviarPaciente(
            'issi',
            $idLocalizacion,
            $FormularioCeina->datosRecibidos['nombre'],
            $FormularioCeina->datosRecibidos['apellidos'],
            $FormularioCeina->datosRecibidos['edad']
        );

        if (!empty($idPaciente)) {
            echo '<p>Gracias, hemos recibido y guardado sus datos</p>';
        }

        if ($FormularioCeina->datosRecibidos['hospitales']) {
            foreach ($FormularioCeina->datosRecibidos['hospitales'] as $key => $value) {
                $enviarPaciente->enviarPacienteHospital(
                    'ii',
                    $idPaciente,
                    $value
                );
            }
        }
    }
?>
<?php include "./templates/footer.php";


/*
DIFERENTES MÉTODOS DE HACER QUERIES:

CON BIND RESULTS HAREMOS QUERIES ESPECIFICAS OBTENIENDO LA/S COLUMNA/S
1. ES MÁS FÁCIL.
2. USA FETCH

CON RESULT get_result() HAREMOS QUERIES QUE IMPLIQUEN TRAER TODOS
LOS PAREMTROS. SELECT * FROM .....
1. FUNCIONA BIEN CON TODO TIPO DE DECLARACIONES SQL
2. USA fetch_assoc()
*/