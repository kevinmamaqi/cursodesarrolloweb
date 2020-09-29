<?php

include "./templates/header.php";
include "./classes/class.forms.php";
$FormularioCeina = new CeinaForms();
// COMPRUEBO SI ESTAMOS EN METODO POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_POST);
    $FormularioCeina->enviarFormulario($_POST);
}
// COMPRUEBO SI ESTAMOS EN METODO POST Y LA CLASE EXISTE
$existeValidacion = !empty($FormularioCeina) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false;
?>
<div class="caja-contenedora">
<h3 style="margin-top: 30px;">FORMULARIO</h3>
<hr> 
<form
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
    method="post"
>
<?php
    $FormularioCeina->showInput("text", "prueba", "prueba", "hola", "hola", $existeValidacion);
    $FormularioCeina->showInput("teasdasfsadfgsdfgsdfgxt", "prueba", "prueba", "hola", "hola", $existeValidacion);

    $FormularioCeina->showInput(
        $type = "checkbox",
        $id = "testing",
        $name = "testing",
        $placeholder = "",
        $label = "Mi checkbox.",
        $validacion = $existeValidacion
    );
    $FormularioCeina->showInput(
        $type = "select",
        $id = "testing_select",
        $name = "testing_select",
        $placeholder = "",
        $label = "Mi select.",
        $validacion = $existeValidacion,
        $options = array(
            "uno" => "Una camiseta",
            "dos" => "Una camiseta + pantalon",
            "tres" => "Camiseta + pantalon + calconcillos"
        )
    );
    $errores = $FormularioCeina->hayErrores();
    if (!$errores && $existeValidacion) {
        // Enviar a la base de datos
        var_dump($FormularioCeina->datosRecibidos);
    }


?>
<button type="submit" class="submit">Enviar</button>
</form>
</div>
<?php
$array_vacio = array();
$array_vacio_condatos = array('dato'=> '');
var_dump(!empty($array_vacio)) . PHP_EOL;
var_dump(!empty($array_vacio_condatos)). PHP_EOL;
?>
<?php include "./templates/footer.php";
