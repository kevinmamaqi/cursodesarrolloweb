<?php

class DBforms {
    public $servername;
    public $username;
    public $password;
    public $myDB;

    public function __construct(
        $servername = 'localhost',
        $username = 'root',
        $password = '',
        $myDB = 'app_medica_final'
    ) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->myDB = $myDB;
    }

    public function crearConexion()
    {
        return new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->myDB
        );
    }

    public function hayError($conexion)
    {
        if ($conexion->connect_error) {
            die("La conexion ha fallado: " . $conexion->connect_error);
        }
    }

    public function enviarLocalizacion($datos, $direccion, $codigopostal, $ciudad, $pais)
    {
        $miConexion = $this->crearConexion();
        $enviarLocalizacion = $miConexion->prepare("INSERT INTO LOCALIZACION (direccion, cp, ciudad, pais) VALUES (?, ?, ?, ?)");
        $enviarLocalizacion->bind_param(
            $datos,
            $direccion,
            $codigopostal,
            $ciudad,
            $pais
        );

        // Compruebo si la conexión se establece bien
        if (!$enviarLocalizacion) {
            throw new Exception($conexion->error_list);
        }

        // Ejecute la query
        $enviarLocalizacion->execute();

        // Devuelvo el último valor añadido
        $id = $enviarLocalizacion->insert_id;

        // Cierro conexión
        $enviarLocalizacion->close();

        // Devuevlo el ID
        return $id;

    }

    public function enviarHospital($datos, $idLocalizacion, $nombre)
    {
        $miConexion = $this->crearConexion();
        $enviarHospital = $miConexion->prepare("INSERT INTO HOSPITALES (LOCALIZACION_id, nombre) VALUES (?, ?)");
        $enviarHospital->bind_param(
            $datos,
            $idLocalizacion,
            $nombre
        );

        // Compruebo si la conexión se establece bien
        if (!$enviarHospital) {
            throw new Exception($conexion->error_list);
        }

        // Ejecute la query
        $enviarHospital->execute();

        // Devuelvo el último valor añadido
        $id = $enviarHospital->insert_id;

        // Cierro conexión
        $enviarHospital->close();

        // Devuevlo el ID
        return $id;
    }
}