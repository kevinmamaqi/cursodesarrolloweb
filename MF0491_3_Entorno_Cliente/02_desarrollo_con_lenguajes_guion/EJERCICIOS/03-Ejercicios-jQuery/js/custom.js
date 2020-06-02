// 1. Prueba si jQuery está cargado y listo para usarse.
if (typeof jQuery == "undefined") {
	// Esto significa que jQuery no esta cargado, hacer algo aquí.
	console.log("jQuery no ha cargado correctamente.");
} else {
	console.log("jQuery ha cargado correctamente");
}

// 2. Desplazate hasta la parte superior de la página con jQuery. Usar scroll.
// Para realizar este ejercicio crea una caja vacia de 1000 pixeles de alto, o más.
// Crea un botón que se mantenga flotante en la parte inferior derecha de la página, este botón debe ser una flecha hacia arriba.

// 3. Deshabilita el menú del botón derecho en la página html usando jquery.

// 4. Deshabilita/habilita un botón de envío de formulario.
// Deshabilita el botón enviar hasta que el visitante haya hecho clic en una casilla de acepto la política de privacidad.

// 5. Arreglar imágenes rotas automáticamente.
// Primero añadir una imagen.
// Después buscar la propiedad onerror y como usar jQuery para evitar que se cargue si da error.

// 6. Crea texto parpadeante usando jQuery. (blink)

// 7. Modifica los estilos de una tabla HTML para que cada segunda fila tenga un color distinto

// 8. Imprime una página usando jQuery.

// 9. Limita la entrada de caracteres en un área de texto.
// Muestra conforme el usuario escribe cuantos caracteres quedan para llegar al límite.

// 10. Crea un div usando jQuery con la etiqueta de estilo caja-roja.
// Introduce el div en la página

// 11. Crea dos cajas del mismo ancho y alto, y distinto color de fondo.
// Introduce en la caja de la izquierda tres botones.
// Haz que al pinchar sobre un botón, este se cambie de caja.

// 12. Muestra los valores de la API https://jsonplaceholder.typicode.com/
// https://jsonplaceholder.typicode.com/ es una web que ofrece datos para prácticar.
var respuesta;

fetch("https://jsonplaceholder.typicode.com/posts")
	.then((res) => res.json())
	.then((json) => {
		respuesta = json;
		console.log("Ya estoy listo para usarse.");
	});

var boton = $("#mostrar-articulos");
var lugarDeInsercion = $("#insertar-articulos");

boton.on("click", function () {
	for (let i = 0; i < 3; i++) {
		const element = respuesta[i];
		const titulo = element.title;
		const cuerpo = element.body;
		console.log(titulo);
		lugarDeInsercion.append("<h1>" + titulo + "</h1>");
		lugarDeInsercion.append("<p>" + cuerpo + "</p>");
	}
});

// 13. Crea una lista desordenada de números aleatorios con jQuery.
