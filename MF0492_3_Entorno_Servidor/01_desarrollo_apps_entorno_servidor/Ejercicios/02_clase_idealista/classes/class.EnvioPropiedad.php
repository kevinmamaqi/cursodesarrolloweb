<?php

// Crear una clase para procesar el envio de un usuario
// Definir los parametros
// Definir las métodos
// Definir los MODIFICADORES DE ACCESO
// Crear métodos que saniticen los parametros

class EnvioPropiedad {

    // Propiedades que envia el usuario
    // Que recibimos del formulario del usuario
    public $tipo_inmueble;
    public $operacion;
    public $direccion;
    public $provincia;
    public $codigo_postal;
    public $ocultar_calle;
    public $planta;
    public $puerta;
    public $bloque_portal;
    public $bloque_portal_true;
    public $urbanizacion;
    public $email;
    public $telefono;
    public $telefono_extranjero;
    public $nombre_usuario;
    public $preferencia_contacto;
    public $estado;
    public $m2_construidos;
    public $m2_utiles;
    public $m2_superficie_m;
    public $fachada_exterior;
    public $distribucion;
    public $uso_exclusivo_of;
    public $numero_banos_as;
    public $tipo_de_banos;
    public $ubicacion_banos;
    public $ascensores;
    public $certificacion_energetica;
    public $plazas_garaje_ip;
    public $aire_acondicionado;
    public $seguridad_oficina;
    public $caracteristicas_oficina;
    public $mobilidad_reducida;
    public $precio_mes;
    public $fianza;
    public $descripcion_anuncio;

    // Propiedades que usamos para generar y validar el formulario
    // que envia el usuario.
    public $errores;
    public $tipos_inmueble_validos;
    public $operaciones_validas;
    public $provincias_validas;
    public $codigos_postales_validos;
    public $estados_validos;
    public $fachada_exterior_validas;
    public $distribucion_validos;
    public $uso_exclusivo_of_validos;
    public $tipo_de_banos_validos;
    public $ubicacion_banos_validos;
    public $certificacion_energetica_validos;
    public $aire_acondicionado_validos;
    public $seguridad_oficina_validos;
    public $caracteristicas_oficina_validos;
    public $fianza_validos;
    public $planta_validos;
    public $metodo_contacto_validos;

    public function __construct()
    {
        $this->errores = array();
        $this->tipos_inmueble_validos = array(
            "oficina"      => "Oficina",
            "piso"         => "Piso",
            "azotea"       => "Azotea",
            "garaje"       => "Garaje",
            "garaje_motos" => "Garaje para motocicletas"
        );
        $this->operaciones_validas = array(
            'venta'       => "Venta",
            "alquiler"    => "Alquiler",
            "intercambio" => "Intercambio",
            "regalo"      => "Regalo"
        );
        $this->provincias_validas = array(
            'lleida'    => "Lleida",
            'barcelona' => "Barcelona",
            'madrid'    => "Madrid",
            'cadiz'     => "Cadiz",
            'caceres'   => "Caceres",
        );
        $this->codigos_postales_validos = array(
            "50005",
            "08002",
            "09002"
        );
        $this->estados_validos = ["50005", "08002", "09002"];
        $this->fachada_exterior_validas = ["50005", "08002", "09002"];
        $this->distribucion_validos = array(
            'diafana'      => "Diáfana",
            'div_mamparas' => "Dividida con mamparas",
            'div_tabiques' => "Dividida con tabiques",
        );
        $this->uso_exclusivo_of_validos = ["50005", "08002", "09002"];
        $this->tipo_de_banos_validos = array(
            'aseos'     => "Aseos",
            'banos'     => "Baños",
            'dos_tipos' => "De los dos tipos",
        );
        $this->ubicacion_banos_validos = ["50005", "08002", "09002"];
        $this->certificacion_energetica_validos = array(
            'cer1' => 'Cer 1',
            'cer2' => 'Cer 2',
            'cer3' => 'Cer 3',
            'cer4' => 'Cer 4',
            'cer5' => 'Cer 5',
            'cer6' => 'Cer 6',
        );
        $this->aire_acondicionado_validos = array(
            'no_disponible'  => 'No disponible',
            'frio'           => 'Frío',
            'frio_calor'     => 'Frío / calor',
            'preinstalacion' => 'Preinstalación',
        );
        $this->seguridad_oficina_validos = array(
            'puerta_seguridad'        => 'Puerta de seguridad',
            'sistemas_alarma_cerrado' => 'Sistema de alarma/circuito cerrado de seguridad',
            'control_accesos'         => 'Control de accesos',
            'extintores'              => 'Extintores',
        );
        $this->caracteristicas_oficina_validos = array(
            'agua_caliente'         => "Agua caliente",
            'calefaccion'           => "Calefacción",
            'cocina_office'         => "Cocina/office",
            'almacen'               => "Almacén",
            'doble_acristalamiento' => "Doble acristalamiento",
        );
        $this->fianza_validos = ["50005", "08002", "09002"];
        $this->planta_validos = array(
            'primera_planta' => "Primera Planta",
            'segunda_planta' => "Segunda Planta",
            'tercera_planta' => "Tercera Planta",
        );
        $this->metodo_contacto_validos = array(
            'telefono_y_mail_y_chat' => "Teléfono, email y mensajes de chat (recomendado)",
            'solo_telefono'          => "Solamente por teléfono",
            'solo_por_mail_y_chat'   => "Solamente por email y mensajes de chat",
        );
        $this->planta_validos = array(
            'primera_planta' => "Primera Planta",
            'segunda_planta' => "Segunda Planta",
            'tercera_planta' => "Tercera Planta",
        );
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

    // Validaciones
    public function validarPropiedades(
        $tipo_inmueble
        // $operacion,
        // $provincia,
        // $codigo_postal,
        // $direccion,
        // $ocultar_calle,
        // $planta,
        // $puerta,
        // $bloque_portal,
        // $urbanizacion,
        // $email,
        // $telefono,
        // $telefono_extranjero,
        // $nombre_usuario,
        // $preferencia_contrato,
        // $estado,
        // $m2_construidos,
        // $m2_utiles,
        // $m2_superficie_m,
        // $fachada_exterior,
        // $distribucion,
        // $uso_exclusivo_of,
        // $numero_banos_as,
        // $tipo_de_banos,
        // $ubicacion_banos,
        // $certificacion_energetica
        // $ascensores,
        // $plazas_garaje_ip,
        // $aire_acondicionado,
        // $seguridad_oficina,
        // $caracteristicas_oficina,
        // $mobilidad_reducida,
        // $precio_mes,
        // $fianza,
        // $descripcion_anuncio
    ) {
        $this->tipo_inmueble = $this->validarElementoArray(
            $tipo_inmueble,
            $this->tipos_inmueble_validos,
            "tipo_inmueble",
            "El inmueble seleccionado no existe."
        );
        // $this->operacion = $this->validarElementoArray(
        //     $operacion,
        //     $this->operaciones_validas,
        //     "operacion",
        //     "La operación seleccionada no existe."
        // );
        // $this->direccion = $this->validarString($direccion, "direccion");
        // $this->provincia = $this->validarElementoArray(
        //     $provincia,
        //     $this->provincias_validas,
        //     "provincia",
        //     "La provincia seleccionada no existe."
        // );
        // $this->codigo_postal = $this->validarElementoArray(
        //     $codigo_postal,
        //     $this->codigos_postales_validos,
        //     "codigo_postal",
        //     "El código postal seleccionado no existe."
        // );
        // $this->ocultar_calle        = $this->validarBoolean($ocultar_calle, "ocultar_calle");
        // $this->planta               = $this->validarNumeroInt($planta, "planta");
        // $this->puerta               = $this->validarString($puerta, "puerta");
        // $this->bloque_portal        = $this->validarBoolean($bloque_portal, "bloque_portal");
        // $this->urbanizacion         = $this->validarString($urbanizacion, "urbanizacion");
        // $this->email                = $this->validarString($email, "email");
        // $this->telefono             = $this->validarString($telefono, "telefono");
        // $this->telefono_extranjero  = $this->validarBoolean($telefono_extranjero, "telefono_extranjero");
        // $this->nombre_usuario       = $this->validarString($nombre_usuario, "nombre_usuario");
        // $this->preferencia_contrato = $this->validarString($preferencia_contrato, "preferencia_contrato");

        // $this->estado = $this->validarElementoArray(
        //     $estado,
        //     $this->estados_validos,
        //     "estado",
        //     "El estado seleccionado no existe o no es valido."
        // );
        // $this->m2_construidos   = $this->validarNumeroInt($m2_construidos, "m2_construidos");
        // $this->m2_utiles        = $this->validarNumeroInt($m2_utiles, "m2_utiles");
        // $this->m2_superficie_m  = $this->validarNumeroInt($m2_superficie_m, "m2_superficie_m");
        // $this->fachada_exterior = $this->validarElementoArray(
        //     $fachada_exterior,
        //     $this->fachada_exterior_validas,
        //     "fachada_exterior",
        //     "La fachada exterior no es valida."
        // );
        // $this->distribucion = $this->validarElementoArray(
        //     $distribucion,
        //     $this->distribucion_validos,
        //     "distribucion",
        //     "El distribución seleccionado no existe."
        // );
        // $this->uso_exclusivo_of = $this->validarElementoArray(
        //     $uso_exclusivo_of,
        //     $this->uso_exclusivo_of_validos,
        //     "uso_exclusivo_of",
        //     "El uso exclusivo oficinas seleccionado no existe."
        // );
        // $this->numero_banos_as = $this->validarNumeroInt($numero_banos_as, "numero_banos_as");
        // $this->tipo_de_banos = $this->validarElementoArray(
        //     $tipo_de_banos,
        //     $this->tipo_de_banos_validos,
        //     "tipo_de_banos",
        //     "El uso tipo de baños seleccionado no existe."
        // );
        // $this->ubicacion_banos = $this->validarElementoArray(
        //     $ubicacion_banos,
        //     $this->ubicacion_banos_validos,
        //     "ubicacion_banos",
        //     "La ubicación de los baños seleccionados no es valida."
        // );
        // $this->certificacion_energetica = $this->validarElementoArray(
        //     $certificacion_energetica,
        //     $this->certificacion_energetica_validos,
        //     "certificacion_energetica",
        //     "El uso exclusivo oficinas seleccionado no existe."
        // );

        // $this->ascensores = $this->validarNumeroInt($ascensores, "ascensores");

        // $this->plazas_garaje_ip = $this->validarNumeroInt($plazas_garaje_ip, "plazas_garaje_ip");
        // $this->aire_acondicionado = $this->validarElementoArray(
        //     $aire_acondicionado,
        //     $this->aire_acondicionado_validos,
        //     "aire_acondicionado",
        //     "Las opciones de aire acondicionado seleccionadas no son validas."
        // );
        // $this->seguridad_oficina = $this->validarElementoArray(
        //     $seguridad_oficina,
        //     $this->seguridad_oficina_validos,
        //     "seguridad_oficina",
        //     "Las opciones de seguridad oficina no son validas o no existen."
        // );
        // $this->caracteristicas_oficina = $this->validarElementoArray(
        //     $caracteristicas_oficina,
        //     $this->caracteristicas_oficina_validos,
        //     "caracteristicas_oficina",
        //     "Las características de la oficina no son validas o no existen."
        // );
        // $this->mobilidad_reducida  = $this->validarBoolean($mobilidad_reducida, "mobilidad_reducida");
        // $this->precio_mes = $this->validarNumeroInt($precio_mes, "precio_mes");
        // $this->fianza = $this->validarElementoArray(
        //     $fianza,
        //     $this->fianza_validos,
        //     "fianza",
        //     "El tipo de fianza no es valida o no existe."
        // );
        // $this->descripcion_anuncio = $this->validarString($descripcion_anuncio, "descripcion_anuncio");
    }

    // Comprobar errores
    public function hayErrores()
    {
        if (count($this->errores) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
