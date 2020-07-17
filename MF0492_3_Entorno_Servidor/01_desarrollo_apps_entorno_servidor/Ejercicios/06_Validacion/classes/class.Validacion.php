<?php
// Crear una clase para calcular el índice de masa corporal de un paciente.
// Crear propiedades, publicas y privadas para desarrollar la tarea.
// Crear métodos publicos y privados, para desarrollar la tarea.
// Crear un método que devuelva el resultado en función del calculo realizado.

class Validacion
{
    public $nombre_usuario;
    public $errores;
    public $mensajes_error;

    public function __construct($nombre_usuario)
    {
        $this->errores = array();
        $this->mensajes_error = $this->mensajesError();
        $this->nombre_usuario = $this->validarString($nombre_usuario, "nombre_usuario");
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

    private function mensajesError()
    {
        $mensajesError = array();
        $mensajesError['nombre_usuario']["vacio"] = "El nombre esta vacio.";
        $mensajesError['nombre_usuario']["erroneo"] = "Has enviado un nombre no valido.";
       
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
