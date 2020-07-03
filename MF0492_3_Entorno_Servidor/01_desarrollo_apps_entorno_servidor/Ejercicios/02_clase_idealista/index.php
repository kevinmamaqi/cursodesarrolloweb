<?php

// Crear una clase para procesar el envio de un usuario
// Definir los parametros
// Definir las métodos
// Definir los MODIFICADORES DE ACCESO
// Crear métodos que saniticen los parametros

class EnvioPropiedad {
    public $errores;
    public $tipo_inmueble; // Arrays
    public $operacion; // Arrays
    public $direccion; // String
    public $provincia; // Arrays
    public $codigo_postal; // Arrays

    public $ocultar_calle; // bool
    public $planta; // int
    public $puerta; // string
    public $bloque_portal; // bool
    public $bloque_portal_true; // string
    public $urbanizacion; // string
    public $email; // string (email)
    public $telefono; // string (telefono)
    public $telefono_extranjero; // bool
    public $nombre_usuario; // string
    public $preferencia_contacto; // string, comprobar con

    private $tipos_inmueble_validos;
    private $operaciones_validas;
    private $provincias_validas;
    private $codigos_postales_validos;

    public function __construct(
        $tipo_inmueble,
        $operacion,
        $direccion,
        $provincia,
        $codigo_postal,
        $ocultar_calle,
        $planta,
        $puerta,
        $bloque_portal,
        $urbanizacion,
        $email,
        $telefono,
        $telefono_extranjero,
        $nombre_usuario,
        $preferencia_contrato
    ) {
        $this->errores = array();
        $this->tipos_inmueble_validos = ["oficina", "piso", "azotea", "garaje"];
        $this->operaciones_validas = ["Alquiler", "Venta"];
        $this->provincias_validas = ["Barcelona", "Madrid", "Huelva"];
        $this->codigos_postales_validos = ["50005", "08002", "09002"];
        $this->tipo_inmueble = $this->validarElementoArray(
            $tipo_inmueble,
            $this->tipos_inmueble_validos,
            "tipo_inmueble",
            "El inmueble seleccionado no existe."
        );
        $this->operacion = $this->validarElementoArray(
            $operacion,
            $this->operaciones_validas,
            "operacion",
            "La operación seleccionada no existe."
        );
        $this->direccion = $this->validarString($direccion, "direccion");
        $this->provincia = $this->validarElementoArray(
            $provincia,
            $this->provincias_validas,
            "provincia",
            "La provincia seleccionada no existe."
        );
        $this->codigo_postal = $this->validarElementoArray(
            $codigo_postal,
            $this->codigos_postales_validos,
            "codigo_postal",
            "El código postal seleccionado no existe."
        );
        $this->ocultar_calle        = $this->validarBoolean($ocultar_calle, "ocultar_calle");
        $this->planta               = $this->validarNumeroInt($planta, "planta");
        $this->puerta               = $this->validarString($puerta, "puerta");
        $this->bloque_portal        = $this->validarBoolean($bloque_portal, "bloque_portal");
        $this->urbanizacion         = $this->validarString($urbanizacion, "urbanizacion");
        $this->email                = $this->validarString($email, "email");
        $this->telefono             = $this->validarString($telefono, "telefono");
        $this->telefono_extranjero  = $this->validarBoolean($telefono_extranjero, "telefono_extranjero");
        $this->nombre_usuario       = $this->validarString($nombre_usuario, "nombre_usuario");
        $this->preferencia_contrato = $this->validarString($preferencia_contrato, "preferencia_contrato");
    }

    // Validar array
    private function validarElementoArray($elemento, $array, $nombreError, $mensajeError)
    {
        if (in_array($elemento, $array)) {
            return $elemento;
        } else {
            $this->errores[$nombreError] = $mensajeError;
        }
    }

    // Validar frase
    private function validarString($frase, $nombreError)
    {
        if (!empty($frase)) {
            $this->errores[$nombreError] = "No has completado el campo.";
        } elseif (!is_string($frase)) {
            $this->errores[$nombreError] = "No has enviado un valor valido (no es una frase).";
        } else {
            $this->direccion = $frase;
        }
    }

    // Validar Boolean
    private function validarBoolean($valor, $nombreError)
    {
        if ($valor === true || $valor === false) {
            return $valor;
        } else {
            $this->errores[$nombreError] = "No has seleccionado un valor correcto.";
        }
    }

    private function validarNumeroInt($valor, $nombreError)
    {
        if (!is_int($valor)) {
            $this->errores[$nombreError] = "No has enviado un valor correcto.";
        } else {
            return $valor;
        }
    }

    
}
$miPiso = new EnvioPropiedad("ghfhgf", "alquiler", "C/ Fernando de Antequera", "Zaragoza", "50006");
var_dump($miPiso);
