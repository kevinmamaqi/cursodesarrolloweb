<?php

class Validacion
{
    public $foto;
    public $dir_subida;

    public $titulo;
    public $descripcion;
    public $n_habitaciones;
    public $metros_Cuadrados;
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
    
    public $checkbox_validos;
    public $errores;
    public $mensajes_error;

    public function __construct()
    {
        $this->errores = array();
        $this->mensajes_error = $this->mensajesError();
        $this->checkbox_validos = array(
            'aire_acondicionado',
            'ascensor',
            'amueblada',
            'jardin',
            'sotano'
        );
    }

    public function envioFormulario(
        $foto,
        $titulo,
        $descripcion,
        $n_habitaciones,
        $metros_cuadrados,
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
    ) {
        $this->dir_subida = getcwd() . "/tmp";

        $this->foto = $this->validarImagen($foto, "foto");
        $this->titulo = $this->validarString($titulo, "titulo");
        $this->descripcion = $this->validarString($descripcion, "descripcion");
        $this->n_habitaciones = $this->validarInt($n_habitaciones, "n_habitaciones");
        $this->metros_cuadrados = $this->validarInt($metros_cuadrados, "metros_cuadrados");
        $this->aire_acondicionado = $this->validarCheckbox($aire_acondicionado, "aire_acondicionado");
        $this->ascensor = $this->validarCheckbox($ascensor, "ascensor");
        $this->n_banios = $this->validarInt($n_banios, "n_banios");
        $this->garaje = $this->validarCheckbox($garaje, "garaje");
        $this->amueblada = $this->validarCheckbox($amueblada, "amueblada");
        $this->jardin = $this->validarCheckbox($jardin, "jardin");
        $this->n_pisos = $this->validarInt($n_pisos, "n_pisos");
        $this->sotano = $this->validarCheckbox($sotano, "sotano");
        $this->certificacion = $this->validarArray($certificacion, "certificacion");
        $this->usuario = $this->validarArray($usuario, "usuario");


    }

    private function validarString($input, $campo)
    {
        if (empty($input)) {
            $this->errores[$campo]["vacio"] = $this->mensajes_error[$campo]["vacio"];
            return $input;
        }

        if (strlen($input) < 5) {
            $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo]["erroneo"];
        }

        $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Validar array
    private function validarElementoArray($input, $campo)
    {
        if (empty($input)) {
            $this->errores[$campo]["vacio"] = $this->mensajes_error[$campo]["vacio"];
            return $elemento;
        }

        if (in_array($input, array_keys($this->array_validos))) {
            return $elemento;
        } else {
            $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo]["erroneo"];
        }
    }

    // Validar array
    private function validarCheckbox($input, $campo)
    {
        if (empty($input)) {
            return false;
        } else {
            if (in_array($input, $this->checkbox_validos)) {
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
            !in_array($_FILES["foto_casa"]['type'], $array_mimetype_permitidos) &&
            !in_array($fichero_extension, $array_extensiones_permitidas)
        ) {
             $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo];
             return "";
        }
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
       
        return $mensajesError;
    }

    public function hayErrores()
    {
        if ($this->errores) {
            return true;
        } else {
            return false;
        }
    }

    public function guardarArchivo()
    {
        return "Nombre de usuario: " . $this->nombre_usuario . PHP_EOL;
    }
}
