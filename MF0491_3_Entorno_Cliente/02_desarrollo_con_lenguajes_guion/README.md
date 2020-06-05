# Fundamentos programación en JS

# Utilidades JS para interactuar con el documento HTML

**Seleccionar o "coger"** los elementos a utilizar posteriormente: https://www.w3schools.com/js/js_htmldom_elements.asp. Existen 5 métodos principales:

-   Encontrar elementos HTML por ID
-   Encontrar elementos HTML por nombre de etiqueta
-   Encontrar elementos HTML por nombre de clase
-   Encontrar elementos HTML por selectores CSS
-   Encontrar elementos HTML por colecciones de objetos HTML

Atención: El método de documento getElementById() devuelve un **objeto**. Esto quiere decir que se puede acceder a sus propiedades (id, alt, src, etc... usando la notación de objetos de Javascript). No esta disponible en la documentación oficial de Mozilla.

**Escuchar a eventos** que ocurren en el documento. Los eventos podemos considerarlos acciones que realiza el usuario (como pinchar en un botón (hacer "click", o pinchar en la tecla "Enter" o "Esc")).

-   Referencia: https://developer.mozilla.org/es/docs/Web/API/EventTarget/addEventListener
-   Sintaxis: `ElementoAEscuchar.AddEventListener("tipoDeEvento", funcion(){})`
-   Tipos de eventos: Event, DragEvent, FormEvent, AnimationEvent, CSS, etc...
-   Lista de eventos completa: https://developer.mozilla.org/es/docs/Web/Events

_IMPORTANTE_ - Se exige saber que son los eventos, como utilizarlos y saber definir que tipo de evento necesito en cada momento o para realizar una determinada acción. No memoriceis eventos.

**PROPIEDADES BÁSICAS** - las propiedades básicas de todos los elementos que "cogemos o seleccionamos":

-   innerHTML: Devuelve el contenido del elemento seleccionado. Si dentro tiene HTML, lo devuelve también. También se puede usar para asignar.
-   innerTEXT: Devuelve el texto del contenido seleccionado. Si dentro tiene HTML, lo elimina. También se puede usar para asignar.

# Expresiones Regulares (RegExp)

Es una secuencia de caracteres que conforma un patrón de búsqueda. La usamos para encontrar patrones en un texto y generalmente realizar sustituciones.

**Referencia**: https://developer.mozilla.org/es/docs/Web/JavaScript/Guide/Regular_Expressions

**Definición**: Las expresiones regulares son patrones utilizados para encontrar una determinada combinación de caracteres dentro de una cadena de texto. En JavaScript, las expresiones regulares también son objetos. Estos patrones se utilizan en los métodos exec y test de RegExp, así como los métodos `match`, `replace`, `search` y `split` de String. En este capítulo se describe el uso y funcionamiento de las expresiones regulares en JavaScript.

**Herramienta online**: https://regex101.com/

# SHALLOW COPY Y DEEP COPY EN JS

var y = [
[13, 13, { nombre: "shallowCopy", definition: "¿Qué es eso?" }],
[15, 15, { nombre: "shallowCopy", definition: "¿Qué es eso?" }],
[19, 19, { nombre: "shallowCopy", definition: "¿Qué es eso?" }],
];

// Shallow copy -> Copia superficial, guarda referencias.
var x = y;

// Tenemos que hacer un DEEP COPY. Copia profunda, que no guarde referencias.
var z = JSON.parse(JSON.stringify(y));
// x[0][2].nombre = "Pedro";
z[0][2].nombre = "Pedro";

console.log("x", x);
console.log("y", y);
console.log("z", z);
