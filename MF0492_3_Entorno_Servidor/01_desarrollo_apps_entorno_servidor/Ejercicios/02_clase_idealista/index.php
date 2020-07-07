<?php

// Crear una clase para procesar el envio de un usuario
// Definir los parametros
// Definir las métodos
// Definir los MODIFICADORES DE ACCESO
// Crear métodos que saniticen los parametros

$tipos_inmueble_validos = array(
    "oficina"      => "Oficina",
    "piso"         => "Piso",
    "azotea"       => "Azotea",
    "garaje"       => "Garaje",
    "garaje_motos" => "Garaje para motocicletas"
);

$operacion_validos = array(
    'venta'       => "Venta",
    "alquiler"    => "Alquiler",
    "intercambio" => "Intercambio",
    "regalo"      => "Regalo"
);

$caracteristicas_oficina_validos = array(
    'agua_caliente'         => "Agua caliente",
    'calefaccion'           => "Calefacción",
    'cocina_office'         => "Cocina/office",
    'almacen'               => "Almacén",
    'doble_acristalamiento' => "Doble acristalamiento",
);

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

    public $estado; // Arrays
    public $m2_construidos; // int
    public $m2_utiles; // int
    public $m2_superficie_m; // int
    public $fachada_exterior; // Arrays
    public $distribucion; // Array
    public $uso_exclusivo_of; // Array
    public $numero_banos_as; // int
    public $tipo_de_banos; // Array
    public $ubicacion_banos; // Array
    public $ascensores; // int (incluye 0)
    public $certificacion_energetica; // Array
    public $plazas_garaje_ip; // int
    public $aire_acondicionado; // array
    public $seguridad_oficina; // array
    public $caracteristicas_oficina; // array
    public $mobilidad_reducida; // bool
    public $precio_mes; // int
    public $fianza; // array
    public $descripcion_anuncio; //string

    private $tipos_inmueble_validos;
    private $operaciones_validas;
    private $provincias_validas;
    private $codigos_postales_validos;
    private $estados_validos;
    private $fachada_exterior_validas;
    private $distribucion_validos;
    private $uso_exclusivo_of_validos;
    private $tipo_de_banos_validos;
    private $ubicacion_banos_validos;
    private $certificacion_energetica_validos;
    private $aire_acondicionado_validos;
    private $seguridad_oficina_validos;
    private $caracteristicas_oficina_validos;
    private $fianza_validos;

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
        $preferencia_contrato,
        $estado,
        $m2_construidos,
        $m2_utiles,
        $m2_superficie_m,
        $fachada_exterior,
        $distribucion,
        $uso_exclusivo_of,
        $numero_banos_as,
        $tipo_de_banos,
        $ubicacion_banos,
        $ascensores,
        $certificacion_energetica,
        $plazas_garaje_ip,
        $aire_acondicionado,
        $seguridad_oficina,
        $caracteristicas_oficina,
        $mobilidad_reducida,
        $precio_mes,
        $fianza,
        $descripcion_anuncio
    ) {
        $this->errores = array();
        $this->tipos_inmueble_validos = ["oficina", "piso", "azotea", "garaje"];
        $this->operaciones_validas = ["Alquiler", "Venta"];
        $this->provincias_validas = ["Barcelona", "Madrid", "Huelva"];
        $this->codigos_postales_validos = ["50005", "08002", "09002"];
        // A partir de aquí cambiar valores
        $this->estados_validos = ["50005", "08002", "09002"];
        $this->fachada_exterior_validas = ["50005", "08002", "09002"];
        $this->distribucion_validos = ["50005", "08002", "09002"];
        $this->uso_exclusivo_of_validos = ["50005", "08002", "09002"];
        $this->tipo_de_banos_validos = ["50005", "08002", "09002"];
        $this->ubicacion_banos_validos = ["50005", "08002", "09002"];
        $this->certificacion_energetica_validos = ["50005", "08002", "09002"];
        $this->aire_acondicionado_validos = ["50005", "08002", "09002"];
        $this->seguridad_oficina_validos = ["50005", "08002", "09002"];
        $this->caracteristicas_oficina_validos = ["50005", "08002", "09002"];
        $this->fianza_validos = ["50005", "08002", "09002"];

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

        $this->estado = $this->validarElementoArray(
            $estado,
            $this->estados_validos,
            "estado",
            "El estado seleccionado no existe o no es valido."
        );
        $this->m2_construidos               = $this->validarNumeroInt($m2_construidos, "m2_construidos");
        $this->m2_utiles               = $this->validarNumeroInt($m2_utiles, "m2_utiles");
        $this->m2_superficie_m               = $this->validarNumeroInt($m2_superficie_m, "m2_superficie_m");
        $this->fachada_exterior = $this->validarElementoArray(
            $fachada_exterior,
            $this->fachada_exterior_validas,
            "fachada_exterior",
            "La fachada exterior no es valida."
        );
        $this->distribucion = $this->validarElementoArray(
            $distribucion,
            $this->distribucion_validos,
            "distribucion",
            "El distribución seleccionado no existe."
        );
        $this->uso_exclusivo_of = $this->validarElementoArray(
            $uso_exclusivo_of,
            $this->uso_exclusivo_of_validos,
            "uso_exclusivo_of",
            "El uso exclusivo oficinas seleccionado no existe."
        );
        $this->numero_banos_as = $this->validarNumeroInt($numero_banos_as, "numero_banos_as");
        $this->tipo_de_banos = $this->validarElementoArray(
            $tipo_de_banos,
            $this->tipo_de_banos_validos,
            "tipo_de_banos",
            "El uso tipo de baños seleccionado no existe."
        );
        $this->ubicacion_banos = $this->validarElementoArray(
            $ubicacion_banos,
            $this->ubicacion_banos_validos,
            "ubicacion_banos",
            "La ubicación de los baños seleccionados no es valida."
        );
        $this->ascensores = $this->validarNumeroInt($ascensores, "ascensores");
        $this->certificacion_energetica = $this->validarElementoArray(
            $certificacion_energetica,
            $this->certificacion_energetica_validos,
            "certificacion_energetica",
            "El uso exclusivo oficinas seleccionado no existe."
        );
        $this->plazas_garaje_ip = $this->validarNumeroInt($plazas_garaje_ip, "plazas_garaje_ip");
        $this->aire_acondicionado = $this->validarElementoArray(
            $aire_acondicionado,
            $this->aire_acondicionado_validos,
            "aire_acondicionado",
            "Las opciones de aire acondicionado seleccionadas no son validas."
        );
        $this->seguridad_oficina = $this->validarElementoArray(
            $seguridad_oficina,
            $this->seguridad_oficina_validos,
            "seguridad_oficina",
            "Las opciones de seguridad oficina no son validas o no existen."
        );
        $this->caracteristicas_oficina = $this->validarElementoArray(
            $caracteristicas_oficina,
            $this->caracteristicas_oficina_validos,
            "caracteristicas_oficina",
            "Las características de la oficina no son validas o no existen."
        );
        $this->mobilidad_reducida  = $this->validarBoolean($mobilidad_reducida, "mobilidad_reducida");
        $this->precio_mes = $this->validarNumeroInt($precio_mes, "precio_mes");
        $this->fianza = $this->validarElementoArray(
            $fianza,
            $this->fianza_validos,
            "fianza",
            "El tipo de fianza no es valida o no existe."
        );
        $this->descripcion_anuncio = $this->validarString($descripcion_anuncio, "descripcion_anuncio");

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

    // Comprobar errores
    public function hayErrores()
    {
        if (count($this->errores) > 0) {
            print_r($this->errores);
        } else {
            echo "No hay errores" . PHP_EOL;
        }
    }
}

// Variables clase
$tipo_inmueble = "oficina";
$operacion = "valores";
$direccion = "valores";
$provincia = "valores";
$codigo_postal = "valores";
$ocultar_calle = "valores";
$planta = "valores";
$puerta = "valores";
$bloque_portal = "valores";
$urbanizacion = "valores";
$email = "valores";
$telefono = "valores";
$telefono_extranjero = "valores";
$nombre_usuario = "valores";
$preferencia_contrato = "valores";
$estado = "valores";
$m2_construidos = "valores";
$m2_utiles = "valores";
$m2_superficie_m = "valores";
$fachada_exterior = "valores";
$distribucion = "valores";
$uso_exclusivo_of = "valores";
$numero_banos_as = "valores";
$tipo_de_banos = "valores";
$ubicacion_banos = "valores";
$ascensores = "valores";
$certificacion_energetica = "valores";
$plazas_garaje_ip = "valores";
$aire_acondicionado = "valores";
$seguridad_oficina = "valores";
$caracteristicas_oficina = "valores";
$mobilidad_reducida = "valores";
$precio_mes = "valores";
$fianza = "valores";
$descripcion_anuncio = "valores";


$miPiso = new EnvioPropiedad(
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
    $preferencia_contrato,
    $estado,
    $m2_construidos,
    $m2_utiles,
    $m2_superficie_m,
    $fachada_exterior,
    $distribucion,
    $uso_exclusivo_of,
    $numero_banos_as,
    $tipo_de_banos,
    $ubicacion_banos,
    $ascensores,
    $certificacion_energetica,
    $plazas_garaje_ip,
    $aire_acondicionado,
    $seguridad_oficina,
    $caracteristicas_oficina,
    $mobilidad_reducida,
    $precio_mes,
    $fianza,
    $descripcion_anuncio
);
// $miPiso->hayErrores();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/light.min.css"
    />
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Formulario Idealista</title>
</head>
<body>
    <h1>Formulario publicar propiedad</h1>
    <hr>
    <form action="" class="mi-formulario">

        <div class="grupo">
            <label for="tipo_inmueble">Elige el timpo de inmueble:</label>
            <select name="tipo_inmueble" id="tipo_inmueble">
                <option value="" selected disabled>--Por favor escoge una opción--</option>
                <?php foreach ($tipos_inmueble_validos as $key => $value) : ?>
                     <option value="<?php echo $key; ?>"><?php echo $value ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="grupo">
            <p>Operación</p>
            <?php foreach ($operacion_validos as $key => $value) : ?>
                <div class="grupo grupo-radio">
                    <input type="radio" id="<?php echo $key; ?>" value="<?php echo $key; ?>" name="operacion">
                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="grupo">
            <p>Características de tu oficina</p>
            <?php foreach ($caracteristicas_oficina_validos as $key => $value) : ?>
                <div class="grupo grupo-checkboxes">
                    <input type="checkbox" id="<?php echo $key; ?>" name="<?php echo $key; ?>">
                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
</body>
</html>