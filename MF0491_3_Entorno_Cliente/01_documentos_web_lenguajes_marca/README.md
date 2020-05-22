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
    -   label -> etiqueta para el input. Importante **usar etiqueta for=""**. Se enlaza directamente al campo con la etiqueta name. Ejemplo: `<label for="nombre">Nombre</label><input type="text" name="nombre" />`
    -   input -> campo a rellenar por el usuario. Tipos: text, textarea, email, submit, etc... Importante **usar etiqueta name=""**.
    -   button -> botón. Si es para enviar un formulario se pone type="submit" -> `<button type="submit">Enviar</submit>`.

**Referencia**: En total hay 130 etiquetas html, aumentan y cambian cada día: https://www.w3schools.com/TAGS/default.ASP

### Elementos básicos de CSS:

**Selectores**
Son los elementos a los que damos estilos. Pueden ser etiquetas html como por ejemplo: `h1: {color: red}, o p: {margin-top: 20px;}`. También podemos referenciar a clases e identificadores que añadimos a las clases html, por ejemplo: `<div id="caja-principal" class="caja-arriba">`. Si usamos el segundo podemos referenciar es caja como `#caja-principal: {margin-left: 30px;}` o `.caja-arriba: {margin-left: 30px}`.

Información sobre selectores CSS: https://developer.mozilla.org/es/docs/Web/CSS/Selectores_CSS

**Propiedades**
Son las maneras en las que podemos dar estilos. Una propiedad de una frase es el color: `color: #000000;`. Los colores constan de dos partes la propiedad en si (color) y el valor (#000000).

**Sintaxis**
La sintaxis es estricta, primero se declara el selector, se abre una llave y se declara la propiedad, se finaliza asignando un valor a dicha propiedad. Por ejemplo: `p {color: #000000}`.

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
    - Unidades principales CSS: px (pixeles), em (unidad relativa al elemento padre), rem (unidad relativa al tamaño de letra del documento, si mi documento tiene un tamaño de letra de 16px, 1rem=16px), vh (1% de la altura de navegador del usuario), vw (1% de la anchura de navegador del usuario).
3. Flexbox: https://developer.mozilla.org/en-US/docs/Learn/CSS/CSS_layout/Flexbox

### Normalizadores

Fundamental para garantizar que nuestros diseños y desarrollos se ven bien desde cualquier navegador. Siempre usaremos normalize.

-   https://necolas.github.io/normalize.css/

### media queries y diseño web responsive

El diseño web receptivo se trata de crear páginas web que se vean bien en todos los dispositivos. Móviles, ordenadores, tablets. Un diseño web receptivo se ajustará automáticamente para diferentes tamaños de pantalla y ventanas gráficas.

```
// Extra small devices (portrait phones, less than 576px)
// No media query since this is the default in Bootstrap

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) { ... }

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) { ... }

// Large devices (desktops, 992px and up)
@media (min-width: 992px) { ... }

// Extra large devices (large desktops, 1200px and up)
@media (min-width: 1200px) { ... }
```

## Examen práctico

| Partes a evaluar del examen práctico                                                                             | Puntuación |
| ---------------------------------------------------------------------------------------------------------------- | ---------- |
| Organizar archivos y documentos adecuadamente                                                                    | 1          |
| Implementar las imágenes y estilos necesarios al documento HTML adecuadamente                                    | 1          |
| Asignar etiquetas HTML adecuadas a los grandes bloques (div, header, footer y nav)                               | 1          |
| Crear estructura de cajas y posicionarlas adecuadamente.                                                         | Hasta 3p.  |
| Crear elementos HTML (formularios, listas, etc...) adecuadamente usando las propiedades necesarias en cada caso. | Hasta 2p.  |
| Asignar colores, bordes, espacios, estilos, etc... fidedignos a los del documento                                | Hasta 2p.  |

## Método de trabajo para el examen

1. Crear carpeta que contendra los archivos de la web.
2. Crear documento index.html
3. Crear carpeta css
4. Crear carpeta img
5. Crear documento styles.css
6. Enlazar documento normalize.css (enlace: ) y styles.css en la cabecera.
7. Dibujar cajas principales sobre papel.
8. Crear HTML de las cajas principales.
9. Crear CSS de las cajas principales y comprobar si se ve bien.
10. Dibujar cajas secundarias sobre papel.
11. Crear HTML de las cajas secundarias.
12. Crear CSS de las cajas secundarias y comprobar si se ve bien.

## Atajos EMMET Microsoft VSCode

Link: https://docs.emmet.io/cheat-sheet/
