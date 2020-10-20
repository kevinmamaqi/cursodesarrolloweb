<?php
$servername = "localhost";
$username = "root";
$password = "";

// CREO LA CONEXIÓN
$conexion = new mysqli($servername, $username, $password);

// COMPRUEBO LA CONEXIÓN
if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}
echo "Connected successfully" . PHP_EOL;


// COMO INSERTAR DATOS
$sql = "INSERT INTO TEST_CONEXION_DB.TESTING (nombre, apellidos, email)
VALUES ('ID2', 'ID2', 'ID2@example.com')";

if ($conexion->query($sql) === true) {
    echo "New record created successfully" . PHP_EOL;
    $last_id = $conexion->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error . PHP_EOL;
}

// CIERRO LA CONEXIÓN
$conexion->close();
?>
