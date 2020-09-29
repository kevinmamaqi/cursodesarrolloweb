<?php

include "./templates/header.php";
include "./classes/class.forms.php";
include "./classes/class.db.php";

$FormularioCeina = new CeinaForms();
$enviarPaciente = new DBforms();

// COMPRUEBO SI ESTAMOS EN METODO POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_POST);
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
        $arrayHospitales = $enviarPaciente->obtenerHospitales();
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
    ?>
        <button type="submit" class="submit">Enviar</button>
    </form>
</div>
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