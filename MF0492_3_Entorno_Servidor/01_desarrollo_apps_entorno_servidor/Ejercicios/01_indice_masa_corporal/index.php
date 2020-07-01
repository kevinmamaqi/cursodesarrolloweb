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

    public function __construct($nombre, $apellidos, $peso, $altura)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->peso = $this->comprobarNumero($peso);
        $this->altura = floatval($altura);
    }

    private function calcularIMCPaciente()
    {
        return 100 * $this->peso / $this->altura;
    }

    private function comprobarNumero($peso)
    {
        if (is_int($peso)) {
            return $peso;
        } else {
            $nuevopeso = intval($peso);
            if (!is_int($nuevopeso) || $nuevopeso === 0) {
                throw new Exception("No es peso, error");
            } else {
                return $nuevopeso;
            }
        }
    }

    public function devolverCalculoIMC()
    {
        $valorIMC = $this->calcularIMCPaciente();
        
        if ($valorIMC > 25) {
            echo "Enhorabuena " . $this->nombre . " " . $this->apellidos . " tienes que ir al gimnasio." . PHP_EOL;
        } elseif ($valorIMC > 20 && $valorIMC < 25) {
            echo "Enhorabuena " . $this->nombre . " " . $this->apellidos . " estas en tu peso ideal." . PHP_EOL;
        } else {
            echo "Enhorabuena " . $this->nombre . " " . $this->apellidos . " tienes que comer más." . PHP_EOL;
        }
    }
}

$paciente = new CalcularIMC("Kevin", "Mamaqi", "A", "1.72");
var_dump($paciente);
