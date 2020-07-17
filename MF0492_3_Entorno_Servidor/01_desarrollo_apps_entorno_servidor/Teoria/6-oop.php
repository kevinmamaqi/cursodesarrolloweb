<?php

// ¿Qué es la programación orienteda a objetos?
// Es un paradigma de programación. Es un método para organizar y estructurar el código.
// El núcleo central de este paradigma es la unión de datos y procesamiento,
// en una entidad llamada "OBJETO", relacionable a su vez con otras entidades "OBJETO".

// DATOS = VARIABLES / PROPIEDADES.
// PROCESAMIENTO = FUNCIONES / MÉTODOS.

// Las funciones que sirven para asignar valores en los objetos suelen llamarse SETTERS.
// Las funciones que sirven para obtener valores en los objetos suelen llamarse GETTERS.

// Las clases tienen MODIFICADORES DE ACCESO.
// Controlan (permiten) que propiedades y métodos son accesibles.

// HERENCIA
// Permite heredar las propiedades y métodos de la clase "padre", y a su vez extender la clase con propiedades y métodos internos.


class Fruta {
    // Aquí viene nuestro código
    // Propiedades (variables)
    public $nombre;
    public $color;
 
    // Constructor
    function __construct($nombre, $color)
    {
        $this->nombre = $nombre;
        $this->color = $color;
    }

    // Destructor
    function __destruct()
    {
        echo "La fruta {$this->nombre}, se ha guardado correctamente. Gracias y adios." . PHP_EOL;
    }

    function obtener_nombre()
    {
        return $this->nombre;
    }

    function obtener_color()
    {
        return "Esta " . $this->nombre . " tiene un color: " . $this->color;
    }
}


class ControlFrutas {
    public $nombre;
    public $color;
    public $peso;

    public function ponerNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function ponerColor($color)
    {
        $this->color = $color;
    }

    public function ponerPeso($peso)
    {
        $this->peso = $peso;
    }
}

class SuperControlFrutas extends ControlFrutas
{
    public function sonDeTemporada()
    {
        echo "No, en verano no hay buenas fresas";
    }
}

$miFresa = new SuperControlFrutas();
var_dump($miFresa->sonDeTemporada());
