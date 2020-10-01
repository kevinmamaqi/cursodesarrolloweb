<?php

include "./templates/header.php";
include "./classes/class.forms.php";
$FormularioCeina = new CeinaForms();
// COMPRUEBO SI ESTAMOS EN METODO POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_FILES);
    $FormularioCeina->enviarFormulario($_POST, $_FILES);
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
    enctype="multipart/form-data"
>
<?php
    $FormularioCeina->showInput("file", "archivo", "archivo", "Archivo", "Subir Archivo", $existeValidacion);
    
    $errores = $FormularioCeina->hayErrores();
    if (!$errores && $existeValidacion) {
        // Enviar a la base de datos
        var_dump($FormularioCeina->datosRecibidos);
    }
?>
<button type="submit" class="submit">Enviar</button>
</form>
</div>
<?php include "./templates/footer.php";
