<?php
// Crear una clase para calcular el índice de masa corporal de un paciente.
// Crear propiedades, publicas y privadas para desarrollar la tarea.
// Crear métodos publicos y privados, para desarrollar la tarea.
// Crear un método que devuelva el resultado en función del calculo realizado.

class Vehiculos
{
    public $nombre_usuario;
    public $email_usuario;
    public $modelo;
    public $marca;
    public $version;
    public $n_puertas;
    public $anio;
    public $estado;
    public $precio;
    public $combustible;

    public function __construct($nombre_usuario, $email_usuario, $modelo, $marca, $version, $n_puertas, $anio, $estado, $precio)
    {
        $this->errores = array();
        $this->mensajes_error = $this->mensajesError();
        $this->nombre_usuario = $this->validarString($nombre, "nombre_usuario");

        // CAMBIAR LUEGO Y VALIDAR COMO EMAIL
        $this->email_usuario = $this->validarString($email_usuario, "email_usuario");
        $this->marca = $this->validarString($marca, "marca");
        $this->modelo = $this->validarString($modelo, "modelo");
        $this->version = $this->validarString($version, "version");
        $this->n_puertas = $this->comprobarNumero($n_puertas, "n_puertas");
        $this->anio = $this->comprobarNumero($anio, "anio");
        $this->estado = $this->validarString($estado, "estado");
        $this->combustible = $this->validarString($combustible, "combustible");
        $this->precio = $this->comprobarNumero($precio, "precio");
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
        $mensajesError['nombre_usuario'] = "El nombre esta vacio, por favor rellena el campo.";
        $mensajesError['email_usuario']  = "El email esta vacio o no es valido.";
        $mensajesError['modelo']         = "El modelo esta vacio o no es valido.";
        $mensajesError['marca']          = "El peso que has enviado es incorrecto.";
        $mensajesError['version']        = "El peso esta vacio";
        $mensajesError['n_puertas']      = "La altura que has enviado es incorrecta.";
        $mensajesError['anio']        = "El año esta vacio o no es valido.";
        $mensajesError['estado']      = "El estado que has enviado esta vacio o no es valido.";
        $mensajesError['precio']      = "El precio que has enviado esta vacio o no es valido.";
        $mensajesError['combustible'] = "El combustible seleccionado esta vacio o no es valido.";
        return $mensajesError;
    }


    public function guardarResultados()
    {
        return $this->nombre_usuario . ", " . $this->email_usuario . ". Vehículo enviado: Modelo:" . $this->modelo . ". Marca: " . $this->marca . ". Version: " . $this->version . ". Número de puertas: " . $this->n_puertas . ". Año: " . $this->anio  . ". Precio: " . $this->precio . ". Estado: " . $this->estado  . ". Combustible: " . $this->combustible . PHP_EOL;
    }
}
