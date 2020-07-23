<?php

$title = "Propietarios y vehículos";
include "./templates/header.php";
?>

<?php
$ficheroJSON = "./data/propietarios.json";
$cogerDatos = file_get_contents($ficheroJSON);
$datosDecodificados = json_decode($cogerDatos);
echo "<pre>";
print_r($datosDecodificados);
echo "</pre>";
?>

<script type="application/json">
{
    "nombre": "Kevin",
    "apellidos": "Mamaqi Kapllani"
}
</script>

<?php

array(
    'nombre'=>'Kevin',
    'apellidos'=> "Mamaqi Kapllani"
)

?>



<?php include "./templates/footer.php"; ?>
