<?php

class Validacion
{
    public $titulo;
    public $aire_acondicionado;
    public $ascensor;
    
    
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

    public function envioFormulario($titulo, $descripcion, $n_habitaciones, $aire_acondicionado, $certificacion)
    {
        $this->titulo = $this->validarString($titulo, "titulo");
        $this->descripcion = $this->validarString($descripcion, "descripcion");
        $this->aire_acondicionado = $this->validarCheckbox($aire_acondicionado, "aire_acondicionado");


        // $this->provincia = $this->validarElementoArray(
        //     $provincia,
        //     $this->provincias_validas,
        //     "provincia",
        //     "La provincia seleccionada no existe."
        // );
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
    private function validarElementoArray($elemento, $array, $nombreError, $mensajeError)
    {
        if (empty($elemento)) {
            $this->errores[$nombreError]["vacio"] = $this->mensajes_error[$nombreError]["vacio"];
            return $elemento;
        }

        if (in_array($elemento, array_keys($array))) {
            return $elemento;
        } else {
            $this->errores[$nombreError]["erroneo"] = $this->mensajes_error[$nombreError]["erroneo"];
        }
    }

    // Validar array
    private function validarCheckbox($elemento, $nombre_elemento)
    {
        if (empty($elemento)) {
            return false;
        } else {
            if (in_array($elemento, $this->checkbox_validos)) {
                return true;
            } else {
                $this->errores[$nombre_elemento]["erroneo"] = $this->mensajes_error[$nombre_elemento]["erroneo"];
            }
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
