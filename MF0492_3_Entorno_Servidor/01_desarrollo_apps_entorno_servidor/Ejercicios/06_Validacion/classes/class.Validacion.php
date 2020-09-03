<?php
// Crear una clase para calcular el índice de masa corporal de un paciente.
// Crear propiedades, publicas y privadas para desarrollar la tarea.
// Crear métodos publicos y privados, para desarrollar la tarea.
// Crear un método que devuelva el resultado en función del calculo realizado.

class Validacion
{
    public $nombre_usuario;
    public $provincia;
    public $garaje;
    public $amueblada;
    public $jardin;

    public $provincias_validas;
    public $errores;
    public $mensajes_error;

    public function __construct()
    {
        $this->errores = array();
        $this->mensajes_error = $this->mensajesError();
        $this->provincias_validas = array(
            'lleida'    => "Lleida",
            'barcelona' => "Barcelona",
            'madrid'    => "Madrid",
            'cadiz'     => "Cadiz",
            'caceres'   => "Caceres",
        );
    }

    public function envioFormulario($nombre_usuario, $provincia) {
        $this->nombre_usuario = $this->validarString($nombre_usuario, "nombre_usuario");
        
        $this->provincia = $this->validarElementoArray(
            $provincia,
            $this->provincias_validas,
            "provincia",
            "La provincia seleccionada no existe."
        );
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

    private function mensajesError()
    {
        $mensajesError = array();
        $mensajesError['nombre_usuario']["vacio"] = "El nombre esta vacio.";
        $mensajesError['nombre_usuario']["erroneo"] = "Has enviado un nombre no valido.";
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
