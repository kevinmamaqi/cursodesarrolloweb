<?php

include "./templates/header.php";
include "./classes/class.forms.php";
$InputCeina = new CeinaForms();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_POST);
    $InputCeina->enviarFormulario($_POST);
}
$existeValidacion = !empty($InputCeina) && $_SERVER["REQUEST_METHOD"] === "POST" ? true : false;
?>
<div class="caja-contenedora">
<form
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
    method="post"
>
<?php
    $InputCeina->showInput("text", "prueba", "prueba", "hola", "hola", $existeValidacion);
?>
<button type="submit">Enviar</button>
</form>
</div>
<?php
include "./templates/footer.php";
