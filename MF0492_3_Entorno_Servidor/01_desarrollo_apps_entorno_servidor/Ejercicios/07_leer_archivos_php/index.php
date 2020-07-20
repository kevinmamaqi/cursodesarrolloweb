<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <title>Leer archivos PHP</title>
</head>
<body>
<h1>Leer archivos PHP</h1>

<?php
    // ARCHIVOS TXT
    // $txt = file_get_contents('./contenido.txt');
    // $txt_con_lineas = nl2br($txt);
    // $txt_a_array = explode("\n", $txt_con_lineas);

    // $arrAlumnos = array();
    // foreach ($txt_a_array as $alumno) {
    //     $al = explode(",", $alumno);
    //     $nuevoAlumno = array(
    //         "nombre" => $al[0],
    //         "apellidos" => $al[1]
    //     );
    //     array_push($arrAlumnos, $nuevoAlumno);
    // }
    // // var_dump($arrAlumnos);

    // echo "<ul>";
    // foreach ($arrAlumnos as $alumno) {
    //     echo "<li>Nombre: " . $alumno["nombre"] . ". Apellidos: " . $alumno["apellidos"] . "</li>";
    // }
    // echo "</ul>";

    // JSON
    // $json = file_get_contents('./contenido.json');
    // $json_decodificado = json_decode($json);
    // // var_dump($json_decodificado);

    // echo "<ul>";
    // foreach ($json_decodificado as $alumno) {
    //     echo "<li>Nombre: " . $alumno->nombre . ". Apellidos: " . $alumno->apellidos . "</li>";
    // }
    // echo "</ul>";


    // EJERCICIO 1 - PAÍSES, LEER PARTE 1
    // $json = file_get_contents('./paises.json');
    // $json_decodificado = json_decode($json);
    // $arrayPaises = $json_decodificado->countryCodes;
    // var_dump($json_decodificado->countryCodes);

    // PARTE 2
    // echo "<ul>";
    // foreach ($arrayPaises as $pais) {
    //     echo "<li>Nombre: " . $pais->country_name . ". Código: " . $pais->country_code . ". Prefijo: " . $pais->dialling_code . "</li>";
    // }
    // echo "</ul>";

    // PARTE 3
    // echo '<table id="tabla-paises">';
    // echo "<thead>";
    // echo "<tr>";
    // echo "<th>Nombre</th>";
    // echo "<th>Código</th>";
    // echo "<th>Prefijo</th>";
    // echo "</tr>";
    // echo "</thead>";
    // echo "<tbody>";
    // foreach ($arrayPaises as $pais) {
    //     echo "<tr>";
    //     echo "<td>" . $pais->country_name . "</td>";
    //     echo "<td>" . $pais->country_code . "</td>";
    //     echo "<td>" . $pais->dialling_code . "</td>";
    //     echo "</tr>";
    // }
    // echo "</tbody>";
    // echo "</table>";


    // EJERCICIO 2 - COCHES, LEER PARTE 1
    // $json = file_get_contents('./coches.json');
    // $json_decoded = json_decode($json);
    // var_dump($json_decoded);

    // PARTE 2 - LISTA
    // echo "<ul>";
    // foreach ($json_decoded as $marca_modelo) {
    //    echo "<li>Marca: " . $marca_modelo->brand . ". Modelos: " . implode(", ", $marca_modelo->models) . ".</li>";
    // }
    // echo "</ul>";

    // echo '<table id="tabla-paises">';
    // echo "<thead>";
    // echo "<tr>";
    // echo "<th>Marca</th>";
    // echo "<th>Modelos</th>";
    // echo "</tr>";
    // echo "</thead>";
    // echo "<tbody>";
    // foreach ($json_decoded as $marca_modelo) {
    //     echo "<tr>";
    //     echo "<td>" . $marca_modelo->brand . " (" . count($marca_modelo->models) . ")" . "</td>";
    //     echo "<td>" . implode(", ", $marca_modelo->models) . "</td>";
    //     echo "</tr>";
    // }
    // echo "</tbody>";
    // echo "</table>";



    // EJERCICIO 3 - ESPAÑA, PINTAR Y FILTRAR TABLA
    $json = file_get_contents('./espania.json');
    $json_decoded = json_decode($json);
    // echo "<pre>";
    // print_r($json_decoded);
    // echo "</pre>";

    echo '<table id="tabla-paises" class="table table-bordered">';
    echo "<thead>";
    echo "<tr>";
    echo "<th>Ciudad</th>";
    echo "<th>Zona administrativa</th>";
    echo "<th>País</th>";
    echo "<th>Población P.</th>";
    echo "<th>ISO2</th>";
    echo "<th>Capital</th>";
    echo "<th>LAT</th>";
    echo "<th>LONG</th>";
    echo "<th>Población</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($json_decoded as $provincia) {
        echo "<tr>";
        echo "<td>" . $provincia->city . "</td>";
        echo "<td>" . $provincia->admin . "</td>";
        echo "<td>" . $provincia->country . "</td>";
        echo "<td>" . $provincia->population_proper . "</td>";
        echo "<td>" . $provincia->iso2 . "</td>";
        echo "<td>" . $provincia->capital . "</td>";
        echo "<td>" . $provincia->lat . "</td>";
        echo "<td>" . $provincia->lng . "</td>";
        echo "<td>" . $provincia->population . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    // COGER DATOS DE JSONS EN INTERNET
    // $json = json_decode(file_get_contents("https://coronavirus-tracker-api.herokuapp.com/confirmed"));
    // var_dump($json);
?>

<script>
$(document).ready(function () {
    $('#tabla-paises').DataTable();
});
</script>
</body>
</html>