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

            case 'checkbox':
                return $this->getTypeCheckbox($type, $id, $name, $placeholder, $label, $validacion);
                break;


            default:
                # code...
                break;
        }
    }

    private function getTypeInput($type, $id, $name, $placeholder, $label, $validacion)
    {
        $classes = "input input-text";

        if ($validacion) {
            $miDato = $this->sanitizacion($this->datosRecibidos[$name], $type);
            $esValido = $this->validacion($miDato, $type);

            if ($esValido) {
                $classes .= " valid-input";
            } else {
                $classes .= " error-input";
            }
        }

        $textInput = '<div class="grupo">';
        $textInput .= '<label class="label" for="' . $id . '">';
        $textInput .= $label;
        $textInput .= '</label>';
        $textInput .= '<input value="' . $miDato . '" type="text" name="' . $name . '" id="' . $id . '" placeholder="' . $placeholder . '" class="' . $classes . '" />';
        if ($esValido) {
            $textInput .= '<p class="success small">Datos validos.</p>';
        } else {
            $textInput .= '<p class="error small">Por favor, revisa el campo. El dato esta vacio o no es valido.</p>';
        }
        $textInput .= '</div>';
        echo $textInput;
    }

    private function getTypeCheckbox($type, $id, $name, $placeholder, $label, $validacion)
    {
        $classes = "input input-checkbox";
        $isChecked = "";
        if ($validacion && in_array($name, array_keys($this->datosRecibidos))) {
                $isChecked = "checked";
                $classes .= " valid-input";
        }

        $checkBox = '<div class="grupo grupo-checkbox">';
        $checkBox .= '<input ' . $isChecked . ' type="checkbox" name="' . $name . '" id="' . $id . '" placeholder="' . $placeholder . '" class="' . $classes . '"/>';
        $checkBox .= '<label class="label" for="' . $id . '">';
        $checkBox .= $label;
        $checkBox .= '</label>';
        // if ($esValido) {
        //     $checkBox .= '<p class="success small">Datos validos.</p>';
        // } else {
        //     $checkBox .= '<p class="error small">Por favor, revisa el campo. El dato esta vacio o no es valido.</p>';
        // }
        $checkBox .= '</div>';
        echo $checkBox;
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