<?php
// Crear una clase para calcular el índice de masa corporal de un paciente.
// Crear propiedades, publicas y privadas para desarrollar la tarea.
// Crear métodos publicos y privados, para desarrollar la tarea.
// Crear un método que devuelva el resultado en función del calculo realizado.

class ProcesarDatos
{
    public $nombre;
    public $apellidos;
    public $matricula;
    public $edad;

    public $matricula_v;
    public $marca;
    public $modelo;
    public $combustible;
    public $puertas;

    // public $provincias_validas;
    public $errores;
    public $mensajes_error;

    public function __construct()
    {
        $this->errores = array();
        $this->mensajes_error = $this->mensajesError();
    }

    public function envioFormularioPropietario($nombre, $apellidos, $matricula, $edad) {
        $this->nombre = $this->validarString($nombre, "nombre");
        $this->apellidos = $this->validarString($apellidos, "apellidos");
        $this->matricula = $this->validarString($matricula, "matricula");
        $this->edad = $this->validarString($edad, "edad");
    }

    private function validarString($input, $campo)
    {
        if (empty($input)) {
            $this->errores[$campo]["vacio"] = $this->mensajes_error[$campo]["vacio"];
            return $input;
        }

        // if (strlen($input) < 5) {
        //     $this->errores[$campo]["erroneo"] = $this->mensajes_error[$campo]["erroneo"];
        // }

        $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    private function mensajesError()
    {
        $mensajesError = array();
        $mensajesError['nombre']["vacio"] = "El nombre esta vacio.";
        $mensajesError['nombre']["erroneo"] = "Has enviado un nombre no valido.";
       
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

    public function guardarPropietario()
    {
        $propietario = "Nombre: " . $this->nombre;
        $propietario .= ", Apellidos: " . $this->apellidos;
        $propietario .= ", Matricula: " . $this->matricula;
        $propietario .= ", Edad: " . $this->edad . "." . PHP_EOL;
        return $propietario;
    }

    public function guardarPropietarioJSON()
    {
        $propietario = array(
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "matricula" => $this->matricula,
            "edad" => $this->edad,
        );
        return $propietario;
    }
}
