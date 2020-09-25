<?php

class CeinaForms {
    public $errores;
    public $mensajes_error;
    public $datosRecibidos;

    public function __construct() {

    }

    public function enviarFormulario($datos)
    {
        $this->datosRecibidos = $datos;
    }

    public function showInput($type, $id, $name, $placeholder, $label, $validacion) {
        switch ($type) {
            case 'text':
                return $this->getTypeInput($type, $id, $name, $placeholder, $label, $validacion);
                break;

            default:
                # code...
                break;
        }
    }

    private function getTypeInput($type, $id, $name, $placeholder, $label, $validacion)
    {
        if ($validacion) {
            $miDato = $this->sanitizacion($this->datosRecibidos[$name], $type);
            $esValido = $this->validacion($miDato, $type);
        }
        $textInput = '<div class="grupo">';
        $textInput .= '<label class="label" for="' . $id . '">';
        $textInput .= $label;
        $textInput .= '</label>';
        $textInput .= '<input type="text" name="' . $name . '" id="' . $id . '" placeholder="' . $placeholder . '" />';
        if ($esValido) {
            $textInput .= '<p>Gracias por enviar tus datos</p>';
        } else {
            $textInput .= '<p>Menudo horror.</p>';
        }
        $textInput .= '</div>';
        echo $textInput;
    }

    private function sanitizacion($valor, $tipo)
    {
        switch ($tipo) {
            case 'text':
                $filter = FILTER_SANITIZE_STRING;
                break;
            
            default:
                # code...
                break;
        }
        return filter_var($valor, $filter);
    }

    private function validacion($valor, $tipo)
    {
        switch ($tipo) {
            case 'text':
                return $valor !== '' ? true : false;
                break;
            
            default:
                # code...
                break;
        }
    }
}