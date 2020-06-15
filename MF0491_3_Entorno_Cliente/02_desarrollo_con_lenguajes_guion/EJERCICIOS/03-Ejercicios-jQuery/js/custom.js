// 1. Prueba si jQuery está cargado y listo para usarse.
if (typeof jQuery == "undefined") {
	// Esto significa que jQuery no esta cargado, hacer algo aquí.
	console.log("jQuery no ha cargado correctamente.");
} else {
	console.log("jQuery ha cargado correctamente");
}

// 2. Desplazate hasta la parte superior de la página con jQuery.
// Usar scroll. Para realizar este ejercicio crea una caja
// vacia de 1000 pixeles de alto, o más.
// Crea un botón que se mantenga flotante en la parte inferior
// derecha de la página, este botón debe ser una flecha hacia arriba.
var botonSubir = $("#ir-arriba");
console.log(botonSubir);

botonSubir.on("click", function () {
	$("html, body").animate({ scrollTop: 0 }, 500);
});

// 3. Deshabilita el menú del botón derecho en la página html usando jquery.

// 4. Deshabilita/habilita un botón de envío de formulario.
// Deshabilita el botón enviar hasta que el visitante haya hecho clic en una casilla de acepto la política de privacidad.

// 5. Arreglar imágenes rotas automáticamente.
// Primero añadir una imagen.
// Después buscar la propiedad onerror y como usar jQuery para evitar que se cargue si da error.

// 6. Crea texto parpadeante usando jQuery. (blink)

// 7. Modifica los estilos de una tabla HTML
// para que cada segunda fila tenga un color distinto
var filasPares = $("#tabla-examen tbody tr:odd");
filasPares.css("backgroundColor", "#FF0000");

// 8. Imprime una página usando jQuery.

// 9. Limita la entrada de caracteres en un área de texto a 50.
// Muestra conforme el usuario escribe cuantos caracteres quedan para llegar al límite.
var areaDeTexto = $("#area-de-texto");
var caracteresQueQuedan = $("#caracteres-que-quedan");
var diferencia = 50;

areaDeTexto.on("keyup", function () {
	var longitudTexto = areaDeTexto.val().length;
	caracteresQueQuedan.text(diferencia - longitudTexto);
});

// 10. Crea un div usando jQuery con la etiqueta de estilo caja-roja.
// Introduce el div en la página
var divCajaRoja =
	'<div class="caja-roja" style="width: 100px; height: 100px; background-color: red;"></div>';
var cuerpoDocumento = $("body");
cuerpoDocumento.append(divCajaRoja);

// 11. Crea dos cajas del mismo ancho y alto, y distinto color de fondo.
// Introduce en la caja de la izquierda tres botones.
// Haz que al pinchar sobre un botón, este se cambie de caja.
var cajaIZD = $("#caja-izd");
var cajaDCHA = $("#caja-dcha");

cajaIZD.on("click", "button", function () {
	cajaDCHA.append($(this));
});

cajaDCHA.on("click", "button", function () {
	cajaIZD.append($(this));
});

// 12. Muestra los valores de la API https://jsonplaceholder.typicode.com/
// https://jsonplaceholder.typicode.com/ es una web que ofrece datos para prácticar.
var respuesta;

// JAVAVSCRIPT FETCH API
// fetch("https://jsonplaceholder.typicode.com/posts")
// 	.then((res) => res.json())
// 	.then((json) => {
// 		respuesta = json;
// 		console.log("Ya estoy listo para usarse.");
//     });

// JQUERY GET API
$.get("https://jsonplaceholder.typicode.com/posts", function (data) {
	respuesta = data;
	console.log("Respuesta", data);
});

var boton = $("#mostrar-articulos");
var lugarDeInsercion = $("#insertar-articulos");

boton.on("click change", function () {
	for (let i = 0; i < 3; i++) {
		const element = respuesta[i];
		const titulo = element.title;
		const cuerpo = element.body;
		console.log(titulo);
		lugarDeInsercion.append("<h1>" + titulo + "</h1>");
		lugarDeInsercion.append("<p>" + cuerpo + "</p>");
	}
});

// 13. Crea una lista desordenada, de números aleatorios, con jQuery.
var listaDesordenada = "<ul>";
var numeroElementos = Math.round(Math.random() * (10 - 3) + 3);
for (let i = 0; i < numeroElementos; i++) {
	listaDesordenada += "<li>" + (Math.random() * (1000 - 250) + 250) + "</li>";
}
listaDesordenada += "</ul>";
$("body").append(listaDesordenada);

// 14. Crea una caja (div) conteniendo 5 parrafos.
// Añade la clase "curso-ceina" al último parrafo

// 15. Coloca una caja en la pantalla con una altura de 100px y anchura de 100px.
// Dale color de fondo rojo.
// Dale margen a la izquierda 20px y arriba 50px.
// Encuentra la posición absoluta de esta caja, respecto del document usando jQuery.

// 16. Crea un botón llamado "Iniciar sesión".
// Al pinchar haz que cambie el texto a "Estamos identificandote"
// Tres segundos despues, haz que cambie el texto a "Bienvenido" y que el color
// de fondo sea verde.
var loading = "Estamos identificandote";
var bienvenido = "Bienvenido";
var botonIniciarSesion = $("#iniciar-sesion");

botonIniciarSesion.click(function (e) {
	e.preventDefault();
	$(this).text(loading).delay(3000, $(this).text(bienvenido));

	setTimeout(function () {
		$(this).text(bienvenido);
	}, 3000);
});

// 17. Crea un input y limita solo a numeros, incluidos los decimales (',' o '.').
// METODO CON REGEXP + REFERENCIA THIS.
// $("#filtrar-numeros").on("keyup", function () {
// 	this.value = this.value.replace(/[^0-9\.\,]/g, "");
// });

// MÉTODO RAUL
// $("#filtrar-numeros").on("keypress", function (tecla) {
// 	if (tecla.charCode < 48 || tecla.charCode > 57) {
// 		if (tecla.charCode == 44 || tecla.charCode == 46) {
// 			return true;
// 		}
// 		return false;
// 	}
// });

// 18. Crea un formulario con nombre, apellidos, telefeno y mensaje
// Acceder (capturar) a sus datos usando jQuery
var formulario18 = $("#form_18");
formulario18.on("submit", function (e) {
	e.preventDefault();
	console.log($(this).serialize());
	console.log($(this).serializeArray());
});
// 19. Investiga el evento BLUR de jQuery y crea un caso práctico para el mismo.

// 20. Investiga la función delegate y el evento focus en jQuery
// Crea un ejemplo práctico
