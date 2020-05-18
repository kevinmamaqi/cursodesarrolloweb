# Calendario

Breve calendario con los contenidos y tareas principales:

Semana 1

-   Lunes 09/03: Crear primera estructura web.
-   Martes 10/03: Crear segunda estructura web.
-   Miércoles 11/03: Repasar el trabajo realizado con la teoría.
-   Jueves 12/03: Trabajo individual, crear CV.

Semana 2

-   Lunes 18/05: Repasar conceptos teóricos y prácticos.
-   Martes 19/05: ...
-   Miércoles 20/05: ...
-   Jueves 21/05: ...

## Contenidos básicos

Resumen de los contenidos a conocer para el examen.

### ¿Qué son los lenguajes de marca?

Mediante el uso de etiquetas (o notas) otorgamos un significado al texto para ser interpretado por otras personas o software.

Un lenguaje de marcado o lenguaje de marcas es una forma de codificar un documento que, junto con el texto, incorpora etiquetas o marcas que contienen información adicional acerca de la estructura del texto o su presentación.

### Estrategias de diseño web

-   **Orientado al usuario**: se caracteriza por asumir que todo el proceso de diseñar y desarrollar la correspondiente página web debe estar conducido por el usuario, lo que significa que para dicho diseño se deben tener muy en cuenta las necesidades, características y objetivos que este desea alcanzar. Primero hay que conocer al usuario (definirlo), posteriormente ejecutar y planificar la ejecución del diseño. Se mide con la satisfacción del usuario.
-   **Orientado a objetivos**: consiste en definir y planificar los objetivos que se deseen alcanzar con el desarrollo del correspondiente sitio web. El éxito se mide con como se alcanzan los objetivos correspondientes (ventas, suscripciones, etc...)
-   **Orientado a la implementación (tecnología)**: Centrar el diseño de la página en las posibilidades tecnológicas que están a la disposición del diseñador/desarrollador y que este es capaz de implementar. Necesario conocer la tecnología disponible y evaluarla.

### Elementos básicos de HTML:

-   Estructura del documento. Declaración (DOCTYPE), etiqueta HTML, body, head.
-   Elementos básicos del body:
    -   div -> caja.
    -   div semanticos -> header, main, nav, footer, aside.
    -   img -> atributos principales alt y src.
    -   ul -> lista desordenada.
    -   ol -> lista ordenada.
    -   li -> list-item -> elemento de lista.
    -   a -> anchor -> enlace -> atributos principales: href.
    -   **<!--...-->** -> comentarios.
    -   h1...h6 -> headers (cabeceras, de h1 a h6).
    -   p -> parrafo.
    -   br -> salto de linea.
    -   hr -> linea horizontal.
    -   table -> tabla. Tiene thead + tbody. Estos a su vez tienen sub-elementos (th, tr y td).
    -   blockquote -> citacion
-   Elementos multimedia:
    -   canvas -> Elemento utilizado para dibujar gráficos, generalmente con Javascript.
    -   audio
    -   video
-   Formularios:
    -   form -> define un formulario.
    -   label -> etiqueta para el input.
    -   input -> campo a rellenar por el usuario. Tipos: text, textarea, email, submit, etc...
    -   button -> botón.

**Referencia**: En total hay 130 etiquetas html, aumentan y cambian cada día: https://www.w3schools.com/TAGS/default.ASP

### Elementos básicos de HTML:

_Selectores_
Son los elementos a los que damos estilos. Pueden ser etiquetas html como por ejemplo: `h1: {color: red}, o p: {margin-top: 20px;}`. También podemos referenciar a clases e identificadores que añadimos a las clases html, por ejemplo: `<div id="caja-principal" class="caja-arriba">`. Si usamos el segundo podemos referenciar es caja como `#caja-principal: {margin-left: 30px;}` o `.caja-arriba: {margin-left: 30px}`.

_Propiedades_
Son las maneras en las que podemos dar estilos. Una propiedad de una frase es el color: `color: #000000;`. Los colores constan de dos partes la propiedad en si (color) y el valor (#000000).

_Sintaxis_
La sintaxis es estricta, primero se declara el selector, se abre una llave y se declara la propiedad, se finaliza asignando un valor a dicha propiedad. Por ejemplo: `p: {color: #000000}`.

Propiedades principales:

-   font-size
-   text-align
-   line-height
-   letter-spacing
-   padding
-   border
-   margin
-   width
-   height
-   color
-   background-color
-   display
-   border
-   Flexbox: https://flexboxfroggy.com/ - Lo usamos para colocar cajas adecuadamente.

### Modelo de caja y unidades en CSS

Fundamental para posicionar los elementos que creamos:

1. Modelo de caja: https://developer.mozilla.org/en-US/docs/Learn/CSS/Building_blocks/The_box_model
2. Unidades en CSS: https://developer.mozilla.org/en-US/docs/Learn/CSS/Building_blocks/Values_and_units
3. Flexbox: https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Flexbox

### Normalizadores

Fundamental para garantizar que nuestros diseños y desarrollos se ven bien desde cualquier navegador. Siempre usaremos normalize.

-   https://necolas.github.io/normalize.css/
