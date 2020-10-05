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

    private function showPRE($toPrint)
    {
        echo '<pre>';
        print_r($toPrint);
        echo '</pre>';
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
            throw new enviarLocalizacion($miConexion->error_list);
        }

        // Ejecute la query
        $enviarLocalizacion->execute();
        
        // Compruebo si se envia y no hay error
        if (!$enviarLocalizacion) {
            throw new Exception($miConexion->error_list);
        }

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

        // Compruebo si se envia y no hay error
        if (!$enviarHospital) {
            throw new Exception($miConexion->error_list);
        }

        // Devuelvo el último valor añadido
        $id = $enviarHospital->insert_id;

        // Cierro conexión
        $enviarHospital->close();

        // Devuevlo el ID
        return $id;
    }

    public function enviarPaciente($datos, $idLocalizacion, $nombre, $apellidos, $edad)
    {
        $miConexion = $this->crearConexion();
        $enviarPaciente = $miConexion->prepare("INSERT INTO PACIENTES (LOCALIZACION_id, nombre, apellidos, edad) VALUES (?, ?, ?, ?)");
        $enviarPaciente->bind_param(
            $datos,
            $idLocalizacion,
            $nombre,
            $apellidos,
            $edad
        );

        // Compruebo si la conexión se establece bien
        if (!$enviarPaciente) {
            throw new Exception($conexion->error_list);
        }

        // Ejecute la query
        $enviarPaciente->execute();

        // Compruebo si se envia y no hay error
        if (!$enviarPaciente) {
            throw new Exception($miConexion->error_list);
        }

        // Devuelvo el último valor añadido
        $id = $enviarPaciente->insert_id;

        // Cierro conexión
        $enviarPaciente->close();

        // Devuevlo el ID
        return $id;
    }

    public function enviarPacienteHospital($datos, $idPaciente, $idHospital)
    {
        $miConexion = $this->crearConexion();
        $enviarPacienteHospital = $miConexion->prepare("INSERT INTO PACIENTES_HOSPITALES (PACIENTES_id, HOSPITALES_id) VALUES (?, ?)");
        $enviarPacienteHospital->bind_param(
            $datos,
            $idPaciente,
            $idHospital
        );

        // Compruebo si la conexión se establece bien
        if (!$enviarPacienteHospital) {
            throw new Exception($miConexion->error_list);
        }

        // Ejecute la query
        $enviarPacienteHospital->execute();

        // Compruebo si se envia y no hay error
        if (!$enviarPacienteHospital) {
            throw new Exception($miConexion->error_list);
        }

        // Devuelvo el último valor añadido
        $id = $enviarPacienteHospital->insert_id;

        // Cierro conexión
        $enviarPacienteHospital->close();
    }

    public function obtenerHospitales()
    {
        // ESTABLECER CONEXION
        $miConexion = $this->crearConexion();

        // PREPARAR QUERY
        $prepare = $miConexion->prepare("SELECT id, nombre FROM HOSPITALES");

        // COMPROBAR SI HAY ERROR
        if (!$prepare) {
            var_dump($miConexion->error_list);
        }

        // EJECUTAR
        $prepare->execute();

        // BIND RESULT
        $prepare->bind_result($id, $nombre);

        // FETCH RESULT
        $miArray = array();
        while ($prepare->fetch()) {
            $miArray[$id] = $nombre;
        }
       
        // CLOSE CONNECTION
        $miConexion->close();

        return $miArray;
    }

    public function obtenerMedicos()
    {
        // ESTABLECER CONEXION
        $miConexion = $this->crearConexion();

        // PREPARAR QUERY
        $prepare = $miConexion->prepare("SELECT id, nombre FROM MEDICOS");

        // COMPROBAR SI HAY ERROR
        if (!$prepare) {
            var_dump($miConexion->error_list);
        }

        // EJECUTAR
        $prepare->execute();

        // BIND RESULT
        $prepare->bind_result($id, $nombre);

        // FETCH RESULT
        $miArray = array();
        while ($prepare->fetch()) {
            $miArray[$id] = $nombre;
        }
       
        // CLOSE CONNECTION
        $miConexion->close();

        return $miArray;
    }
}