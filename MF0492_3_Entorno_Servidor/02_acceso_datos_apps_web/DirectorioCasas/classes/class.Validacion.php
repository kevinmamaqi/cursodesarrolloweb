<?php

class Validacion
{
    // Variables del formulario especificas
    public $foto;
    public $dir_subida;
    public $titulo;
    public $descripcion;
    public $n_habitaciones;
    public $m_cuadrados;
    public $aire_acondicionado;
    public $ascensor;
    public $n_banios;
    public $garaje;
    public $amueblada;
    public $jardin;
    public $n_pisos;
    public $sotano;
    public $certificacion;
    public $usuario;

    public $certificaciones_validas;
    public $propietarios_validos;
    public $mensajes_error;
    public $errores;
    
    public function __construct()
    {
        $this->dir_subida = getcwd() . "/tmp/";
        $this->errores = array();
        $this->mensajes_error = $this->mensajesError();
        $this->checkbox_validos = array(
            'aire_acondicionado',
            'ascensor',
            'amueblada',
            'jardin',
            'sotano'
        );
        $this->propietarios_validos = array(
            '1' => 'Kevin Mamaqi Kapllani',
            '2' => 'Barack Obama',
            '3' => 'Donald Trump',
        );
        $this->certificaciones_validas = array(
            'A'   => 'Certificación A',
            'AA'  => 'Certificación AA',
            'AAA' => 'Certificación AAA',
        );
    }

    public function envioFormulario(
        $foto,
        $titulo,
        $descripcion,
        $n_habitaciones,
        $m_cuadrados,
        $aire_acondicionado,
        $ascensor,
        $n_banios,
        $garaje,
        $amueblada,
        $jardin,
        $n_pisos,
        $sotano,
        $certificacion,
        $usuario
    )
    {
        $this->foto = $this->validarImagen($foto, "foto");
        $this->titulo = $this->validarString($titulo, "titulo");
        $this->descripcion = $this->validarString($descripcion, "descripcion");
        $this->n_habitaciones = $this->validarInt($n_habitaciones, "n_habitaciones");
        $this->m_cuadrados = $this->validarInt($m_cuadrados, "m_cuadrados");
        $this->aire_acondicionado = $this->validarCheckbox($aire_acondicionado, "aire_acondicionado");
        $this->ascensor = $this->validarCheckbox($ascensor, "ascensor");
        $this->n_banios = $this->validarInt($n_banios, "n_banios");
        $this->garaje = $this->validarCheckbox($garaje, "garaje");
        $this->amueblada = $this->validarCheckbox($amueblada, "amueblada");
        $this->jardin = $this->validarCheckbox($jardin, "jardin");
        $this->n_pisos = $this->validarInt($n_pisos, "n_pisos");
        $this->sotano = $this->validarCheckbox($sotano, "sotano");
        $this->certificacion = $this->validarArray($certificacion, "certificacion", $this->certificaciones_validas);
        $this->usuario = $this->validarArray($usuario, "usuario", $this->propietarios_validos);
    }

    private function mensajesError()
    {
        $mensajesError = array();
        $mensajesError['titulo']["vacio"] = "El título esta vacio.";
        $mensajesError['titulo']["erroneo"] = "Has enviado un título no valido.";
        $mensajesError['descripcion']["vacio"] = "La descripción esta vacia, debes añadir una descripción.";
        $mensajesError['descripcion']["erroneo"] = "Has enviado una descripción no valida.";
        $mensajesError['provincia']["vacio"] = "Debes seleccionar una provincia.";
        $mensajesError['provincia']["erroneo"] = "Debes seleccionar una provincia adecuada.";
        $mensajesError['foto']["vacio"] = "Debes seleccionar y subir una imagen.";
        $mensajesError['foto']["erroneo"] = "Debes seleccionar un archivo de imagen valido.";
    }

    public function hayErrores()
    {
        if ($this->errores) {
            return true;
        } else {
            return false;
        }
    }

    public function guardarEnBD()
    {
        $mysqli = mysqli_connect("localhost", "root", "", "directorio_casas");
        if (mysqli_connect_errno()) {
            return true;
        }

        $cert;
        if ($this->certificacion === "A")
            $cert = 1;
        else if ($this->certificacion === "AA") {
            $cert = 2;
        } else {
            $cert = 3;
        }

        if (
            !$mysqli->query("
                INSERT INTO directorio_casas.PROPIEDADES
                    (
                        propietario,
                        certificacion,
                        n_habitaciones,
                        m2,
                        aacondicionado,
                        ascensor,
                        garaje,
                        amueblada,
                        sotano,
                        n_pisos,
                        n_banios,
                        descripcion,
                        titulo
                    )
                VALUES
                    (
                        '" . intval($this->usuario) . "',
                        '$cert',
                        '$this->n_habitaciones',
                        '$this->m_cuadrados',
                        '" . intval($this->aire_acondicionado) . "',
                        '" . intval($this->ascensor) . "',
                        '" . intval($this->garaje) . "',
                        '" . intval($this->amueblada) . "',
                        '" . intval($this->sotano) . "',
                        '$this->n_pisos',
                        '$this->n_banios',
                        '$this->descripcion',
                        '$this->titulo'
                    );
                "
            )
        ) {
            var_dump($mysqli->error);
        };
        $mysqli->close();
    }

    private function validarString($input, $campo)
    {
        if (empty($input)) {
            $this->errores[$campo]["vacio"] = $this->mensajes_error[$campo]["vacio"];
            return $input;
        }

        if (strlen($input) > 20) {
            $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo]["erroneo"];
        }

        $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    private function validarCheckbox($input, $campo)
    {
        if (empty($input)) {
            return false;
        } else {
            if (in_array($input, array_keys($this->checkbox_validos))) {
                return true;
            } else {
                $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo]["erroneo"];
            }
        }
    }

    private function validarInt($input, $campo)
    {
        if (empty($input)) {
            $this->errores[$campo]["vacio"] = $this->mensajes_error[$campo];
            return $input;
        }

        if (filter_var($input, FILTER_VALIDATE_INT) === false) {
            $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo];
        }
        
        return $input;
    }

    private function validarImagen($foto, $campo)
    {
        if (!$foto) {
            $this->errores[$campo]["vacio"] = $this->mensajes_error[$campo];
            return "";
        }

        $fichero_subido = $this->dir_subida . basename($foto['name']);
        $fichero_extension = pathinfo($fichero_subido, PATHINFO_EXTENSION);

        $array_mimetype_permitidos = array(
            "image/png",
            "image/jpg",
            "image/gif"
        );

        $array_extensiones_permitidas = array(
            "png",
            "jpg",
            "gif"
        );

        if (
            !in_array($foto['type'], $array_mimetype_permitidos) &&
            !in_array($fichero_extension, $array_extensiones_permitidas)
        ) {
             $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo];
             return "";
        }

        move_uploaded_file($foto['tmp_name'], $fichero_subido);
    }
    
    private function validarArray($input, $campo, $array)
    {
        if (empty($input)) {
            $this->errores[$campo]["vacio"] = $this->mensajes_error[$campo]["vacio"];
            return $input;
        }

        if (in_array($input, array_keys($array))) {
            return $input;
        } else {
            $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo]["erroneo"];
        }
    }

    public function obtenerPropiedades()
    {
        $mysqli = mysqli_connect("localhost", "root", "", "directorio_casas");
        if (mysqli_connect_errno()) {
            return true;
        }
        $resultados_array = array();
        $result = $mysqli->query("SELECT * FROM directorio_casas.PROPIEDADES");
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $resultados_array[] = $row;
            }
            return $resultados_array;
        }
    }
}
