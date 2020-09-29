<?php

include "./templates/header.php";
include "./classes/class.forms.php";
include "./classes/class.db.php";

$FormularioCeina = new CeinaForms();
$enviarHospital = new DBforms();

// COMPRUEBO SI ESTAMOS EN METODO POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_POST);
    $FormularioCeina->enviarFormulario($_POST);
}

// COMPRUEBO SI ESTAMOS EN METODO POST Y LA CLASE EXISTE
$existeValidacion = !empty($FormularioCeina) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false;
?>
<div class="caja-contenedora">
<h3 style="margin-top: 30px;">Añadir hospital</h3>
<hr> 
<?php
    // ESTABLECER CONEXION
    // $conLoc = $EnviarLocalizacion->crearConexion();

    // // PREPARAR QUERY
    // $prepare = $conLoc->prepare("SELECT * FROM LOCALIZACION");

    // // COMPROBAR SI HAY ERROR
    // if (!$prepare) {
    //     var_dump($conLoc->error_list);
    // }

    // // EJECUTAR
    // $prepare->execute();

    // BIND RESULT
    // $prepare->bind_result($id, $direccion, $cp);

    // FETCH RESULT
    // while ($prepare->fetch()) {
    //     printf("%s %s %s", $id, $direccion, $cp);
    //     echo '<br>';
    // }

    // GET_RESULT
    // $resultado = $prepare->get_result();
    // var_dump($resultado->num_rows);

    // while ($row = $resultado->fetch_assoc()) {
    //     echo '<pre>';
    //     print_r($row);
    //     echo '</pre>';
    // }

    // // CLOSE CONNECTION
    // $conLoc->close();
    
    
?>
<form
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
    method="post"
>

<?php
    $FormularioCeina->showInput(
        $type = "text",
        $id = "nombre_hospital",
        $name = "nombre_hospital",
        $placeholder = "Nombre del hospital",
        $label = "Hospital",
        $validacion = $existeValidacion
    );
    echo "<hr>";
    echo "<p>Por favor, introduce la dirección del hospital</p>";
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
?>
<button type="submit" class="submit">Enviar</button>
</form>

<?php
$errores = $FormularioCeina->hayErrores();
if (!$errores && $existeValidacion) {
    
    // Enviar a la base de datos
    $idLocalizacion = $enviarHospital->enviarLocalizacion(
        'ssss',
        $FormularioCeina->datosRecibidos['direccion'],
        $FormularioCeina->datosRecibidos['codigo_postal'],
        $FormularioCeina->datosRecibidos['ciudad'],
        $FormularioCeina->datosRecibidos['pais']
    );

    $idHospital = $enviarHospital->enviarHospital(
        'is',
        $idLocalizacion,
        $FormularioCeina->datosRecibidos['nombre_hospital']
    );

    if (!empty($idHospital)) {
        echo '<p>Gracias, hemos recibido y guardado sus datos</p>';
    }
}
?>

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