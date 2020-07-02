<?php

// Crear una clase para procesar el envio de un usuario
// Definir los parametros
// Definir las métodos
// Definir los MODIFICADORES DE ACCESO
// Crear métodos que saniticen los parametros

class EnvioPropiedad {
    public $tipo_inmueble;
    public $operacion;
    public $direccion;
    public $provincia;
    public $codigo_postal;
    public $errores;
    private $tipos_inmueble_validos;

    public function __construct(
        $tipo_inmueble,
        $operacion,
        $direccion,
        $provincia,
        $codigo_postal
    ) {
        $this->errores = array();
        $this->tipos_inmueble_validos = ["oficina", "piso", "azotea", "garaje"];
        $this->tipo_inmueble = $this->validarTipoInmueble($tipo_inmueble);
        $this->operacion = $this->validarOperacion($operacion);
        $this->direccion = $direccion;
        $this->provincia = $provincia;
        $this->codigo_postal = $codigo_postal;
    }

    private function validarTipoInmueble($tipo_inmueble) {
        if (in_array($tipo_inmueble, $this->tipos_inmueble_validos)) {
            return $tipo_inmueble;
        } else {
            $this->errores["tipo_inmueble"] = "El tipo de inmueble no es correcto";
        }
    }

    private function validarOperacion($operacion)
    {
        if ($operacion !== "alquiler" || $operacion !== "venta") {
            $this->errores["operacion"] = "La operación no es correcta";
        } else {
            return $operacion;
        }
    }
}
$miPiso = new EnvioPropiedad("ghfhgf", "alquiler", "C/ Fernando de Antequera", "Zaragoza", "50006");
var_dump($miPiso);
