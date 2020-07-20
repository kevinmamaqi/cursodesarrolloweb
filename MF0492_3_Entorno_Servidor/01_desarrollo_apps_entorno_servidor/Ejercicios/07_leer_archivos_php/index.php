<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    $json = file_get_contents('./contenido.json');
    $json_decodificado = json_decode($json);
    // var_dump($json_decodificado);

    echo "<ul>";
    foreach ($json_decodificado as $alumno) {
        echo "<li>Nombre: " . $alumno->nombre . ". Apellidos: " . $alumno->apellidos . "</li>";
    }
    echo "</ul>";
?>

    
</body>
</html>