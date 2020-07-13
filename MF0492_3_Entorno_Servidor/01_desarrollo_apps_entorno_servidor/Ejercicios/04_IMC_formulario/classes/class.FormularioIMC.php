<?php
// Crear una clase para calcular el índice de masa corporal de un paciente.
// Crear propiedades, publicas y privadas para desarrollar la tarea.
// Crear métodos publicos y privados, para desarrollar la tarea.
// Crear un método que devuelva el resultado en función del calculo realizado.

class CalcularIMC
{
    public $nombre;
    public $apellidos;
    public $peso;
    public $altura;
    public $errores;
    public $mensajes_error;

    public function __construct($nombre, $apellidos, $peso, $altura)
    {
        $this->errores = array();
        $this->mensajes_error = $this->mensajesError();
        $this->nombre = $this->validarString($nombre, "nombre");
        $this->apellidos = $this->validarString($apellidos, "apellidos");
        $this->peso = $this->comprobarNumero($peso, "peso");
        $this->altura = $this->comprobarNumero($altura, "altura");
    }

    private function validarString($input, $campo)
    {
        if (empty($input)) {
            $this->errores[$campo] = $this->mensajes_error[$campo];
            return $input;
        }

        $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    private function calcularIMCPaciente()
    {
        return 100 * $this->peso / $this->altura;
    }

    private function comprobarNumero($input, $campo)
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

    private function mensajesError()
    {
        $mensajesError = array();
        $mensajesError['nombre'] = "El nombre esta vacio, por favor rellena el campo.";
        $mensajesError['apellidos'] = "Los apellidos estan vacios, por favor rellena el campo.";
        $mensajesError['peso']["erroneo"] = "El peso que has enviado es incorrecto.";
        $mensajesError['peso']["vacio"] = "El peso esta vacio";
        $mensajesError['altura'] = "La altura que has enviado es incorrecta.";
        return $mensajesError;
    }

    public function devolverCalculoIMC()
    {
        $valorIMC = $this->calcularIMCPaciente();
        
        if ($valorIMC > 25) {
            echo "<p>Enhorabuena " . $this->nombre . " " . $this->apellidos . " tienes que ir al gimnasio.";
        } elseif ($valorIMC > 20 && $valorIMC < 25) {
            echo "<p>Enhorabuena " . $this->nombre . " " . $this->apellidos . " estas en tu peso ideal.</p>";
        } else {
            echo "<p>Enhorabuena " . $this->nombre . " " . $this->apellidos . " tienes que comer más.</p>";
        }
    }

    public function guardarResultados()
    {
        $IMC_PACIENTE = $this->calcularIMCPaciente();
        return $this->nombre . " " . $this->apellidos . ", Resultado: " . $IMC_PACIENTE . ". Peso: " . $this->peso . ". Altura: " . $this->altura . "." . PHP_EOL;
    }
}
