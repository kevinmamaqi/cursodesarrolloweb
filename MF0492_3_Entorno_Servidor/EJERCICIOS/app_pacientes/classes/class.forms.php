<?php

class CeinaForms {
    public $errores;
    public $mensajes_error;
    public $datosRecibidos;

    public function __construct() {
        $this->errores = false;
    }

    public function enviarFormulario($datos)
    {
        $this->datosRecibidos = $datos;
    }

    public function showInput($type, $id, $name, $placeholder, $label, $validacion, $options = null)
    {
        switch ($type) {
            case 'text':
                return $this->getTypeInput($type, $id, $name, $placeholder, $label, $validacion);
                break;

            case 'checkbox':
                return $this->getTypeCheckbox($type, $id, $name, $placeholder, $label, $validacion);
                break;

            case 'select':
                return $this->getTypeSelect($type, $id, $name, $placeholder, $label, $validacion, $options);
                break;

            default:
                # code...
                break;
        }
    }

    private function getTypeInput($type, $id, $name, $placeholder, $label, $validacion)
    {
        $classes = "input input-text";
        $miDato = "";
        $esValido = null;
        if ($validacion) {
            $miDato = $this->sanitizacion($this->datosRecibidos[$name], $type);
            $esValido = $this->validacion($miDato, $type);

            if ($esValido) {
                $classes .= " valid-input";
            } else {
                $classes .= " error-input";
                $this->errores = true;
            }
        }

        $textInput = '<div class="grupo">';
        $textInput .= '<label class="label" for="' . $id . '">';
        $textInput .= $label;
        $textInput .= '</label>';
        $textInput .= '<input value="' . $miDato . '" type="text" name="' . $name . '" id="' . $id . '" placeholder="' . $placeholder . '" class="' . $classes . '" />';
        if ($miDato && $esValido) {
            $textInput .= '<p class="success small">Datos validos.</p>';
        }
        if ($esValido === false) {
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

    private function getTypeSelect($type, $id, $name, $placeholder, $label, $validacion, $options)
    {
        $classes = "input input-select";
        $mensaje_validacion = "";
        $isSelected = false;
        $valor_seleccionado = "";

        if ($validacion && in_array($name, array_keys($this->datosRecibidos))) {
            $valor_seleccionado = $this->datosRecibidos[$name];

            if (in_array($valor_seleccionado, array_keys($options))) {
                $classes .= " valid-input";
                $mensaje_validacion = '<p class="success small">Datos validos.</p>';
                $isSelected = true;
            } else {
                $classes .= " error-input";
                $mensaje_validacion = '<p class="error small">Alguno de los datos esta mal, por favor revisa los datos seleccionados.</p>';
                $this->errores = true;
            }
        }
        $select = '<div class="grupo grupo-select">';
        $select .= '<label class="label" for="' . $id . '">';
        $select .= $label;
        $select .= '</label>';
        $select .= '<select id="' . $id . '" name="' . $name . '" class="' . $classes . '">';
        $select .= '<option disabled' . ($isSelected === false ? ' selected' : "") . '>-- Por favor seleccionar una opción</option>';
        foreach ($options as $key => $value) {
            $select .= '<option value="' . $key . '"' . ($valor_seleccionado === $key ? ' selected' : "") . '>' . $value . '</option>';
        }
        $select .= '</select>';
        $select .= $mensaje_validacion;
        $select .= '</div>';
        echo $select;
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

    public function hayErrores()
    {
        return $this->errores;
    }
}